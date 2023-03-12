@extends('layouts.master')
@section('css')

@section('title')
    البرامج
@stop

<!-- Internal Data table css -->

<link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
<!--Internal   Notify -->
<link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />

@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">البرامج</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة
                البرامج</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection

@section('content')

@if (session()->has('change-password'))
<script>
    window.onload = function() {
        notif({
            msg: "تم التعديل كلمة المرور بنجاح",
            type: "success"
        })
    }
</script>
@endif


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
        <div class="card">
            <div class="card-header pb-0">
                <div class="col-sm-1 col-md-2">
                   
                </div>
            </div>
            <div class="card-body">
                {!! Form::open(['url'=>'/changePassword', 'method'=>'POST','autocomplete'=>'of','files'=>'true','class'=>'form']) !!}  
                {{csrf_field()}}

            <div class="">

                <div class="row mg-b-20">
                    <div class="parsley-input col-md-6" id="fnWrapper">
                        <label> كلمة المرور الحالية: <span class="tx-danger">*</span></label>
                        <input id="current-password" type="password" class="form-control" name="current-password" autocomplete="off" required>
                       
                    </div>
                </div>

                <div class="row mg-b-20">
                    <div class="parsley-input col-md-6" id="fnWrapper">
                        <label> كلمة المرور الجديدة: <span class="tx-danger">*</span></label>
                        <input id="new-password" type="password" class="form-control" name="new-password" required>
                    </div>
                </div>

                <div class="row mg-b-20">
                    <div class="parsley-input col-md-6" id="fnWrapper">
                        <label> تأكيد كلمة المرور الجديدة: <span class="tx-danger">*</span></label>
                        <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                    </div>
                </div>


            </div>


            <div class="col-xs-3 col-sm-3 col-md-3 text-center">
                <button class="btn btn-main-primary pd-x-20" type="submit">تحديث</button>
            </div>
        </form>
            </div>
        </div>
    </div>
    <!--/div-->

   

</div>

</div>
<!-- /row -->
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
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
<!--Internal  Datatable js -->
<script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
<!--Internal  Notify js -->
<script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
<!-- Internal Modal js-->
<script src="{{ URL::asset('assets/js/modal.js') }}"></script>

<script>
    $('#modaldemo8').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var degree_id = button.data('degree_id')
        var degreename = button.data('degreename')
        var modal = $(this)
        modal.find('.modal-body #degree_id').val(degree_id);
        modal.find('.modal-body #degreename').val(degreename);
    })
</script>


@endsection
