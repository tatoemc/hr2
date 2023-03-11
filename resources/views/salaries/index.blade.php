@extends('layouts.master')
@section('css')

@section('title')
    المرتبات -   
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
            <h4 class="content-title mb-0 my-auto">المرتبات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة
                المرتبات</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection

@section('content')

@if (session()->has('add_salary'))
        <script>
            window.onload = function() {
                notif({
                    msg: "تم الأضافة بنجاح",
                    type: "success"
                })
            }
        </script>
@endif
@if (session()->has('update_salary'))
        <script>
            window.onload = function() {
                notif({
                    msg: "تم التعديل بنجاح",
                    type: "success"
                })
            }
        </script>
@endif
@if (session()->has('delete_salary'))
        <script>
            window.onload = function() {
                notif({
                    msg: "تم الحذف بنجاح",
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
                  
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive hoverable-table">
                    <table class="table table-hover" id="example1" data-page-length='50' style=" text-align: center;">
                        <thead>
                            <tr>
                                <th class="wd-10p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0">اسم الموظف</th>
                                <th class="wd-15p border-bottom-0">المرتب</th>
                                <th class="wd-15p border-bottom-0"> العلاوات</th>
                                <th class="wd-10p border-bottom-0">العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($salaries as $key => $salary)
                                <tr> 
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $salary->user->name }}</td>
                                    <td>{{ number_format($salary->amount)}}</td>
                                    <td>{{ number_format($salary->bonuses->sum('amount')) }} جنية</td> 
                                     
                                    <td>
                                        <a href="{{ route('salaries.show', $salary->id) }}" class="btn btn-sm btn-success"
                                            title="عرض"><i class="las la-eye"></i></a>

                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                            data-salary_id="{{ $salary->id }}" data-salaryname="{{ $salary->user->name }}"
                                            data-toggle="modal" href="#modaldemo8" title="حذف"><i
                                                class="las la-trash"></i></a>
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
                    <h6 class="modal-title">حذف المرتب</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('salaries.destroy', 'test') }}" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                        <input type="hidden" name="salary_id" id="salary_id" value="">
                        <input class="form-control" name="salaryname" id="salaryname" type="text" readonly>
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
        var salary_id = button.data('salary_id')
        var salaryname = button.data('salaryname')
        var modal = $(this)
        modal.find('.modal-body #salary_id').val(salary_id);
        modal.find('.modal-body #salaryname').val(salaryname);
    })

</script>


@endsection
