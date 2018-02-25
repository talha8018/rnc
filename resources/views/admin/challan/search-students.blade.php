@extends('layouts.master')
@section('title') Students List @endsection
@section('content')

            
    <div class="page-title">
        <h3 class="breadcrumb-header">Search Students</h3>
    </div>
    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-12">
                            <div class="panel panel-white">
                                
                                <div class="row">
                                <form action="{{url('challan/student-list/search')}}" method="get">
                                    <div class="col-xs-3 form-group">
                                        <input type="text" class="form-control" value="<?php if(isset($data['unique'])){echo $data['unique']; } ?>" name="unique" placeholder="Unique ID">
                                    </div>

                                    <div class="col-xs-3 form-group">
                                        <input type="text" class="form-control" value="<?php if(isset($data['name'])){echo $data['name']; } ?>" name="name" placeholder="Name">
                                    </div>

                                    
                                    <div class="col-xs-3 form-group">
                                        <input type="text" class="form-control" value="<?php if(isset($data['class'])){echo $data['class']; } ?>" name="class" placeholder="Class">
                                    </div>

                                    
                                    <div class="col-xs-3 form-group">
                                        <input type="text" class="form-control" value="<?php if(isset($data['program'])){echo $data['program']; } ?>" name="program" placeholder="Program">
                                    </div>

                                    
                                    <div class="col-xs-3 form-group">
                                        <select name="gender" id="" class="form-control">
                                            <option value="">All</option>
                                            <option value="Female" <?php if(isset($data['gender'])){echo $data['gender']=='Female'?'selected':''; } ?>>Female</option>
                                            <option value="Male"  <?php if(isset($data['gender'])){echo $data['gender']=='Male'?'selected':''; } ?>>Male</option>
                                        </select>
                                    </div>

                                    <div class="col-xs-9 form-group">
                                        <input type="submit" class="btn btn-primary" value="Search">
                                        <?php if(isset($_GET['unique']) && isset($_GET['name']) && isset($_GET['class']) && isset($_GET['program']) && isset($_GET['gender']) ): ?>
                                        <a href="{{url('challan/print')}}?<?php echo $_SERVER['REDIRECT_QUERY_STRING']; ?>" target="_blank" class="btn btn-success">Print</a>
                                        <?php endif; ?>
                                        <a href="{{url('challan/student-list')}}" class="pull-right btn btn-danger">Reset</a>
                                    </div>
                                    </form>
                                </div>

                                <?php if($students->total()>0): ?>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="width:1%;">Unique</th>
                                                    <th>Date</th>
                                                    <th>Name</th>
                                                    <th>About</th>
                                                    <th style="width:1%;">Inst.#</th>
                                                    <th>Added By</th>
                                                    <th class="text-right">Fee Details</th>

                                                                                                       
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach($students as $s): ?>
                                                <tr>
                                                    <th scope="row">{{$s['unique_id']}} <a class="hide" href="<?php echo url('challan/edit').'/'.$s['id']; ?>"><i class="fa fa-edit" aria-hidden="true"></i></a> </th>
                                                    <td><span title="Due Date">DD: {{$s['due_date']}}</span><br><span title="Voucher Issue Date">VID: {{$s['voucher_issue_date']}}</span></td>
                                                    <td>{{$s['student_name']}} <br> <b><?php if($s['gender']=='Female'){echo 'D/O';}else{echo 'S/O';} ?></b> {{$s['sdo']}} </td>
                                                    <td>{{$s['program']}}-{{$s['class']}} <br> {{$s['gender']}}</td>
                                                    <td>{{$s['inst']}}</td>
                                                    <td>{{App\User::where('id',$s['added_by'])->first()->name}}<br>{{$s['created_at']}}</td>
                                                    <td class="text-right">
                                                        <span class="pull-left">Education Fee</span> <span title="Education Fee">{{number_format($s['education_fee'])}}</span><br>
                                                        <span class="pull-left">Transport Charges</span> <span title="Transport Charges">{{number_format($s['transport_charges'])}}</span><br>
                                                        <span class="pull-left">Miscellaneous</span> <span title="Miscellaneous">{{number_format($s['miscellaneous'])}}</span><br>
                                                        <span class="pull-left">Others</span> <span title="Others">{{number_format($s['others'])}}</span><br>
                                                        <span class="pull-left">Arrears</span> <span title="Arrears">{{number_format($s['arrears'])}}</span><br>
                                                        <span class="pull-left">Payable Within DD</span> <span style="border-top:1px solid;" title="Payable Within Due Date">= {{number_format($s['payable_within_due_date'])}}</span><br>
                                                        
                                                    </td>
                                                </tr>
                                            <?php endforeach;  ?>
                                            </tbody>
                                        </table>

                                        {{ $students->appends($data)->links() }}
                                    </div>
                                </div>
                                <?php else: ?>
                                <div class="alert alert-danger">No records found.</div>
                                <?php endif; ?>
                            </div>
                        </div>
        </div><!-- Row -->
    </div><!-- Main Wrapper -->


@endsection
