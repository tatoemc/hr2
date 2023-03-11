@extends('layouts.master')
@section('css')
<!-- Internal Nice-select css  -->
<link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet" />
@section('title')
تعديل موقع    
@stop


@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">المواقع</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تعديل
                موقع</span>
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
                        <a class="btn btn-primary btn-sm" href="{{ route('locations.index') }}">رجوع</a>
                    </div>
                </div><br>

                {!! Form::model($location, ['method' => 'PATCH','route' => ['locations.update', $location->id]]) !!}
                <div class="">

                    <div class="row mg-b-20">
                        <div class="parsley-input col-md-6" id="fnWrapper">
                            <label>اسم الموقع: <span class="tx-danger">*</span></label>
                            {!! Form::text('name', null, array('class' => 'form-control','required')) !!}
                        </div>
                        <div class="parsley-input col-md-6" id="fnWrapper">
                            <label> الانتاج: <span class="tx-danger">*</span></label>
                            {!! Form::text('production', null, array('class' => 'form-control','required')) !!}
                        </div>
                        
                    </div>

                    <div class="row mg-b-20">
                        <div class="parsley-input col-md-6" id="fnWrapper">
                            <label>اسم الشركة: <span class="tx-danger">*</span></label>
                            <select class="form-control" name="company_id">
                                @foreach($companies as $company)
                                <option value='{{ $company->id}}'{{$company->id == $location->company_id ? 'selected' : '' }}> {{ $company->name}}</option>
                                @endforeach
                               </select>
                        </div>

                        <div class="parsley-input col-md-6" id="fnWrapper">
                            <label> العنوان: <span class="tx-danger">*</span></label>
                            <textarea name="add" class="form-control">{{$location->add}}</textarea>
                        </div>

                        
                    </div>

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