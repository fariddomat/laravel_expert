@extends('dashboard.layouts.app')
@section('title', 'Works')
@section('worksActive', 'active')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header">العمل</div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="card-block">
           <a href="{{ route('dashboard.works.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add </a>
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
                        <th>عرض</th>
                        <th>عرض في الصفحة الرئيسية</th>
                        <th>تعديل</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($works as $work)
                    <tr>
                        <td>{{ $work->id }}</td>
                        <td>{{ $work->title }}</td>
                        <td>{{ $work->Category->name }}</td>
                        <td>{{ $work->showed == 1 ? 'Showed' : 'Hidden' }}</td>
                        <td>{{ $work->show_at_home == 1 ? 'Showed' : 'Hidden' }}</td>
                        <td>
                            <a href="{{ route('dashboard.works.edit', $work->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> تعديل</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table><!-- end of table -->
            {{ $works->links() }}
        </div>
    </div>
</div>
@endsection
