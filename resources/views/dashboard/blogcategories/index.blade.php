@extends('dashboard.layouts.app')
@section('title', 'Blog Categories')
@section('blogcategoriesActive', 'active')
@section('styles')
<link href="{{asset('dashboard/css/datatables.min.css')}}" rel="stylesheet">
@endsection
@section('scripts')
<script src="{{asset('dashboard/js/datatables.min.js')}}"></script>
<script>
    var CategoriesReorderRoute = '{{route("dashboard.blogcategories.reorder")}}';
</script>
<script src="{{asset('dashboard/js/blogCategories.js')}}"></script>
@endsection
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header">تصنيفات المدونة</div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="card-block">
           <a href="{{ route('dashboard.blogcategories.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add </a>
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="card-block">
            <table id="categoriesTable" class="table table-hover">
                <thead>
                    <tr>
                        <th scope="card-block">الموقع</th>
                        <th scope="card-block">الاسم</th>
                        <th scope="card-block">عرض</th>
                        <th scope="card-block">تعديل</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogCategories as $blogCategory)
                    <tr>
                        <td>{{ $blogCategory->position }}</td>
                        <td>{{ $blogCategory->name }}</td>
                        <td>{{ $blogCategory->showed == 1 ? 'نعم' : 'مخفي' }}</td>
                        <td>
                            <a href="{{ route('dashboard.blogcategories.edit', $blogCategory->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> تعديل</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table><!-- end of table -->
        </div>
    </div>
</div>
@endsection
