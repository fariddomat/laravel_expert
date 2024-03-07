@extends('dashboard.layouts.app')
@section('title', 'Blogs')
@section('blogsActive', 'active')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header">المدونة</div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="card-block">
           <a href="{{ route('dashboard.blogs.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add </a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="card-block">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>العنوان</th>
                        <th>التصنيف</th>
                        <th>عرض</th>
                        <th>عرض في الصفحة الرئيسية</th>
                        <th>تعديل</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $blog)
                    <tr>
                        <td>{{ $blog->id }}</td>
                        <td>{{ $blog->title }}</td>
                        <td>{{ $blog->Category->name }}</td>
                        <td>{{ $blog->showed == 1 ? 'نعم' : 'مخفي' }}</td>
                        <td>{{ $blog->show_at_home == 1 ? 'نعم' : 'مخفي' }}</td>
                        <td>
                            <a href="{{ route('dashboard.blogs.edit', $blog->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> تعديل</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table><!-- end of table -->
            {{ $blogs->links() }}
        </div>
    </div>
</div>
@endsection
