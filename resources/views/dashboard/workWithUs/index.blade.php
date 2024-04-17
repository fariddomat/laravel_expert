@extends('dashboard.layouts.app')
@section('title', 'Work With Us')
@section('workWithUsActive', 'active')

@section('styles')
    {{-- <link href="{{asset('dashboard/css/datatables.min.css')}}" rel="stylesheet"> --}}
    <link href="https://cdn.datatables.net/v/bs5/dt-2.0.3/b-3.0.1/r-3.0.1/rr-1.5.0/datatables.min.css" rel="stylesheet">
    <style>
        table.dataTable thead>tr>th.dt-orderable-asc,
        table.dataTable thead>tr>th.dt-orderable-desc,
        table.dataTable thead>tr>td.dt-orderable-asc,
        table.dataTable thead>tr>td.dt-orderable-desc {
            text-align: right;
        }
    </style>
    @endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js" defer></script>
<script
    src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.0.3/b-3.0.1/b-colvis-3.0.1/b-html5-3.0.1/b-print-3.0.1/r-3.0.1/rr-1.5.0/datatables.min.js"
    defer></script><script defer>
        $(document).ready(function() {
            $('#contactsTable').DataTable({
                responsive: true,
                searching: false,
                paging: false,
                info: false,
                sorting: false,
                language: {
                    url: '//cdn.datatables.net/plug-ins/2.0.3/i18n/ar.json',
                },
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'print',
                        exportOptions: {
                            columns: 'th:not(:last-child)'
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: 'th:not(:last-child)'
                        },
                        customize: function(xlsx) {
                            var sheet = xlsx.xl.worksheets['sheet1.xml'];
                            $('sheet', sheet).attr('rightToLeft', 'true');
                        }
                    }
                ]
            });
        });
    </script>
@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="card-header">استمارة التوظيف Work With Us Applications</div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="card-block">
                <table id="contactsTable" class="table table-hover display responsive nowrap mt-3" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>الجنس</th>
                            <th>تاريخ الميلاد</th>
                            <th>البريد الالكتروني</th>
                            <th>رقم الهاتف</th>
                            <th>العنوان</th>
                            <th>الحالة الاجتماعية</th>
                            <th>الدراسة</th>
                            <th>العمل الحالي</th>
                            <th>الخبرات</th>
                            <th>مستوى اللغة الانكليزية</th>
                            <th>المهارات</th>
                            <th>معلومات إضافية</th>
                            <th>كيف تساعد هذه الوظيفة</th>
                            <th>الحالة</th>
                            <th>حذف</th>
                            <th>تاريخ الارسال</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($workWithUss as $index => $workWithUs)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $workWithUs->full_name }}</td>
                                <td>{{ $workWithUs->gender }}</td>
                                <td>{{ $workWithUs->date_of_birth }}</td>
                                <td>{{ $workWithUs->email }}</td>
                                <td>{{ $workWithUs->mobile_number }}</td>
                                <td>{{ $workWithUs->address }}</td>
                                <td>{{ $workWithUs->marital_status }}</td>
                                <td>{{ $workWithUs->study_major }}</td>
                                <td>{{ $workWithUs->current_job }}</td>
                                <td>{{ $workWithUs->other_work_experiences }}</td>
                                <td>{{ $workWithUs->english_level }}</td>
                                <td>{{ implode(', ', json_decode($workWithUs->skills)) }}</td>
                                <td>{{ $workWithUs->additional_information }}</td>
                                <td>{{ $workWithUs->job_benefit_goals }}</td>
                                <td>
                                    @if ($workWithUs->status == 1)
                                        <button type="button"
                                            data-link="{{ route('dashboard.workWithUs.status', $workWithUs->id) }}"
                                            class="change-status btn btn-primary btn-sm"><i class="fas fa-check"></i>
                                            New</button>
                                    @else
                                        <span class="text-success">Done</span>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('dashboard.workWithUs.destroy', $workWithUs->id) }}" method="post"
                                        style="display: inline-block">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <button type="submit" class="btn btn-danger delete btn-sm"><i
                                                class="fas fa-trash"></i> حذف</button>
                                    </form><!-- end of form -->
                                </td>
                                <td>{{ $workWithUs->created_at }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
