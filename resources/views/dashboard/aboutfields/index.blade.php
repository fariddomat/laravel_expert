@extends('dashboard.layouts.app')
@section('title', 'About Fields')
@section('aboutfieldsActive', 'active')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header">About حقول</div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="card-block">
           <a href="{{ route('dashboard.aboutfields.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> إضافة </a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="card-block">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>العنوان</th>
                        <th>القيمة</th>
                        <th>تعديل</th>
                        <th>حذف</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($aboutFields as $aboutField)
                    <tr>
                        <td>{{ $aboutField->id }}</td>
                        <td>{{ $aboutField->title }}</td>
                        <td>{{ $aboutField->value }}</td>
                        <td>
                            <a href="{{ route('dashboard.aboutfields.edit', $aboutField->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> تعديل</a>
                        </td>
                        <td>
                            <form action="{{ route('dashboard.aboutfields.destroy', $aboutField->id) }}" method="post" style="display: inline-block">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <button type="submit" class="btn btn-danger delete btn-sm"><i class="fas fa-trash"></i> حذف</button>
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
