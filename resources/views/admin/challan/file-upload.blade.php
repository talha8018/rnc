@extends('layouts.master')
@section('title') File Upload @endsection
@section('content')

            
    <div class="page-title">
        <h3 class="breadcrumb-header">Upload File</h3>
    </div>
    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-white">
                    <div class="panel-heading clearfix">
                        <?php if(isset($challan)): ?>
                        <h4 class="panel-title">Last uploaded file on <?php echo date('d M, Y',strtotime($challan['created_at'])); ?> by {{App\User::where('id',$challan['added_by'])->first()->name}}.</h4>
                        <?php endif; ?>
                    </div>
                    <div class="panel-body">
                        <form class="form-inline" action="{{url('challan/upload')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="btn-bs-file btn btn-default"> Browse File
                                    <input type="file" class="" required name="challan">
                                </label>
                            </div>
                            

                            <button type="submit" class="btn btn-primary">Upload</button>
                        </form>
                        <div class="clearfix"></div>
                        <br>
                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div><!-- Row -->
    </div><!-- Main Wrapper -->


@endsection
