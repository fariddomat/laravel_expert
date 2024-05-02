@extends('dashboard.layouts.app')
@section('title', 'ServiceComment')
@section('serviceCommentActive', 'active')

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
        <div class="card-header">التعليقات</div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="card-block">
                <table id="contactsTable" class="table table-hover display responsive nowrap mt-3" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الخدمة</th>
                            <th>الاسم</th>
                            <th>البريد الالكتروني</th>
                            <th>الرسالة</th>
                            <th>تاريخ الارسال</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comments as $index => $comment)
                           @if ($comment->service)
                           <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $comment->service->title }}</td>
                            <td>{{ $comment->name }}</td>
                            <td>{{ $comment->email }}</td>
                            <td>{{ $comment->content }}</td>

                            <td>{{ $comment->created_at }}</td>
                            <td>
                                <form action="{{ route('dashboard.service_comments.destroy', $comment->id) }}" method="post"
                                    style="display: inline-block">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button type="submit" class="btn btn-danger delete btn-sm"><i
                                            class="fas fa-trash"></i> حذف</button>
                                </form><!-- end of form -->
                            </td>

                        </tr>
                           @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
