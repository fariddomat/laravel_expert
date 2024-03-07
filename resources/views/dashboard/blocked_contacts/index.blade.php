@extends('dashboard.layouts.app')
@section('title', 'Contact Us')
@section('contactusActive', 'active')
@section('styles')
<link href="{{asset('dashboard/css/datatables.min.css')}}" rel="stylesheet">
<link href="{{asset('dashboard/css/removeSortingDataTables.css')}}" rel="stylesheet">
<link href="{{asset('dashboard/css/datatablesStyles.css')}}" rel="stylesheet">
@endsection
@section('scripts')
<script src="{{asset('dashboard/js/contactUs.js')}}"></script>
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
    <div class="card-header">الحسابات المحظورة</div>
</div>
<div class="container">
    <a href="{{ route('dashboard.blocked_contact.create') }}" class="btn btn-primary">New Block</a>
    <div class="row justify-content-center">
        <div class="card-block">
            <table id="contactsTable" class="table table-hover display responsive nowrap" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>الاسم</th>
                        <th>البريد الإلكتروني</th>
                        <th>الرسالة</th>
                        <th>حذف</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                    <tr>
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->message }}</td>
                        <td>
                            <form action="{{ route('dashboard.blocked_contact.destroy', $contact->id) }}" method="post" style="display: inline-block">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <button type="submit" class="btn btn-danger delete btn-sm"><i class="fas fa-trash"></i> حذف</button>
                            </form><!-- end of form -->
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table><!-- end of table -->
            {{ $contacts->links() }}
        </div>
    </div>
</div>
@endsection
