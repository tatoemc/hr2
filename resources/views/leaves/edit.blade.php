@extends('layouts.master')
@section('css')
<!-- Internal Nice-select css  -->
<link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet" />
@section('title')
تعديل اجازة     
@stop


@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">الاجازات </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تعديل
                اجازة </span>
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
                        <a class="btn btn-primary btn-sm" href="{{ route('leaves.index') }}">رجوع</a>
                    </div>
                </div><br>

                {!! Form::model($leave, ['method' => 'PATCH','route' => ['leaves.update', $leave->id]]) !!}
                <div class="">

                    <div class="row mg-b-20">
                        
                        <div class="parsley-input col-md-8" id="fnWrapper">
                            <label>نوع الاجازة : <span class="tx-danger">*</span></label>
                            <select class="form-control" name="vacation_id">
                                @foreach($vacations as $vacation)
                                <option value='{{ $vacation->id}}'{{$vacation->id == $leave->vacation_id ? 'selected' : '' }}> {{ $vacation->name}}</option>
                                @endforeach
                               </select>
                        </div>

                    </div>
                    <div class="row mg-b-20">
                        <div class="parsley-input col-md-4 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label> تاريخ البداية: <span class="tx-danger">*</span></label>
                            <input class="form-control fc-datepicker" name="B_date" placeholder="YYYY-MM-DD" type="text" value="{{ $leave->B_date }}" required>
                        </div>
                       
                        <div class="parsley-input col-md-4 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label> تاريخ النهاية: <span class="tx-danger">*</span></label>
                            <input class="form-control fc-datepicker" name="E_date" placeholder="YYYY-MM-DD" type="text" value="{{ date('j-m-Y', strtotime($leave->E_date)) }}" required>
                        </div>

                    </div>
                    <div class="row mg-b-20">
                        <div class="parsley-input col-md-8 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label class="form-label">سبب الاجازة</label>
                            <textarea class="form-control"  name="note" rows="3">{{$leave->note}}</textarea>
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

<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>

<!--Internal  Parsley.min js -->

<!-- Internal Form-validation js -->
<script src="{{URL::asset('assets/js/form-validation.js')}}"></script>

<!--Internal  Parsley.min js -->
<script src="{{URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
<!-- Internal Form-validation js -->

<!--Internal  Datepicker js -->
<script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>


<script>
    var date = $('.fc-datepicker').datepicker({
        dateFormat: 'yy-mm-dd'
    }).val();

</script>
@endsection