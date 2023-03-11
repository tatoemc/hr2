@extends('layouts.master')
@section('css')

@section('title')
    الاستقالات -  
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
            <h4 class="content-title mb-0 my-auto">الاستقالات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة
                الاستقالات</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection

@section('content')

@if (session()->has('Add_demission')) 
        <script>
            window.onload = function() {
                notif({
                    msg: "تم اضافة  بنجاح",
                    type: "success"
                })
            }
        </script>
@endif
@if (session()->has('demissiones_edit'))
        <script>
            window.onload = function() {
                notif({
                    msg: "تم تعديل  بنجاح",
                    type: "success"
                })
            }
        </script>
@endif
@if (session()->has('demissiones_delete'))
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
                    @can('اضافة مستخدم')
                        <a class="btn btn-primary btn-sm" href="{{ route('demissions.create') }}"> تقديم طلب</a>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive hoverable-table">
                    <table class="table table-hover" id="example1" data-page-length='50' style=" text-align: center;">
                        <thead>
                            <tr>
                                <th class="wd-10p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0">تاريخ الاستقاله</th>
                                <th class="wd-15p border-bottom-0">اسم الموظف</th>
                                <th class="wd-20p border-bottom-0">ملاحظات</th>
                                <th class="wd-20p border-bottom-0">الحالة</th>
                                <th class="wd-10p border-bottom-0">العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($demissions as $key => $demissione)
                                <tr> 
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $demissione->date }}</td>
                                    <td>{{ $demissione->user->name }}</td>
                                    <td>{{ $demissione->note }}</td>
                                   

                                    <td>
                                        @if ($demissione->status == '1')
                                            <span class="label text-success d-flex">
                                                تم القبول
                                            </span>
                                        @elseif ($demissione->status == '2')
                                        <span class="label text-danger d-flex">
                                           تم الرفض
                                        </span>
                                        @else
                                            <span class="label text-warning d-flex">
                                                قيد الاجراء
                                            </span>
                                        @endif
                                    </td>

                                   
                                    <td width="15%">
                                        <a href="{{ route('demissions.show', $demissione->id) }}" class="btn btn-sm btn-success"
                                              title="عرض"><i class="las la-eye"></i></a>
                                              
                                              <a href="{{ route('demissions.edit', $demissione->id) }}" class="btn btn-sm btn-info"
                                                title="تعديل"><i class="las la-pen"></i></a>

                                       <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                            data-demissioneid="{{ $demissione->id }}"
                                            data-demissionename="{{ $demissione->user->name }}" data-toggle="modal"
                                            href="#modaldemo8" title="حذف"><i class="las la-trash"></i></a>
                                    </td>
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

    <!-- Modal effects -->
    <div class="modal" id="modaldemo8">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">حذف الاستقاله</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('demissions.destroy', 'test') }}" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية حذف استقالة ؟</p><br>
                        <input type="hidden" name="demissioneid" id="demissioneid" value="">
                        <input class="form-control" name="demissioneid" id="demissioneid" type="text" readonly>
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
        var demissioneid = button.data('demissioneid')
        var demissionename = button.data('demissionename')
        var modal = $(this)
        modal.find('.modal-body #demissioneid').val(demissioneid);
        modal.find('.modal-body #demissionename').val(demissionename);
    })

</script>


@endsection
