@extends('dashboard.layouts.app')
@section('title', 'Team')
@section('teamActive', 'active')
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
        $(document).ready(function() {
            $('.table').DataTable({
                responsive: true,
                searching: true,
                paging: false,
                info: false,
                sorting: false,
                language: {
                    url: '//cdn.datatables.net/plug-ins/2.0.3/i18n/ar.json',
                },
            });
        });
    </script>
@endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="card-header"> <a href="{{ route('dashboard.team.create') }}">Home</a></div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card-block">
                <a href="{{ route('dashboard.team.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> إضافة </a>
                <a href="{{ route('dashboard.teamRoles.index') }}" class="btn btn-warning"><i class="fas fa-plus"></i>
                    تصنيفات فريق العمل </a>

            </div>
        </div>
        <div class="row justify-content-center">
            <div class="card-block">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>التصنيف</th>
                            <th>الوصف</th>
                            <th>تعديل</th>
                            <th>حذف</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($team as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->teamRole->name }}</td>
                                <td>{{ $item->title }}</td>
                                <td>
                                    <a href="{{ route('dashboard.team.edit', $item->id) }}" class="btn btn-info btn-sm"><i
                                            class="fas fa-edit"></i> تعديل</a>
                                </td>
                                <td>
                                    <form action="{{ route('dashboard.team.destroy', $item) }}" method="post"
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
            </div>
        </div>
    </div>
@endsection
