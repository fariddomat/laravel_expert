@extends('dashboard.layouts.app')

@section('title', 'Reviews')
@section('reviewsActive', 'active')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header">أراء العملاء</div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="card-block">
            <a href="{{ route('dashboard.reviews.create') }}" class="btn btn-primary">إضافة</a>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="card-block">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>الاسم</th>
                        <th>تعديل</th>
                        <th>حذف</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reviews as $key => $review)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $review->name }}</td>
                        <td>
                            <a href="{{ route('dashboard.reviews.edit', $review->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> تعديل</a>
                        </td>
                        <td>
                            <form action="{{ route('dashboard.reviews.destroy', $review) }}" method="post" style="display: inline-block">
                                @csrf()
                                @method('delete')
                                <button type="submit" class="btn btn-danger delete btn-sm"><i class="fas fa-trash"></i> حذف</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
