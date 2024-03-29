@extends('dashboard.layouts.app')
@section('title', 'Contact Us')
@section('contactusActive', 'active')
@section('styles')
    {{-- <link href="{{asset('dashboard/css/datatables.min.css')}}" rel="stylesheet"> --}}
    <link href="https://cdn.datatables.net/v/bs5/dt-2.0.3/b-3.0.1/r-3.0.1/rr-1.5.0/datatables.min.css" rel="stylesheet">

@endsection
@section('scripts')

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="{{ asset('dashboard/js/contactUs.js') }}"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-2.0.3/b-3.0.1/r-3.0.1/rr-1.5.0/datatables.min.js" defer></script>

    <script>
        $(document).ready(function() {
            $('#contactsTable').DataTable({
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
        <div class="card-header">اتصل بنا</div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card-block">
                <a href="{{ route('dashboard.blocked_contact.index') }}" class="btn btn-primary mb-3"> إدارة الحسابات
                    المحظورة</a>

                <table id="contactsTable" class="table table-hover display responsive nowrap mt-3" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>البريد</th>
                            <th>الهاتف</th>

                            <th>الخدمات</th>
                            <th>وقت الموعد</th>
                            <th class="none">الهاتف الأرضي</th>
                            <th class="none">وسيلة الاتصال المفضلة</th>
                            <th class="none">تاريخ الميلاد</th>
                            <th class="none">المدينة</th>
                            <th class="none">آخر شهادة</th>

                            <th class="none">تاريخ الارسال</th>
                            <th class="none">الرسالة</th>
                            <th class="none">IP</th>
                            <th class="none">الحالة</th>
                            <th class="none">حذف</th>
                            <th class="none">ملاحظة</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $contact)
                            <tr>
                                <td>{{ $contact->id }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td><a href="tel:{{ $contact->mobile }}"
                                        style="text-decoration: none;">{{ $contact->mobile }}</a></td>

                                <td>
                                    @if ($contact->services()->exists())
                                        @foreach ($contact->services as $service)
                                            {{ $service->title }}
                                            <hr>
                                        @endforeach
                                    @else
                                        No Services
                                    @endif
                                </td>
                                        <td>{{ $contact->start_at }}</td>
                                        <td>{{ $contact->phone }}</td>
                                        <td>{{ $contact->contact_method }}</td>
                                        <td>{{ $contact->dob }}</td>
                                        <td>{{ $contact->city }}</td>
                                        <td>{{ $contact->cert_degree }}</td>

                                <td>{{ $contact->message }}</td>
                                <td>{{ $contact->created_at->format('Y-m-d H:i:s') }}</td>
                                <td>{{ $contact->ip }}</td>
                                <td>
                                    @if ($contact->status == 1)
                                        <button type="button"
                                            data-link="{{ route('dashboard.contact-us.status', $contact->id) }}"
                                            class="change-status btn btn-primary btn-sm"><i class="fas fa-check"></i>
                                            New</button>
                                    @else
                                        <span class="text-success">Done</span>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('dashboard.contact-us.destroy', $contact->id) }}" method="post"
                                        style="display: inline-block">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <button type="submit" class="btn btn-danger delete btn-sm"><i
                                                class="fas fa-trash"></i> حذف</button>
                                    </form><!-- end of form -->
                                </td>
                                <td>
                                    <form action="{{ route('dashboard.contact-us.note', $contact->id) }}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <textarea name="note" class="form-control" id="">{{ $contact->note }}</textarea>

                                        <button type="submit" class="btn btn-success btn-sm"> <i class="fas fa-save"></i>
                                            حفظ</button>

                                    </form>
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
