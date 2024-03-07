@extends('dashboard.layouts.app')
@section('title', 'Customer Clients')
@section('customersActive', 'active')
@section('styles')
<link href="{{asset('dashboard/css/datatables.min.css')}}" rel="stylesheet">
<link href="{{asset('dashboard/css/removeSortingDataTables.css')}}" rel="stylesheet">
<link href="{{asset('dashboard/css/datatablesStyles.css')}}" rel="stylesheet">
@endsection
@section('scripts')
<script src="{{asset('customers/js/contactUs.js')}}"></script>
<script src="{{asset('dashboard/js/datatables.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#contactsTable').DataTable({
            responsive: true,
            searching: false,
            paging: false,
            info: false,
            sorting: false,
        });
    } );
</script>
@endsection
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header">Customer Client</div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="card-block">
            <table id="contactsTable" class="table table-hover display responsive nowrap" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Message</th>
                        <th>Sent Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $index => $contact)
                    <tr>
                        <td>{{ $contacts->firstItem() + $index }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td><a href="tel:{{ $contact->mobile }}" style="text-decoration: none;">{{ $contact->mobile }}</a></td>
                        <td>{{ $contact->message }}</td>
                        <td>{{ $contact->created_at->format('Y-m-d H:i:s') }}</td>

                    </tr>
                    @endforeach
                </tbody>
            </table><!-- end of table -->
            {{ $contacts->links() }}
        </div>
    </div>
</div>
@endsection
