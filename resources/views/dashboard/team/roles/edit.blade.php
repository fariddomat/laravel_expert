@extends('dashboard.layouts.app')
@section('title', 'Update Team Role')
@section('teamActive', 'active')

@section('scripts')
@endsection

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header">تعديل تصنيف فريق العمل </div>
</div>
<div>
    @include('partials._errors')
</div>
<div class="container">

    <div class="row justify-content-center">
        <div class="card-block">
            <form action="{{ route('dashboard.teamRoles.update', $teamRole) }}" method="post" enctype="multipart/form-data">
                @csrf()
                @method('PUT')


                <div class="form-group mb-3">
                    <label>الاسم</label>
                    <input type="text" name="name" class="form-control " value="{{ old('name', $teamRole->name) }}">
                </div>
                <div class="form-group mb-3">
                    <label>المستوى / Level</label>
                    <input type="number" name="level" class="form-control " value="{{ old('level', $teamRole->level) }}">
                </div>

                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i> تعديل </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
