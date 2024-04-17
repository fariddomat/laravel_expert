@extends('dashboard.layouts.app')
@section('title', 'Visitor')
@section('visitorActive', 'active')
@section('styles')
    {{-- <link href="{{asset('dashboard/css/datatables.min.css')}}" rel="stylesheet"> --}}
    <link
        href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.0.3/b-3.0.1/b-colvis-3.0.1/b-html5-3.0.1/b-print-3.0.1/r-3.0.1/rr-1.5.0/datatables.min.css"
        rel="stylesheet">


@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js" defer></script>
    <script
        src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.0.3/b-3.0.1/b-colvis-3.0.1/b-html5-3.0.1/b-print-3.0.1/r-3.0.1/rr-1.5.0/datatables.min.js"
        defer></script>
    <script defer>
        $(document).ready(function() {
            var categoriesTable = $("#visitor").DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/2.0.3/i18n/ar.json',
                },
                searching: false,
                paging: false,
                info: false,
                columnDefs: [{
                    orderable: false,
                    targets: [3]
                }],
                rowReorder: true,
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

        $(document).ready(function() {
            var categoriesTable = $("#blogs").DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/2.0.3/i18n/ar.json',
                },
                searching: false,
                paging: false,
                info: false,
                columnDefs: [{
                    orderable: false,
                    targets: [3]
                }],
                rowReorder: true,
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

        $(document).ready(function() {
            var categoriesTable = $("#services").DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/2.0.3/i18n/ar.json',
                },
                searching: false,
                paging: false,
                info: false,
                columnDefs: [{
                    orderable: false,
                    targets: [3]
                }],
                rowReorder: true,
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

    <div style="background: #e4e5e6;">

        <div class="card container">
            <div class="row justify-content-center">
                <div class="card-header">
                    <h3>الموقع</h3>

                </div>
            </div>
            <div class=" justify-content-center">
                <div class="card-block">
                    <table class="table table-hover" id="visitor">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>العنوان url</th>
                                <th>اليوم</th>
                                <th>آخر أسبوع</th>
                                <th>آخر شهر</th>
                                <th>العدد الكلي</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($urlCounts as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->url }}</td>
                                    <td>{{ $item->today_count }}</td>
                                    <td>{{ $item->last_week_count }}</td>
                                    <td>{{ $item->last_month_count }}</td>
                                    <td>{{ $item->total_count }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table><!-- end of table -->
                </div>
            </div>
        </div>

        <div class="card container">
            <div class="row justify-content-center">
                <div class="card-header">
                    <h3>المدونات</h3>

                </div>
            </div>
            <div class=" justify-content-center">
                <div class="card-block">
                    <table class="table table-hover" id="blogs">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>العنوان</th>
                                <th>اليوم</th>
                                <th>آخر أسبوع</th>
                                <th>آخر شهر</th>
                                <th>العدد الكلي</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ views($item)->period($day)->count() }} / {{ views($item)->period($day)->unique()->count() }}</td>
                                    <td>{{ views($item)->period($week)->count() }} / {{ views($item)->period($week)->unique()->count() }}</td>
                                    <td>{{ views($item)->period($month)->count() }} / {{ views($item)->period($month)->unique()->count() }}</td>
                                    <td>{{ views($item)->count() }} / {{ views($item)->unique()->count() }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table><!-- end of table -->
                </div>
            </div>
        </div>

        <div class="card container">
            <div class="row justify-content-center">
                <div class="card-header">
                    <h3>الخدمات</h3>

                </div>
            </div>
            <div class=" justify-content-center">
                <div class="card-block">
                    <table class="table table-hover" id="services">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>الخدمة</th>
                                <th>اليوم</th>
                                <th>آخر أسبوع</th>
                                <th>آخر شهر</th>
                                <th>العدد الكلي</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ views($item)->period($day)->count() }} / {{ views($item)->period($day)->unique()->count() }}</td>
                                    <td>{{ views($item)->period($week)->count() }} / {{ views($item)->period($week)->unique()->count() }}</td>
                                    <td>{{ views($item)->period($month)->count() }} / {{ views($item)->period($month)->unique()->count() }}</td>
                                    <td>{{ views($item)->count() }} / {{ views($item)->unique()->count() }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table><!-- end of table -->
                </div>
            </div>
        </div>

    </div>

@endsection
