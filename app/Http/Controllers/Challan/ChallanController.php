<?php

namespace App\Http\Controllers\Challan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Excel;
use Illuminate\Support\Facades\DB;
use App\Models\Challan\Challan;
use Auth;

class ChallanController extends Controller
{
    public function fileUploadPage()
    {
        $challan = Challan::orderBy('id','desc')->first();
        return view('admin.challan.file-upload',compact('challan'));
    }

    
    public function studentList()
    {
        $challan = Challan::orderBy('id','desc')->first();
        if($challan)
        {
            $students = Challan::where('batch',$challan['batch'])->orderBy('unique_id','asc')->paginate(30);
        }
        else
        {
            $students = Challan::orderBy('unique_id','asc')->paginate(30);
        }
        $data = [];
        return view('admin.challan.search-students',compact('students','data'));
    }

    public function challanPrint()
    {
        $challan = Challan::orderBy('id','desc')->first();
        if($challan)
        {
            $students = Challan::where('id','>','0')->where('batch',$challan['batch']);
        }
        else
        {
            $students = Challan::where('id','>','0');
        }

        $input = request();

        if(!empty($input['unique']))
        {
            $students = $students -> where('unique_id',$input['unique']);
        }

        if(!empty($input['name']))
        {
            $students = $students -> where('student_name',$input['name']);
        }

        if(!empty($input['class']))
        {
            $students = $students -> where('class',$input['class']);
        }

        if(!empty($input['program']))
        {
            $students = $students -> where('program',$input['program']);
        }

        if(!empty($input['gender']))
        {
            $students = $students -> where('gender',$input['gender']);
        }


        $students = $students -> orderBy('unique_id','asc')->get()->toArray();        
        return view('admin.challan',compact('students'));
    }


    public function searchStudentList()
    {
        $challan = Challan::orderBy('id','desc')->first();
        if($challan)
        {
            $students = Challan::where('id','>','0')->where('batch',$challan['batch']);
        }
        else
        {
            $students = Challan::where('id','>','0');
        }

        $input = request();

        if(!empty($input['unique']))
        {
            $students = $students -> where('unique_id',$input['unique']);
        }

        if(!empty($input['name']))
        {
            $students = $students -> where('student_name',$input['name']);
        }

        if(!empty($input['class']))
        {
            $students = $students -> where('class',$input['class']);
        }

        if(!empty($input['program']))
        {
            $students = $students -> where('program',$input['program']);
        }

        if(!empty($input['gender']))
        {
            $students = $students -> where('gender',$input['gender']);
        }





        $students = $students -> orderBy('unique_id','asc')->paginate(30);
        
        $data = ['name'=>$input['name'],'unique'=>$input['unique'],'gender'=>$input['gender'],'class'=>$input['class'],'program'=>$input['program']];
        return view('admin.challan.search-students',compact('students','data'));
    }

    function arrayContainsDuplicate($array)  
    {  
        return false;
        //return count($array) != count(array_unique($array));    
    } 

    public function fileUpload()
    {
        if(Input::hasFile('challan'))
        {
            $file = Input::file('challan');
            $filesize = ($file->getSize() * .0009765625) * .0009765625;
            if($file -> getClientOriginalExtension() == 'xlsx' )
            {
                if($filesize<=15)
                {
                    $move = $file->move(public_path().'/challan/',date('Y-m-d').'.'.$file -> getClientOriginalExtension());
                    $data = Excel::load(public_path().'/challan/'.date('Y-m-d').'.'.$file -> getClientOriginalExtension(), function($reader) {
                        $reader->formatDates(false);
                       $reader->ignoreEmpty();
                    })->get()->toArray();
                       
                    DB::beginTransaction();
                    if(Challan::exists())
                    {
                        $batch = Challan::orderBy('id','desc')->first()->batch;
                        $batch = $batch + 1;
                    }
                    else
                    {
                        $batch = 1;
                    }
                    $unique_ids = array_column($data, 'unique_id');
                   
                    if($this->arrayContainsDuplicate($unique_ids) )
                    {
                        DB::rollBack();
                        return redirect()->back()->with('error', 'Duplicate unique id exists.');
                    }
                   
                    foreach($data as $key => $value)
                    {
                        if($key == 0)
                        {
                            
                            if(!array_key_exists('unique_id',$value) || !array_key_exists('due_date',$value) || !array_key_exists('student_name',$value) || !array_key_exists('sdo',$value) || !array_key_exists('gender',$value) || !array_key_exists('program',$value) || !array_key_exists('class',$value) || !array_key_exists('inst',$value) || !array_key_exists('voucher_issue_date',$value) || !array_key_exists('education_fee',$value) || !array_key_exists('transport_charges',$value) || !array_key_exists('miscellaneous',$value) || !array_key_exists('others',$value)  || !array_key_exists('arrears',$value) || !array_key_exists('payable_within_due_date',$value))
                            {
                                DB::rollBack();
                                return redirect()->back()->with('error', 'Format of file is incorrect.');
                            }
                        }

                        if(!isset($value['unique_id']))
                        {
                            continue;
                        }
                        $value['added_by'] = Auth::user()->id;
                        $value['batch'] = $batch;
                        $save = Challan::create($value);
                        if(!$save)
                        {
                            DB::rollBack();
                        }
                    }
                    DB::commit();
                    return redirect('challan/student-list');
                }
                else
                {
                    return redirect()->back()->with('error', 'Maximum file size is 15MB.');                    
                }
            }
            else
            {
                return redirect()->back()->with('error', 'Please upload xlsx file only.');
            }  
        }   
    }





}
