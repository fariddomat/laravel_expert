@extends('dashboard.layouts.app')
@section('title', 'Update Social Media')
@section('socialmediaActive', 'active')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header">تعديل روابط مواقع التواصل الاجتماعي - Social Media</div>
</div>
<div>
    @include('partials._errors')
</div>
<div class="container">

    <div class="row justify-content-center">
        <div class="card-block">
            <form action="{{ route('dashboard.socialmedia.update', $socialMedia->id) }}" method="post">
                @csrf()
                {{ method_field('put') }}

                <div class="form-group mb-3">
                    <label for="name" class="form-label">الاسم</label>
                    <input type="text" name="name" class="form-control" value="{{ $socialMedia->name }}" disabled>
                </div>
                <div class="form-group mb-3">
                    <label for="link" class="form-label">الرابط</label>
                    <input type="text" name="link" class="form-control" value="{{ $socialMedia->link }}">
                </div>
                <div class="form-group mb-3">
                    <label for="link" class="form-label">ال Icon</label>
                    <input type="text" name="icon" class="form-control" value="{{ $socialMedia->icon }}">
                </div>

                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i> تعديل </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
