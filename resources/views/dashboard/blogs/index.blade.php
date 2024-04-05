@extends('dashboard.layouts.app')
@section('title', 'Blogs')
@section('blogsActive', 'active')
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
            $('#Table').DataTable({
                responsive: true,
                searching: true,
                paging: false,
                info: false,
                sorting: false,
                language: {
                    // url: '//cdn.datatables.net/plug-ins/2.0.3/i18n/ar.json',
                },
            });
        });
    </script>
@endsection
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header">المدونة</div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="card-block">
           <a href="{{ route('dashboard.blogs.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> إضافة </a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="card-block">
            <table class="table table-hover" id="Table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>العنوان</th>
                        <th>التصنيف</th>
                        <th>عرض</th>
                        <th>عرض في الصفحة الرئيسية</th>
                        <th>العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $index=>$blog)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $blog->title }}</td>
                        <td>{{ $blog->Category->name }}</td>
                        <td>{{ $blog->showed == 1 ? 'نعم' : 'مخفي' }}</td>
                        <td>{{ $blog->show_at_home == 1 ? 'نعم' : 'مخفي' }}</td>
                        <td>
                            <a href="{{ route('blog', $blog->slug) }}" class="btn btn-info btn-sm" target="_blank"> عرض</a>
                            <a href="{{ route('dashboard.blogs.edit', $blog->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> </a>
                            <form action="{{ route('dashboard.blogs.destroy', $blog->id) }}" method="post" style="display: inline-block">
                                @csrf()
                                @method('delete')
                                <button type="submit" class="btn btn-danger delete btn-sm"><i class="fas fa-trash"></i> </button>
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
