@extends('layouts.master')
@section('css')
<link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
<link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
@section('title')
طلب ترقية   
@stop


@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">الترقيات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ طلب
                ترقية</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">


    <div class="col-lg-12 col-md-12">

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

        <div class="card">
            <div class="card-body">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-right">
                        <a class="btn btn-primary btn-sm" href="{{ route('bromotions.index') }}">رجوع</a>
                    </div>
                </div><br>
                @can('isAdmin')
                <div class="table-responsive hoverable-table">
                    <table class="table table-hover" id="example1" data-page-length='50' style=" text-align: center;">
                        <thead>
                            <tr>
                                <th class="wd-10p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0">اسم المستخدم</th>
                                <th class="wd-15p border-bottom-0">الدرجة الوظيفية</th>
                                <th class="wd-15p border-bottom-0">الوظيفية</th>
                                <th class="wd-15p border-bottom-0">التخصص</th>
                                <th class="wd-10p border-bottom-0">العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                                <tr> 
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->degree->name }}</td>
                                    <td>{{ $user->job->name }}</td>
                                    <td>{{ $user->specialty->name }}</td>
                                  
                                    <td>
                                            <a href="{{ route('bromotions.edit', $user->id) }}" class="btn btn-sm btn-success"
                                                title="ترقية">ترقية</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endcan

                @can('isTeacher')
                <form class="parsley-style-1" id="selectForm2" autocomplete="off" name="selectForm2"
                    action="{{route('bromotions.store')}}" enctype="multipart/form-data" method="post">
                    {{csrf_field()}}

                    <div class="">
                        
                        <div class="">
                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label> المرفقات: <span class="tx-danger">*</span></label>
                                <input type="file" required="" name="file" class="dropify" accept=".jpg, .png, image/jpeg, image/png"
                                data-height="70" />
                            </div>
                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <div class="row row-sm mg-b-20">
                                    <label class="form-label">ملاحظات</label>
                                      <textarea class="form-control"  name="note" rows="3"></textarea>
                                </div>
                            </div>
                         </div> 
                         <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button class="btn btn-main-primary pd-x-20" type="submit">طلب</button>
                        </div>
                    </div>  
                @endcan
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
<!-- Internal Nice-select js-->
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>
<!--Internal Fileuploads js-->
<script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
<!--Internal Fancy uploader js-->
<script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
<!--Internal  Parsley.min js -->
<script src="{{URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
<!-- Internal Form-validation js -->
<script src="{{URL::asset('assets/js/form-validation.js')}}"></script>

@endsection