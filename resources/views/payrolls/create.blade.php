@extends('layouts.master')
@section('css')
<!-- Internal Nice-select css  -->
<link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet" />
@section('title')
اضافة مرتب
@stop


@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">المرتبات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ اضافة
                مرتب</span>
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
                        <a class="btn btn-primary btn-sm" href="{{ route('salaries.index') }}">رجوع</a>
                    </div>
                </div><br>
                <form class="parsley-style-1" id="selectForm2" autocomplete="off" name="selectForm2"
                    action="{{route('salaries.store')}}" method="post">
                    {{csrf_field()}}

                    <div class="">
                        <label> <span class="tx-danger">*</span> ايجب أضافة الاستاذ او الموظف اولاً </label>
                        <div class="row mg-b-20">
                            <div class="parsley-input col-md-8">
                                <label>  الاسم: <span class="tx-danger">*</span></label>
                                    <select class="form-control"  name="user_id">
                                        <option value="" selected disabled> --اختيار الاسم --</option>
                                           @foreach ($users as $user)
                                               <option value="{{$user->id}}">{{$user->name }}</option>
                                           @endforeach
                                    </select>
                                
                            </div>
                            
                        </div>
                        <div>
                            <div class="parsley-input col-md-8" id="fnWrapper">
                                <label> المرتب: <span class="tx-danger">*</span></label>
                                <input class="form-control form-control-sm mg-b-20"
                                    data-parsley-class-handler="#lnWrapper" name="amount" required="" type="number" value="{{ old('amount') }}">
                            </div>
                        </div>

                        <div class="parsley-input col-md-12">
                            <label>  العلاوة: <span class="tx-danger">*</span></label>
                            <div class="col-lg-4">
                                <ul id="treeview1">
                                    
                                    @foreach($bonues as $bonus)
                                    <label
                                        style="font-size: 16px;">{{ Form::checkbox('bonues[]', $bonus->id, false, array('class' => 'form control')) }}
                                        {{ $bonus->name }}</label>
        
                                    @endforeach
                                    </li>
        
                                </ul>
                                </li>
                                </ul>
                            </div>

                           
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

<!--Internal  Parsley.min js -->
<script src="{{URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
<!-- Internal Form-validation js -->
<script src="{{URL::asset('assets/js/form-validation.js')}}"></script>
@endsection