@extends('layouts.master')
@section('css')
    <!---Internal  Prism css-->
    <link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
    <!---Internal Input tags css-->
    <link href="{{ URL::asset('assets/plugins/inputtags/inputtags.css') }}" rel="stylesheet">
    <!--- Custom-scroll -->
    <link href="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet">
@endsection
@section('title')
    تفاصيل عضو هيئة التدريس
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">اعضاء هيئة التدريس</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    تفاصيل عضو هيئة التدريس</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session()->has('edit_user'))
        <script>
            window.onload = function() {
                notif({
                    msg: "تم تعديل اليتيم بنجاح",
                    type: "success"
                })
            }
        </script>
    @endif

    <!-- row opened -->
    <div class="row row-sm">

        <div class="col-xl-12">
            <!-- div -->
            <div class="card mg-b-20" id="tabs-style2">
                <div class="card-body">
                    <div class="text-wrap">
                        <div class="example">
                            <div class="panel panel-primary tabs-style-2">
                                <div class=" tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs main-nav-line">
                                            <li><a href="#tab4" class="nav-link active" data-toggle="tab">البيانات
                                                    الاساسية</a></li>
                                            <li><a href="#tab6" class="nav-link" data-toggle="tab">المرفقات</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body main-content-body-right border">
                                    <div class="tab-content">

                                        <div class="tab-pane active" id="tab4">
                                            <div class="table-responsive mt-15">

                                                <table class="table table-striped" style="text-align:center">
                                                    <tbody>
                                                        </tr>
                                                        <td colspan="5">
                                                            <img alt="user-img" class="avatar avatar-xl brround"
                                                                src="{{ asset('images/' . $user->images) }}">

                                                        </td>
                                                        </tr>

                                                        <tr>
                                                            <th scope="row">الاسم</th>
                                                            <th>البريد الألكتروني</th>
                                                            <th>الهاتف</th>
                                                            <th>تاريخ التعيين</th>
                                                        </tr>
                                                        <tr>
                                                            <td>{{ $user->name }}</td>
                                                            <th>{{ $user->email }}</th>
                                                            <td>{{ $user->phone }}</td>
                                                            <td>{{ date('d-m-Y', strtotime($user->created_at)) }}</td>

                                                        </tr>

                                                        <tr>
                                                            <th scope="row">رقم الاستاذ</th>
                                                            <th scope="row">النوع </th>
                                                            <th scope="row">الدرجة الوظيفية</th>
                                                            <th scope="row">الوظيفية</th>
                                                        </tr>
                                                        <tr>
                                                            <td>{{ $user->id }}</td>
                                                            <td>{{ $user->gender }} </td>
                                                            <td>{{ $user->degree->name }}</td>
                                                            <td>{{ $user->job->name }} </td>


                                                        <tr>

                                                            <td>
                                                                <a href=" {{ route('teachers.index') }} "
                                                                    class="btn btn-lg btn-block btn-primary">رجوع</a>

                                                            </td>

                                                        </tr>

                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>


                                        <div class="tab-pane" id="tab6">
                                            <!--المرفقات-->
                                            <div class="card card-statistics">

                                                <div class="table-responsive mt-15">
                                                    <table class="table center-aligned-table mb-0 table table-hover"
                                                        style="text-align:center">

                                                        <tbody>
                                                            <tr>

                                                                <td>
                                                                </td>
                                                                <td>
                                                                    <img src="{{ asset('certificate/' . $user->file) }}">
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- /div -->
        </div>

    </div>
    <!-- /row -->


@endsection
@section('js')
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Internal Jquery.mCustomScrollbar js-->
    <script src="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <!-- Internal Input tags js-->
    <script src="{{ URL::asset('assets/plugins/inputtags/inputtags.js') }}"></script>
    <!--- Tabs JS-->
    <script src="{{ URL::asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js') }}"></script>
    <script src="{{ URL::asset('assets/js/tabs.js') }}"></script>
    <!--Internal  Clipboard js-->
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.js') }}"></script>
    <!-- Internal Prism js-->
    <script src="{{ URL::asset('assets/plugins/prism/prism.js') }}"></script>

    <script>
        $('#delete_file').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id_file = button.data('id_file')
            var file_name = button.data('file_name')
            var invoice_number = button.data('invoice_number')
            var modal = $(this)

            modal.find('.modal-body #id_file').val(id_file);
            modal.find('.modal-body #file_name').val(file_name);
            modal.find('.modal-body #invoice_number').val(invoice_number);
        })
    </script>

    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>

@endsection
