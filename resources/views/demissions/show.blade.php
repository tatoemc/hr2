@extends('layouts.master')
@section('css')
    <!--- Custom-scroll -->
    <link href="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet">
@endsection
@section('title')
    تفاصيل الاستقالة
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الاستقالات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    تفاصيل الاستقالة </span>
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
                            <a class="btn btn-primary btn-sm" href="{{ route('demissions.index') }}">رجوع</a>
                            
                        </div>
                    </div><br>
                    <div  class="table-responsive ">
                        <table class="table mg-b-0 text-md-nowrap" >
                            <thead>
                               <th colspan="2"> <h3>بيانات الاستقاله  رقم : {{ $demission->id }}</h3> </th>
                            </thead>
                            <tbody >
                               
                                <tr>
                                    <td>اسم الموظف</td>
                                    <td>{{ $demission->user->name }}</td>
                                </tr>
                                <tr>
                                    <td> الملاحظات</td>
                                    <td>{{ $demission->note }}</td>
                                </tr>
                                <tr>
                                    <td>التاريخ</td>
                                    <td>{{ $demission->date }}</td>
                                </tr>
                               
                                <tr>
                                    <td> 
                                        <form class="parsley-style-1" id="selectForm2" autocomplete="off" name="selectForm2"
                                        action="{{url('updatedemission')}}" method="post">
                                        {{ method_field('get') }}
                                        {{csrf_field()}} 
                                        <input type="hidden" name="id" value="{{$demission->id}}">
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
