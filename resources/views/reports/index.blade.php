@extends('layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">

    <!-- Internal Spectrum-colorpicker css -->
    <link href="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.css') }}" rel="stylesheet">

    <!-- Internal Select2 css -->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">

@section('title')
التقارير
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">التقارير</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/تقارير عامة</span>
                
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>خطا</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- row -->
<div class="row">

    <div class="col-xl-12">
        <div class="card mg-b-20">


            <div class="card-header pb-0">
                <div class="card-header bg-black"><button class="btn btn-primary  float-right mt-3 mr-2" id="print_Button" onclick="printDiv()"> <i class="mdi mdi-printer ml-1"></i>طباعة</button></div>
            </div>
            <div class="card-body" id="print">
                
                @if (isSet($depts))
                <div class="table-responsive hoverable-table">
                    <table class="table table-hover" style=" text-align: center;">
                        <thead>
                            <tr>
                                <td><img
                                    src="{{ URL::asset('assets/img/brand/logo.png') }}"
                                     alt="logo"></td>
                                <td>
                                    <h2>
                                        جامعة مروي التكنلوجية <br> قائمة الاقسام
                                    </h2>
                                </td>
                            </tr>
                            <tr>
                                <th class="wd-10p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0">اسم القسم</th>
                                <th class="wd-15p border-bottom-0">الكلية</th>
                                <th class="wd-15p border-bottom-0">عدد الاساتذة</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($depts as $index => $dept)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $dept->name }}</td>
                                    <td>{{ $dept->college->name }} </td>
                                    <td>{{ $dept->users->count() }} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
                @if (isSet($leaves))
                <div class="table-responsive hoverable-table">
                    <table class="table table-hover" style=" text-align: center;">
                        <thead>
                            <tr>
                                <td><img
                                    src="{{ URL::asset('assets/img/brand/logo.png') }}"
                                     alt="logo"></td>
                                <td width="30%">
                                    <h2>
                                        جامعة مروي التكنلوجية <br>  الاجازات
                                    </h2>
                                </td>
                            </tr>
                            <tr>
                                <th class="wd-15p border-bottom-0">رقم الاجازة</th>
                                <th class="wd-15p border-bottom-0">الموظف</th>
                                <th class="wd-15p border-bottom-0">نوع الاجازة</th>
                                <th class="wd-15p border-bottom-0">تاريخ البداية</th>
                                <th class="wd-15p border-bottom-0">تاريخ النهاية</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($leaves as $index => $leave)
                                <tr>
                                    
                                    <td>{{ $leave->id }}</td>
                                    <td>{{ $leave->user->name }} </td>
                                    <td>{{ $leave->vacation->name }} </td>
                                    <td>{{ $leave->B_date }} </td>
                                    <td>{{ $leave->E_date }} </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
                @if (isSet($teachers))
                <div class="table-responsive hoverable-table">
                    <table class="table table-hover" style=" text-align: center;">
                        <thead>
                            <tr>
                                <td><img
                                    src="{{ URL::asset('assets/img/brand/logo.png') }}"
                                     alt="logo"></td>
                                <td width="30%">
                                    <h2>
                                        جامعة مروي التكنلوجية <br>  اعضاء هيئة التدريس
                                    </h2>
                                </td>
                            </tr>
                            <tr>
                                <th class="wd-15p border-bottom-0">الرقم</th>
                                <th class="wd-15p border-bottom-0">الاسم</th>
                                <th class="wd-15p border-bottom-0">الكلية</th>
                                <th class="wd-15p border-bottom-0">القسم</th>
                                <th class="wd-15p border-bottom-0">الدرجة الوظيفية</th>
                                <th class="wd-15p border-bottom-0">التخصص</th>
                                <th class="wd-15p border-bottom-0">الوظيفة</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teachers as $index => $teacher)
                                <tr>
                                    
                                    <td>{{ $teacher->id }}</td>
                                    <td>{{ $teacher->name }} </td>
                                    <td>{{ $teacher->dept->college->name }} </td> 
                                    <td>{{ $teacher->dept->name }} </td> 
                                    <td>{{ $teacher->degree->name }} </td>
                                    <td>{{ $teacher->specialty->name }} </td>
                                    <td>{{ $teacher->job->name }} </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
                @if (isSet($salaries))
                <div class="table-responsive hoverable-table">
                    <table class="table table-hover" style=" text-align: center;">
                        <thead>
                            <tr>
                                <td><img
                                    src="{{ URL::asset('assets/img/brand/logo.png') }}"
                                     alt="logo"></td>
                                <td width="30%">
                                    <h2>
                                        جامعة مروي التكنلوجية <br>  مجموع مرتبات اعضاء هيئة التدريس حسب الشهر
                                    </h2>
                                </td>
                            </tr>
                            <tr>
                                <th class="wd-15p border-bottom-0">الرقم</th>
                                <th class="wd-15p border-bottom-0">الاسم</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($salaries as $index => $salary)
                                <tr>
                                    
                                    <td> شهر {{$salary->month}}</td>
                                    <td>{{$salary->amount}}</td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
<!--Internal  Datatable js -->
<script src="{{ URL::asset('assets/js/table-data.js') }}"></script>

<!--Internal  Datepicker js -->
<script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
<!--Internal  jquery.maskedinput js -->
<script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
<!--Internal  spectrum-colorpicker js -->
<script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
<!-- Internal Select2.min js -->
<script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
<!--Internal Ion.rangeSlider.min js -->
<script src="{{ URL::asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
<!--Internal  jquery-simple-datetimepicker js -->
<script src="{{ URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js') }}"></script>
<!-- Ionicons js -->
<script src="{{ URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js') }}"></script>
<!--Internal  pickerjs js -->
<script src="{{ URL::asset('assets/plugins/pickerjs/picker.min.js') }}"></script>
<!-- Internal form-elements js -->
<script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>

<script type="text/javascript">
        
    function printDiv() {
        var printContents = document.getElementById('print').innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        location.reload();
    }

</script>

@endsection
