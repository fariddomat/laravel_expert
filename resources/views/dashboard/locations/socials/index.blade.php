@extends('dashboard.layouts.app')
@section('title', 'Location ')
@section('locationActive', 'active')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header">مواقع التواصل الاجتماعي</div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="card-block">
           <a href="{{ route('dashboard.locations.socials.create', $location) }}" class="btn btn-primary"><i class="fas fa-plus"></i> إضافة </a>
       </div>
    </div>
    <div class="row justify-content-center">
        <div class="card-block">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>الاسم</th>
                        <th>الرابط</th>
                        <th>تعديل</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($socials as $socialMedia)
                    <tr>
                        <td>{{ $socialMedia->id }}</td>
                        <td>{{ $socialMedia->name }}</td>
                        <td>{{ $socialMedia->link }}</td>
                        <td>
                            <a href="{{ route('dashboard.locations.socials.edit', [$location, $socialMedia]) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> تعديل</a>
                            <form action="{{ route('dashboard.locations.socials.destroy', [$location, $socialMedia]) }}" method="post" style="display: inline-block">
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
