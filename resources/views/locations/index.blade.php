@extends('layouts.master')
@section('css')

@section('title')
    المواقع
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
            <h4 class="content-title mb-0 my-auto">المواقع</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة
                المواقع</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection

@section('content')

@if (session()->has('delete_location'))
<script>
    window.onload = function() {
        notif({
            msg: "تم الحذف  بنجاح",
            type: "success"
        })
    }
</script>
@endif

@if (session()->has('Add_location'))
<script>
    window.onload = function() {
        notif({
            msg: "تم الاضافة بنجاح",
            type: "success"
        })
    }
</script>
@endif

@if (session()->has('edit_location'))
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
                        data-toggle="modal" href="#add">أضافة</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive hoverable-table">
                    <table class="table table-hover" id="example1" data-page-length='50' style=" text-align: center;">
                        <thead>
                            <tr>
                                <th class="wd-10p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0">اسم الموقع</th>
                                <th class="wd-15p border-bottom-0">الانتاج</th>
                                <th class="wd-10p border-bottom-0">اسم الشركة</th>
                                <th class="wd-10p border-bottom-0">العنوان</th>
                                <th class="wd-10p border-bottom-0">العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($locations as $index => $location)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $location->name }}</td>
                                    <td>{{ $location->production }} كيلو</td>
                                    <td>{{ $location->company->name }}</td>
                                    <td>{{ $location->add }}</td>
                                    <td>
                                        <a href="{{ route('locations.edit', $location->id) }}" class="btn btn-sm btn-info"
                                            title="تعديل"><i class="las la-pen"></i></a>

                                        <a href="{{ route('locations.show', $location->id) }}" class="btn btn-sm btn-success"
                                              title="عرض"><i class="las la-eye"></i></a>

                                       <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                            data-location_id="{{ $location->id }}"
                                            data-locationname="{{ $location->name }}" data-toggle="modal"
                                            data-locationadd="{{ $location->add }}" data-toggle="modal"
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
                    <h6 class="modal-title">حذف قسم</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('locations.destroy', 'test') }}" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                        <input type="hidden" name="location_id" id="location_id" value="">
                        <input class="form-control" name="locationname" id="locationname" type="text" readonly>
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

                    <h6 class="modal-title">اضافة موقع</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>

                </div>
                <div class="modal-body">
                    <form action="{{ route('locations.store') }}" method="post" autocomplete="off">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="exampleInputEmail1">اسم الموقع <span class="tx-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">الانتاج<span class="tx-danger">*</span></label>
                            <input type="number" class="form-control" id="production" name="production" required>
                        </div>
                        @can('isAdmin')
                        <div class="form-group">
                            <label for="exampleInputEmail1">اسم الشركة <span class="tx-danger">*</span></label>
                            <select class="form-control"  name="company_id">
                                <option value="" selected disabled> --اختيار الشركة--</option>
                                @foreach ($companies as $company)
                                    <option value="{{$company->id}}">{{$company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @endcan
                        <div class="parsley-input col-md-6" id="fnWrapper">
                            <label> العنوان: <span class="tx-danger">*</span></label>
                            <textarea class="form-control"  name="add" rows="3"></textarea>
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
        var location_id = button.data('location_id')
        var locationname = button.data('locationname')
        var locationadd = button.data('locationadd')
        var production = button.data('production')
        var modal = $(this)     // locationadd
        modal.find('.modal-body #location_id').val(location_id);
        modal.find('.modal-body #locationname').val(locationname);
        modal.find('.modal-body #locationadd').val(locationadd);
        modal.find('.modal-body #production').val(production);
    })
</script>


@endsection
