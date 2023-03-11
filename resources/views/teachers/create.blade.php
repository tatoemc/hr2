@extends('layouts.master')
@section('css')
<!-- Internal Nice-select css  -->
<link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
@section('title')
اضافة استاذ 
@stop


@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">الاساتذة</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ اضافة
                استاذ</span>
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
                        <a class="btn btn-primary btn-sm" href="{{ route('teachers.index') }}">رجوع</a>
                    </div>
                </div><br>
                <form class="parsley-style-1" id="selectForm2" autocomplete="off" name="selectForm2"
                    action="{{route('teachers.store')}}" enctype="multipart/form-data" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="user_type" value="teacher">
                    <div class="">

                        <div class="row mg-b-20">
                            <div class="parsley-input col-md-4" id="fnWrapper">
                                <label>اسم الاستاذ: <span class="tx-danger">*</span></label>
                                <input class="form-control form-control-sm mg-b-20"
                                    data-parsley-class-handler="#lnWrapper" name="name" required="" type="text" value="{{ old('name') }}">
                            </div>

                            <div class="parsley-input col-md-4 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label> البريد الألكتروني: <span class="tx-danger">*</span></label>
                                <input class="form-control form-control-sm mg-b-20"
                                data-parsley-class-handler="#lnWrapper" name="email" required="" type="email" value="{{ old('email') }}">
                            </div>
                           
                        </div>
                        <div class="row mg-b-20">
                            <div class="col-lg-3">
                                <label>  القسم: <span class="tx-danger">*</span></label>
                                <select class="form-control"  name="dept_id" required="">
                                    <option value="" selected disabled> --اختيار القسم--</option>
                                    @foreach ($depts as $dept)
                                    <option value="{{$dept->id}}">{{$dept->name }}</option>
                                @endforeach
                                </select>
                            </div>

                            <div class="col-lg-3">
                                <label>  الوظيفة: <span class="tx-danger">*</span></label>
                                <select class="form-control"  name="job_id" required="">
                                    <option value="" selected disabled> --اختيار الوظيفة--</option>
                                    @foreach ($jobs as $job)
                                    <option value="{{$job->id}}">{{$job->name }}</option>
                                @endforeach
                                </select>
                            </div>

                            <div class="col-lg-3">
                                <label>  التخصص: <span class="tx-danger">*</span></label>
                                <select class="form-control"  name="specialty_id" required="">
                                    <option value="" selected disabled> --اختيار التخصص--</option>
                                       @foreach ($specialties as $specialty)
                                           <option value="{{$specialty->id}}">{{$specialty->name }}</option>
                                       @endforeach
                                </select>
                                
                            </div>
                            <div class="col-lg-3">
                                <label> اسم الدرجة الوظيفية: <span class="tx-danger">*</span></label>
                                <select class="form-control"  name="degree_id" required="">
                                    <option value="" selected disabled> --اختيار الدرجة الوظيفية--</option>
                                       @foreach ($degrees as $degree)
                                           <option value="{{$degree->id}}">{{$degree->name }}</option>
                                       @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mg-b-20">
                            <div class="parsley-input col-md-6" id="fnWrapper">
                                <label> النوع: <span class="tx-danger">*</span></label>
                                <select name="gender" class="form-control  nice-select  custom-select" required="" >
                                <option value="ذكر">ذكر</option>
                                <option value="انثى">انثى</option>
                            </select>
                            </div>
                            <div class="parsley-input col-md-6" id="fnWrapper">
                                <label> الهاتف: <span class="tx-danger">*</span></label>
                                <input class="form-control form-control-sm mg-b-20"
                                    data-parsley-class-handler="#lnWrapper" name="phone" required="" type="text" value="{{ old('phone') }}">
                            </div>
                        </div>
                        <div class="row mg-b-20">
                            
                        </div>

                    </div>

                    <div class="row mg-b-20">
                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label>كلمة المرور: <span class="tx-danger">*</span></label>
                            <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                                name="password" required="" type="password">
                        </div>

                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label> تاكيد كلمة المرور: <span class="tx-danger">*</span></label>
                            <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                                name="confirm-password" required="" type="password">
                        </div>
                    </div>

                    <div class="row mg-b-20">
                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label> المرفقات: <span class="tx-danger">*</span></label>
                            <input type="file" required="" name="file" class="dropify" accept=".jpg, .png, image/jpeg, image/png"
                            data-height="70" />
                        </div>

                     
                    </div>

                    <div class="row row-sm mg-b-20">
                        <label class="form-label">العنوان</label>
                          <textarea class="form-control"  name="address" rows="3">{{ old('add') }}</textarea>
                    </div>

                    <div class="row mg-b-20">
                        <div class="col-xs-6 col-md-6">
                            {{-- <div class="form-group">
                                <label class="form-label"> صلاحية المستخدم</label>
                                {!! Form::select('roles_name[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                            </div> --}}
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button class="btn btn-main-primary pd-x-20" type="submit">تاكيد</button>
                    </div>
                </form>
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