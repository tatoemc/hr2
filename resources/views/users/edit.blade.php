@extends('layouts.master')
@section('css')
<!-- Internal Nice-select css  -->
<link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet" />
@section('title')
تعديل مستخدم
@stop


@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">المستخدمين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تعديل
                مستخدم</span>
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
                        <a class="btn btn-primary btn-sm" href="{{ route('users.index') }}">رجوع</a>
                    </div>
                </div><br>

                {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
                <div class="">

                    <div class="">

                        <div class="row mg-b-20">
                            <div class="parsley-input col-md-4" id="fnWrapper">
                                <label>اسم المستخدم: <span class="tx-danger">*</span></label>
                                <input class="form-control form-control-sm mg-b-20"
                                    data-parsley-class-handler="#lnWrapper" name="name" required="" type="text" value="{{ $user->name }}">
                            </div> 

                            <div class="parsley-input col-md-4 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label> البريد الألكتروني: <span class="tx-danger">*</span></label>
                                <input class="form-control form-control-sm mg-b-20"
                                data-parsley-class-handler="#lnWrapper" name="email" required="" type="email" value="{{ $user->email }}">
                            </div>
                            <div class="parsley-input col-md-4 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label class="form-label">نوع المستخدم</label>
                            <select name="user_type" id="select-beast" class="form-control  nice-select  custom-select">
                               
                                <option value='user'{{ $user->user_type == 'user' ? 'selected' : ''}}> موظف </option>
                                <option value='admin'{{ $user->user_type == 'admin' ? 'selected' : ''}}> مدير </option> 
                                <option value='teacher'{{ $user->user_type == 'teacher' ? 'selected' : ''}}> عضوء هيئة تدريس </option>
                                <option value='trainee'{{ $user->user_type == 'trainee' ? 'selected' : ''}}> متدرب </option> 
                            </select>
                            </div>
                        </div>
                        <div class="row mg-b-20">
                            <div class="col-lg-4">
                                <label>  الوظيفة: <span class="tx-danger">*</span></label>
                                <select class="form-control"  name="job_id">
                                       @foreach ($jobs as $job)
                                           <option value='{{ $job->id}}'{{$job->id == $user->job_id ? 'selected' : '' }}> {{ $job->name}}</option>
                                       @endforeach
                                </select>
                            </div>

                            <div class="col-lg-4">
                                <label> اسم الدرجة الوظيفية: <span class="tx-danger">*</span></label>
                                <select class="form-control"  name="degree_id">
                                       @foreach ($degrees as $degree)
                                       <option value='{{ $degree->id}}'{{$degree->id == $user->degree_id ? 'selected' : '' }}> {{ $degree->name}}</option>
                                       @endforeach
                                </select>
                            </div>

                            <div class="col-lg-4">
                                <label>  التخصص: <span class="tx-danger">*</span></label>
                                <select class="form-control"  name="specialty_id">
                                    <option value="" selected disabled> --اختيار التخصص--</option>
                                       @foreach ($specialties as $specialty)
                                       <option value='{{ $specialty->id}}'{{$specialty->id == $user->specialty_id ? 'selected' : '' }}> {{ $specialty->name}}</option>
                                       @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mg-b-20">
                            <div class="parsley-input col-md-6" id="fnWrapper">
                                <label> النوع: <span class="tx-danger">*</span></label>
                                <select name="gender" id="select-beast" class="form-control  nice-select  custom-select">
                                
                                <option value='ذكر'{{ $user->gender == 'ذكر' ? 'selected' : ''}}> ذكر </option>
                                <option value='انثى'{{ $user->gender == 'انثى' ? 'selected' : ''}}> انثى </option> 
                               </select> 
                            </select>
                            </div>
                            <div class="parsley-input col-md-6" id="fnWrapper">
                                <label> الهاتف: <span class="tx-danger">*</span></label>
                                <input class="form-control form-control-sm mg-b-20"
                                    data-parsley-class-handler="#lnWrapper" name="phone" required="" type="text" value="{{ $user->phone }}">
                            </div>
                        </div>
                        <div class="row mg-b-20">
                            
                        </div>

                    </div>

                   

                    <div class="row row-sm mg-b-20">
                        <label class="form-label">العنوان</label>
                          <textarea class="form-control"  name="address" rows="3">{{$user->address}}</textarea>
                    </div>
                    
                <div class="mg-t-30">
                    <button class="btn btn-main-primary pd-x-20" type="submit">تحديث</button>
                </div>
                {!! Form::close() !!}
            </div>
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

<!--Internal  Parsley.min js -->
<script src="{{URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
<!-- Internal Form-validation js -->
<script src="{{URL::asset('assets/js/form-validation.js')}}"></script>
@endsection