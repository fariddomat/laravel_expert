@extends('dashboard.layouts.app')
@section('title', 'Services')
@section('servicesActive', 'active')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header">الخدمات - Services</div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="card-block">
           <a href="{{ route('dashboard.services.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> إضافة </a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="card-block">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>الاسم</th>
                        <th>خدمة فرعية؟</th>
                        <th>عرض</th>
                        <th>عرض في الصفحة الرئيسية</th>
                        <th>تعديل</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $index=>$service)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $service->title }}</td>
                        <td>
                            @if ($service->parent_id == null)
                            لا
                            @else
                            {{ $service->parentService->title }}
                            @endif
                        </td>
                        <td>{{ $service->showed == 1 ? 'Showed' : 'Hidden' }}</td>
                        <td>{{ $service->show_at_home == 1 ? 'Showed' : 'Hidden' }}</td>
                        <td>
                            <a href="{{ route('dashboard.services.edit', $service->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> تعديل</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table><!-- end of table -->
            {{ $services->links() }}
        </div>
    </div>
</div>
@endsection
