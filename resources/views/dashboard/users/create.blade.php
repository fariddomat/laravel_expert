@extends('dashboard.layouts.app')
@section('title')
    Create User
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> إضافة مستخدم جديد
            </div>
            <div class="card-block ">
                <form action="{{ route('dashboard.users.store') }}" method="POST">
                    @csrf
                    @method('post')
                    @include('layouts._error')


                    <div class="form-group">
                        <label for="name">الاسم</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}"
                            aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="email">البريد الإلكتروني</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}"
                            aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="password">كلمة السر</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="password_c">تأكيد كلمة السر</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_c"
                            placeholder="">
                    </div>
                    {{-- Roles --}}
                    <div class="form-group">
                        <label for="role">المهمة</label>
                        <select class="form-control" name="role_id" id="role_id">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>
                            حفظ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
