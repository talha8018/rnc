<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Royal National College">
        <meta name="keywords" content="rnc,college">
        <meta name="author" content="Muhammad Talha">
        <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        
        <!-- Title -->
        <title>Print Challan | {{ config('app.name') }}</title>

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <link href="{{url('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{url('assets/css/challan.css')}}" rel="stylesheet">
    </head>
    <body id="challan-body">
        <div class="container-fluid">

        <?php if($students): foreach($students as $s): ?>
            <div class="row">
                <div class="col-xs-4 ">
                    <p class="copy">(Student Copy)</p>
                    <p class="v-printed">Voucher Printed Date: <?php echo date('d M, Y'); ?></p>
                    
                    <div class="row">
                        <div class="col-xs-3">
                            <img src="{{url('assets/images/rnc.JPG')}}" class="img-responsive rnc-logo" alt="">
                        </div>
                        <div class="col-xs-6 p-0">
                            <p class="heading">Royal National College</p>
                            <p class="heading">G.T Road Kharian</p>
                            <p class="text-center account">For Credit into A/C # 232139569<br>United Bank Limited (Any Branch)</p>
                        </div>
                        <div class="col-xs-3">
                            <img src="{{url('assets/images/ubl.JPG')}}" class="img-responsive ubl-logo" alt="">                            
                        </div>
                    </div>
                    
                    <img src="{{url('assets/images/barcode.png')}}" class="img-responsive m0a" alt="">
                    <p class="bar-code">PV.No <?php echo date('dmY').$s['unique_id']; ?></p>

                    <div class="row">
                        <div class="col-xs-6" style="padding-left:38px;">
                            <p><b>Unique: {{$s['unique_id']}}</b></p>
                            <p>Student Name:</p>
                            <p>S/D/O:</p>
                            <p>Gender:</p>
                            <p>Class:</p>
                            <p>Program:</p>
                            <p>Issue Date:</p>
                            <p>Inst #:</p>
                        </div>
                        <div class="col-xs-6">
                            <p><b>*Due Date: {{$s['due_date']}}</b></p>
                            <p>{{$s['student_name']}}</p>
                            <p>{{$s['sdo']}}</p>
                            <p>{{$s['gender']}}</p>
                            <p>{{$s['class']}}</p>
                            <p>{{$s['program']}}</p>
                            <p>{{$s['voucher_issue_date']}}</p>
                            <p>{{$s['inst']}}</p>                          
                        </div>
                    </div>

                    <p class="p-heading"> <span><b>Category</b></span>   <span class="pull-right"><b>Amount</b></span> </p>
                    <p class="p-inner"> <span>Education Fee</span>	<span class="pull-right">PKR {{number_format($s['education_fee'])}}</span></p>
                    <p class="p-inner"> <span>Transport Charges</span>	<span class="pull-right">PKR {{number_format($s['transport_charges'])}}</span></p>
                    <p class="p-inner"> <span>Miscellaneous Charges</span>	<span class="pull-right">PKR {{number_format($s['miscellaneous'])}}</span></p>
                    <p class="p-inner"> <span>Others</span>	<span class="pull-right">PKR {{number_format($s['others'])}}</span></p>
                    <p class="p-inner"> <span>Arrears</span>	<span class="pull-right">PKR {{number_format($s['arrears'])}}</span></p>
                    <p class="p-heading"> <span><b>Payable within Due Date</b></span>   <span class="pull-right"><b>PKR {{number_format($s['payable_within_due_date'])}}</b></span> </p>
                    <p class="p-100 m-0">*RS. 100/- per day will be charged after due date.</p>
                    <div class="bank-section">
                        <span class="bank-use">(Bank Use Only)</span>
                        <div class="row">
                            <div class="col-xs-6">
                                <p>Payable within Due Date:</p>
                                <p>L.P Surcharge:</p>
                                <p class="m-0">Payable after Due Date:</p>
                            </div>
                            <div class="col-xs-6">
                                <p class="total">PKR  {{number_format($s['payable_within_due_date'])}}</p>
                                <p class="total"></p>
                                <p class="total m-0"></p>
                            </div>
                        </div>
                    </div>

                    <div class="signature">
                        <div class="row">
                            <div class="col-xs-6">
                                <p class="depo">Depositor</p>
                            </div>
                            <div class="col-xs-6">
                                <p class="depo pull-right">Bank Officer</p>
                            </div>
                        </div>
                    </div>

                    <p class="last-line">This is computer generated document so does not require signature.</p>
                </div>


                

                 <div class="col-xs-4 crop">
                    <p class="copy">(College Copy)</p>
                    <p class="v-printed">Voucher Printed Date: 27 Dec, 2017</p>
                   
                    <div class="row">
                        <div class="col-xs-3">
                            <img src="{{url('assets/images/rnc.JPG')}}" class="img-responsive rnc-logo" alt="">
                        </div>
                        <div class="col-xs-6 p-0">
                            <p class="heading">Royal National College</p>
                            <p class="heading">G.T Road Kharian</p>
                            <p class="text-center account">For Credit into A/C # 232139569<br>United Bank Limited (Any Branch)</p>
                        </div>
                        <div class="col-xs-3">
                            <img src="{{url('assets/images/ubl.JPG')}}" class="img-responsive ubl-logo" alt="">                            
                        </div>
                    </div>
                    
                    <img src="{{url('assets/images/barcode.png')}}" class="img-responsive m0a" alt="">
                    <p class="bar-code">PV.No <?php echo date('dmY').$s['unique_id']; ?></p>

                    <div class="row">
                        <div class="col-xs-6" style="padding-left:38px;">
                            <p><b>Unique: {{$s['unique_id']}}</b></p>
                            <p>Student Name:</p>
                            <p>S/D/O:</p>
                            <p>Gender:</p>
                            <p>Class:</p>
                            <p>Program:</p>
                            <p>Issue Date:</p>
                            <p>Inst #:</p>
                        </div>
                        <div class="col-xs-6">
                            <p><b>*Due Date: {{$s['due_date']}}</b></p>
                            <p>{{$s['student_name']}}</p>
                            <p>{{$s['sdo']}}</p>
                            <p>{{$s['gender']}}</p>
                            <p>{{$s['class']}}</p>
                            <p>{{$s['program']}}</p>
                            <p>{{$s['voucher_issue_date']}}</p>
                            <p>{{$s['inst']}}</p>                          
                        </div>
                    </div>

                    <p class="p-heading"> <span><b>Category</b></span>   <span class="pull-right"><b>Amount</b></span> </p>
                    <p class="p-inner"> <span>Education Fee</span>	<span class="pull-right">PKR {{number_format($s['education_fee'])}}</span></p>
                    <p class="p-inner"> <span>Transport Charges</span>	<span class="pull-right">PKR {{number_format($s['transport_charges'])}}</span></p>
                    <p class="p-inner"> <span>Miscellaneous Charges</span>	<span class="pull-right">PKR {{number_format($s['miscellaneous'])}}</span></p>
                    <p class="p-inner"> <span>Others</span>	<span class="pull-right">PKR {{number_format($s['others'])}}</span></p>
                    <p class="p-inner"> <span>Arrears</span>	<span class="pull-right">PKR {{number_format($s['arrears'])}}</span></p>
                    <p class="p-heading"> <span><b>Payable within Due Date</b></span>   <span class="pull-right"><b>PKR {{number_format($s['payable_within_due_date'])}}</b></span> </p>
                    <p class="p-100 m-0">*RS. 100/- per day will be charged after due date.</p>
                    <div class="bank-section">
                        <span class="bank-use">(Bank Use Only)</span>
                        <div class="row">
                            <div class="col-xs-6">
                                <p>Payable within Due Date:</p>
                                <p>L.P Surcharge:</p>
                                <p class="m-0">Payable after Due Date:</p>
                            </div>
                            <div class="col-xs-6">
                                <p class="total">PKR  {{number_format($s['payable_within_due_date'])}}</p>
                                <p class="total"></p>
                                <p class="total m-0"></p>
                            </div>
                        </div>
                    </div>

                    <div class="signature">
                        <div class="row">
                            <div class="col-xs-6">
                                <p class="depo">Depositor</p>
                            </div>
                            <div class="col-xs-6">
                                <p class="depo pull-right">Bank Officer</p>
                            </div>
                        </div>
                    </div>
                    <p class="last-line">This is computer generated document so does not require signature.</p>
                </div>







                 <div class="col-xs-4 ">
                    <p class="copy">(Bank Copy)</p>
                    <p class="v-printed">Voucher Printed Date: 27 Dec, 2017</p>
                    
                    <div class="row">
                        <div class="col-xs-3">
                            <img src="{{url('assets/images/rnc.JPG')}}" class="img-responsive rnc-logo" alt="">
                        </div>
                        <div class="col-xs-6 p-0">
                            <p class="heading">Royal National College</p>
                            <p class="heading">G.T Road Kharian</p>
                            <p class="text-center account">For Credit into A/C # 232139569<br>United Bank Limited (Any Branch)</p>
                        </div>
                        <div class="col-xs-3">
                            <img src="{{url('assets/images/ubl.JPG')}}" class="img-responsive ubl-logo" alt="">                            
                        </div>
                    </div>
                    
                    <img src="{{url('assets/images/barcode.png')}}" class="img-responsive m0a" alt="">
                    <p class="bar-code">PV.No <?php echo date('dmY').$s['unique_id']; ?></p>

                    <div class="row">
                        <div class="col-xs-6" style="padding-left:38px;">
                            <p><b>Unique: {{$s['unique_id']}}</b></p>
                            <p>Student Name:</p>
                            <p>S/D/O:</p>
                            <p>Gender:</p>
                            <p>Class:</p>
                            <p>Program:</p>
                            <p>Issue Date:</p>
                            <p>Inst #:</p>
                        </div>
                        <div class="col-xs-6">
                            <p><b>*Due Date: {{$s['due_date']}}</b></p>
                            <p>{{$s['student_name']}}</p>
                            <p>{{$s['sdo']}}</p>
                            <p>{{$s['gender']}}</p>
                            <p>{{$s['class']}}</p>
                            <p>{{$s['program']}}</p>
                            <p>{{$s['voucher_issue_date']}}</p>
                            <p>{{$s['inst']}}</p>                          
                        </div>
                    </div>

                    <p class="p-heading"> <span><b>Category</b></span>   <span class="pull-right"><b>Amount</b></span> </p>
                    <p class="p-inner"> <span>Education Fee</span>	<span class="pull-right">PKR {{number_format($s['education_fee'])}}</span></p>
                    <p class="p-inner"> <span>Transport Charges</span>	<span class="pull-right">PKR {{number_format($s['transport_charges'])}}</span></p>
                    <p class="p-inner"> <span>Miscellaneous Charges</span>	<span class="pull-right">PKR {{number_format($s['miscellaneous'])}}</span></p>
                    <p class="p-inner"> <span>Others</span>	<span class="pull-right">PKR {{number_format($s['others'])}}</span></p>
                    <p class="p-inner"> <span>Arrears</span>	<span class="pull-right">PKR {{number_format($s['arrears'])}}</span></p>
                    <p class="p-heading"> <span><b>Payable within Due Date</b></span>   <span class="pull-right"><b>PKR {{number_format($s['payable_within_due_date'])}}</b></span> </p>
                    <p class="p-100 m-0">*RS. 100/- per day will be charged after due date.</p>
                    <div class="bank-section">
                        <span class="bank-use">(Bank Use Only)</span>
                        <div class="row">
                            <div class="col-xs-6">
                                <p>Payable within Due Date:</p>
                                <p>L.P Surcharge:</p>
                                <p class="m-0">Payable after Due Date:</p>
                            </div>
                            <div class="col-xs-6">
                                <p class="total">PKR  {{number_format($s['payable_within_due_date'])}}</p>
                                <p class="total"></p>
                                <p class="total m-0"></p>
                            </div>
                        </div>
                    </div>

                    <div class="signature">
                        <div class="row">
                            <div class="col-xs-6">
                                <p class="depo">Depositor</p>
                            </div>
                            <div class="col-xs-6">
                                <p class="depo pull-right">Bank Officer</p>
                            </div>
                        </div>
                    </div>

                    <p class="last-line">This is computer generated document so does not require signature.</p>
                </div>
            </div>


        <div class="pagebreak"> </div>
        <div class="clearfix"></div>

        <?php endforeach; endif; ?>
            
        </div>
        <!-- Javascripts -->
        <script src="{{url('assets/plugins/jquery/jquery-3.1.0.min.js')}}"></script>
        <script src="{{url('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>


            <script type="text/javascript">
window.print();

</script>

    </body>
</html>