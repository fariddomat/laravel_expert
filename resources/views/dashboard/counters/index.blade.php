@extends('dashboard.layouts.app')
@section('title', 'Counters')
@section('countersActive', 'active')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header">العدادات</div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="card-block">
           <a href="{{ route('dashboard.counters.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> إضافة </a>
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="card-block">
            <table id="categoriesTable" class="table table-hover">
                <thead>
                    <tr>
                        <th scope="card-block">#</th>
                        <th scope="card-block">الاسم</th>
                        <th scope="card-block">تعديل</th>
                        <th scope="card-block">حذف</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($counters as $index=>$counter)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $counter->title }}</td>
                        <td>
                            <a href="{{ route('dashboard.counters.edit', $counter->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> تعديل</a>
                        </td>
                        <td>
                            <form action="{{ route('dashboard.counters.destroy', $counter->id) }}" method="post">
                            @csrf
                            @method('destroy')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> حذف</button>
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
