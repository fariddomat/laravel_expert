@extends('dashboard.layouts.app')
@section('title', 'Social Media')
@section('socialmediaActive', 'active')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header">وسائل التواصل الاجتماعي - Social Media</div>
</div>
<div class="container">
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
                    @foreach ($socialMedias as $socialMedia)
                    <tr>
                        <td>{{ $socialMedia->id }}</td>
                        <td>{{ $socialMedia->name }}</td>
                        <td>{{ $socialMedia->link }}</td>
                        <td>
                            <a href="{{ route('dashboard.socialmedia.edit', $socialMedia->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> تعديل</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table><!-- end of table -->
        </div>
    </div>
</div>
@endsection
