@extends('dashboard.layouts.app')
@section('title', 'Order Services')
@section('orderservicesActive', 'active')
@section('styles')
    <link href="{{ asset('dashboard/css/datatables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/css/removeSortingDataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/css/datatablesStyles.css') }}" rel="stylesheet">
@endsection
@section('scripts')
    <script src="{{ asset('dashboard/js/orderServices.js') }}"></script>
    <script src="{{ asset('dashboard/js/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#orderServicesTable').DataTable({
                responsive: true,
                searching: false,
                paging: false,
                info: false,
                sorting: false,
            });
        });
    </script>
@endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="card-header">طلبات الخدمات - Order Services</div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card-block">
                <table id="orderServicesTable" class="table table-hover display responsive nowrap" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>الخدمة</th>
                            <th>البريد الالكتروني</th>
                            <th>الهاتف</th>
                            <th>الرسالة</th>
                            <th>تاريخ الارسال</th>
                            <th>IP</th>
                            <th>الحالة</th>
                            <th>حذف</th>
                            <th>ملاحظة</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderServices as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->service->title }}</td>
                                <td>{{ $order->email }}</td>
                                <td><a href="tel:{{ $order->mobile }}"
                                        style="text-decoration: none;">{{ $order->mobile }}</a></td>
                                <td>{{ $order->message }}</td>
                                <td>{{ $order->created_at->format('Y-m-d H:i:s') }}</td>
                                <td>{{ $order->ip }}</td>
                                <td>
                                    @if ($order->status == 1)
                                        <button type="button"
                                            data-link="{{ route('dashboard.orderservices.status', $order->id) }}"
                                            class="change-status btn btn-primary btn-sm"><i class="fas fa-check"></i>
                                            New</button>
                                    @else
                                        <span class="text-success">Done</span>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('dashboard.orderservices.destroy', $order->id) }}"
                                        method="post" style="display: inline-block">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <button type="submit" class="btn btn-danger delete btn-sm"><i
                                                class="fas fa-trash"></i> حذف</button>
                                    </form><!-- end of form -->
                                </td>
                                <td>
                                    <form action="{{ route('dashboard.orderservices.note', $order->id) }}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <textarea name="note" class="form-control" id="">{{ $order->note }}</textarea>

                                        <button type="submit" class="btn btn-success btn-sm"> <i class="fas fa-save"></i>
                                            حفظ</button>

                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table><!-- end of table -->
                {{ $orderServices->links() }}
            </div>
        </div>
    </div>
@endsection
