@extends('layouts.master')
@section('css')

@section('title')
    الترقيات -   
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
            <h4 class="content-title mb-0 my-auto">الترقيات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة
                الترقيات</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection

@section('content')

@if (session()->has('Add_bromotions')) 
        <script>
            window.onload = function() {
                notif({
                    msg: "تم تقديم  الطلب",
                    type: "success"
                })
            }
        </script>
@endif
@if (session()->has('bromotion_add')) 
        <script>
            window.onload = function() {
                notif({
                    msg: "تم اضافة  بنجاح",
                    type: "success"
                })
            }
        </script>
@endif
@if (session()->has('bromotion_update'))
        <script>
            window.onload = function() {
                notif({
                    msg: "تم تعديل  بنجاح",
                    type: "success"
                })
            }
        </script>
@endif
@if (session()->has('bromotion_delete'))
        <script>
            window.onload = function() {
                notif({
                    msg: "تم حذف  بنجاح",
                    type: "success"
                })
            }
        </script>
@endif

<!-- row opened -->
<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="col-sm-1 col-md-2">
                    @can('اضافة ترقية')
                        <a class="btn btn-primary btn-sm" href="{{ route('bromotions.create') }}">طلب ترقيه</a>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive hoverable-table">
                    <table class="table table-hover" id="example1" data-page-length='50' style=" text-align: center;">
                        <thead>
                            <tr> 
                                <th class="wd-10p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0">اسم الموظف</th>
                                <th class="wd-15p border-bottom-0">الدرجة الوظيفية</th>
                                <th class="wd-15p border-bottom-0">التاريح </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bromotions as $key => $bromotion)
                                <tr> 
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $bromotion->user->name}}</td>
                                    <td>{{ $bromotion->degree->name  }}</td>
                                    <td>{{ date('d-m-y', strtotime($bromotion->created_at)) }}</td>
                                  
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--/div-->

    <!-- Modal effects -->
    <div class="modal" id="modaldemo8">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">حذف ترقية</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('bromotions.destroy', 'test') }}" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                        <input type="hidden" name="bromotion_id" id="bromotion_id" value="">
                        <input class="form-control" name="bromotionname" id="bromotionname" type="text" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-danger">تاكيد</button>
                    </div>
            </div>
            </form>
        </div>
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
        var bromotion_id = button.data('bromotion_id')
        var bromotionname = button.data('bromotionname')
        var modal = $(this)
        modal.find('.modal-body #bromotion_id').val(bromotion_id);
        modal.find('.modal-body #bromotionname').val(bromotionname);
    })

</script>


@endsection
