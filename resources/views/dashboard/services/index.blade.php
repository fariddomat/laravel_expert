@extends('dashboard.layouts.app')
@section('title', 'Services')
@section('servicesActive', 'active')
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

    <script src="https://cdn.datatables.net/v/bs5/dt-2.0.3/b-3.0.1/r-3.0.1/rr-1.5.0/datatables.min.js" defer></script>
    <script>
        var ServicesReorderRoute = '{{ route('dashboard.services.reorder') }}';
    </script>
    <script>
        $(document).ready(function() {
            var table = $('#Table').DataTable({
                responsive: true,
                searching: true,
                paging: true,
                info: false,
                sorting: false,
                columnDefs: [{
                    orderable: false,
                    targets: [5]
                }],
                rowReorder: true,
                // language: {
                //     url: '//cdn.datatables.net/plug-ins/2.0.3/i18n/ar.json',
                // },

            });

            // Filter event handler for select dropdown
            $('#parentServiceSelect').on('change', function() {
                var selectedValue = $(this).val();
                table.column(2).search(selectedValue ? '^' + selectedValue + '$' : '', true, false).draw();
                console.log(selectedValue);
            });

            table.on("row-reorder", function(e, diff, edit) {
                var length = diff.length - 1;
                if (length > 0) {
                    var to = [];
                    to[diff[0].oldData] = diff[0].newData;
                    to[diff[length].oldData] = diff[length].newData;
                    var from = edit.triggerRow.data()[0];
                    var token = $("meta[name=csrf-token]").attr("content");
                    $.ajax({
                        url: ServicesReorderRoute,
                        type: "POST",
                        data: {
                            _token: token,
                            from: from,
                            to: to[from]
                        },
                        cache: false,
                        datatype: "JSON",
                        success: function(data) {
                            if (data.status == 1) {
                                // Update DataTable data (if necessary)
                                // for (var i = 0; i < diff.length; i++) {
                                //     var rowData = table.row(diff[i].node).data();
                                //     rowData[0] = Number(diff[i].newData) +
                                //     1; // Update row index
                                //     table.row(diff[i].node).data(rowData).draw();
                                // }
                                alert("reorder done.");
                                
                            } else {
                                alert("error occurred in reordering.");
                                location.reload(true);
                            }
                        },
                        error: function() {
                            alert("error.");
                            location.reload(true);
                        }
                    });
                }
            });
        });
    </script>
@endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="card-header">الخدمات - Services</div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card-block">
                <a href="{{ route('dashboard.services.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> إضافة
                </a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="card-block">
                <select name="" id="parentServiceSelect" class="form-control col-md-4" style="margin-bottom: 25px">
                    <option value="">All</option>
                    <option value="لا">الخدمات الرئيسية</option>
                    @foreach ($services as $service)
                        @if (!$service->parent_id)
                            <option value="{{ $service->title }}">{{ $service->title }}</option>
                        @endif
                    @endforeach
                </select>
                <table id="Table" class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="card-block">#</th>
                            <th scope="card-block">الاسم</th>
                            <th scope="card-block">خدمة فرعية؟</th>
                            <th scope="card-block">عرض</th>
                            <th scope="card-block">عرض في الصفحة الرئيسية</th>
                            <th scope="card-block">العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $index => $service)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $service->title }}</td>
                                <td
                                    data-parent-service-title="{{ $service->parentService ? $service->parentService->title : '' }}">
                                    @if ($service->parent_id == null)
                                        لا
                                    @else
                                        {{ $service->parentService->title }}
                                    @endif
                                </td>
                                <td>{{ $service->showed == 1 ? 'Showed' : 'Hidden' }}</td>
                                <td>{{ $service->show_at_home == 1 ? 'Showed' : 'Hidden' }}</td>
                                <td>
                                    <a href="{{ route('dashboard.services.edit', $service->slug) }}"
                                        class="btn btn-info btn-sm"><i class="fas fa-edit"></i> تعديل</a>
                                    <form action="{{ route('dashboard.services.destroy', $service->id) }}" method="post"
                                        style="display: inline-block">
                                        @csrf()
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger delete btn-sm"><i
                                                class="fas fa-trash"></i> حذف</button>
                                    </form><!-- end of form -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table><!-- end of table -->
                {{-- {{ $services->links() }} --}}
            </div>
        </div>
    </div>
@endsection
