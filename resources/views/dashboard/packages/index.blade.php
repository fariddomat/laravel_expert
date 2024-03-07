@extends('dashboard.layouts.app')
@section('title', ' Packages')
@section('blogcategoriesActive', 'active')
@section('styles')
<link href="{{asset('dashboard/css/datatables.min.css')}}" rel="stylesheet">
@endsection
@section('scripts')
<script src="{{asset('dashboard/js/datatables.min.js')}}"></script>

@endsection
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header"> الباقات</div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="card-block">
           <a href="{{ route('dashboard.packages.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add </a>
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="card-block">
            <table id="categoriesTable" class="table table-hover">
                <thead>
                    <tr>
                        <th scope="card-block">id</th>
                        <th scope="card-block">الاسم</th>
                        <th scope="card-block">السعر</th>
                        <th scope="card-block">تعديل</th>
                        <th scope="card-block">حذف</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($packages as $package)
                    <tr>
                        <td>{{ $package->id }}</td>
                        <td>{{ $package->name }}</td>
                        <td>{{ $package->price }}</td>
                        <td>
                            <a href="{{ route('dashboard.packages.edit', $package->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> تعديل</a>
                        </td>
                        <td>
                            <form action="{{ route('dashboard.packages.destroy', $package->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash">حذف</i></button>
                            </form>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table><!-- end of table -->
        </div>
    </div>
</div>
@endsection
