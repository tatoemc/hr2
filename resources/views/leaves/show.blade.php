@extends('layouts.master')
@section('css')
    <!--- Custom-scroll -->
    <link href="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet">
@endsection
@section('title')
    تفاصيل الاجازة
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الاجازات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    تفاصيل الاجازة</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- row opened -->
    <div class="row row-sm">

        <div class="col-xl-12">
            <!-- div -->
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('leaves.index') }}">رجوع</a>

                        </div>
                    </div><br>
                    <div class="table-responsive ">
                        <table class="table mg-b-0 text-md-nowrap">
                            <thead>
                                <th colspan="2">
                                    <h3>بيانات الاجازة رقم : {{ $leave->id }}</h3>
                                </th>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>اسم الموظف</td>
                                    <td>{{ $leave->user->name }}</td>
                                </tr>
                                <tr>
                                    <td>نوع الاجازة</td>
                                    <td>{{ $leave->vacation->name }}</td>
                                </tr>
                                <tr>
                                    <td>تاريخ بداية الاجازة</td>
                                    <td>{{ date('j-m-Y', strtotime($leave->B_date)) }}
                                    <td>
                                </tr>
                                <tr>
                                    <td>تاريخ نهاية الاجازة</td>
                                    <td>{{ date('j-m-Y', strtotime($leave->E_date)) }}
                                    <td>
                                </tr>
                                <tr>
                                    <td>تاريخ تقديم الاجازة</td>
                                    <td>{{ date('j-m-Y', strtotime($leave->date)) }}
                                    <td>
                                </tr>
                                <tr>
                                    <td>ملاحظات</td>
                                    <td>{{ $leave->note }}<td>
                                    
                                </tr>
                                <tr>
                                    <td>
                                        <form class="parsley-style-1" id="selectForm2" autocomplete="off" name="selectForm2"
                                        action="{{url('leaveUpdate')}}" method="post">
                                       
                                        {{csrf_field()}}
                                        <input type="hidden" name="id" value="{{$leave->id}}">
                                        <select class="form control" name="status" id="">
                                            <option value="" selected disabled> --اختيار --</option>
                                            <option value="1">قبول</option>
                                            <option value="2">رفض</option>
                                            
                                        </select>
                                        
                                            <button class="btn btn-sm btn-success">تنفيذ</button>

                                        </form>
                                    </td>
                                   
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /row -->


    @endsection
    @section('js')
        <!-- Internal Select2 js-->
        <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
        <!-- Internal Jquery.mCustomScrollbar js-->
        <script src="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.concat.min.js') }}"></script>
        <!-- Internal Input tags js-->
        <script src="{{ URL::asset('assets/plugins/inputtags/inputtags.js') }}"></script>
        <!--- Tabs JS-->
        <script src="{{ URL::asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js') }}"></script>
        <script src="{{ URL::asset('assets/js/tabs.js') }}"></script>
        <!--Internal  Clipboard js-->
        <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.js') }}"></script>
        <!-- Internal Prism js-->
        <script src="{{ URL::asset('assets/plugins/prism/prism.js') }}"></script>
    @endsection
