@extends('layouts.master')
@section('css')

@section('title')
     التخصصات
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
            <h4 class="content-title mb-0 my-auto"> التخصصات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة
                 التخصصات</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection

@section('content') 

@if (session()->has('delete_specialty')) 
<script>
    window.onload = function() {
        notif({
            msg: "تم الحذف  بنجاح",
            type: "success"
        })
    }
</script>
@endif

@if (session()->has('Add_specialty'))
<script>
    window.onload = function() {
        notif({
            msg: "تم الاضافة بنجاح",
            type: "success"
        })
    }
</script>
@endif

@if (session()->has('update_specialty'))
<script>
    window.onload = function() {
        notif({
            msg: "تم التعديل بنجاح",
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

                        <a class="modal-effect btn btn-lg btn-block btn-primary" data-effect="effect-scale"
                        data-toggle="modal" href="#add">أضافة </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive hoverable-table">
                    <table class="table table-hover" id="example1" data-page-length='50' style=" text-align: center;">
                        <thead>
                            <tr>
                                <th class="wd-10p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0">اسم  الكلية</th>
                                <th class="wd-10p border-bottom-0">العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($specialtys as $index => $specialty)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $specialty->name }}</td>
                                    <td>
                                        <a href="{{ route('specialties.show', $specialty->id) }}" class="btn btn-sm btn-success"
                                              title="عرض"><i class="las la-eye"></i></a>
                                              
                                              <a href="{{ route('specialties.edit', $specialty->id) }}" class="btn btn-sm btn-info"
                                                title="تعديل"><i class="las la-pen"></i></a>

                                       <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                            data-specialty_id="{{ $specialty->id }}"
                                            data-specialtyname="{{ $specialty->name }}" data-toggle="modal"
                                            href="#modaldemo8" title="حذف"><i class="las la-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--/div-->

    <!-- Delete -->
    <div class="modal" id="modaldemo8">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">حذف تخصص</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('specialties.destroy', 'test') }}" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                        <input type="hidden" name="specialty_id" id="specialty_id" value="">
                        <input class="form-control" name="specialtyname" id="specialtyname" type="text" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-danger">تاكيد</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
    <!-- Add -->
    <div class="modal" id="add">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">

                    <h6 class="modal-title">اضافة تخصص </h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>

                </div>
                <div class="modal-body">
                    <form action="{{ route('specialties.store') }}" method="post" autocomplete="off">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="exampleInputEmail1">اسم التخصص </label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                      
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">حفظ</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Basic modal -->


    </div>


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
        var specialty_id = button.data('specialty_id')
        var specialtyname = button.data('specialtyname')
        var modal = $(this)
        modal.find('.modal-body #specialty_id').val(specialty_id);
        modal.find('.modal-body #specialtyname').val(specialtyname);
    })
</script>


@endsection
