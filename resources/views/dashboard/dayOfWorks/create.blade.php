@extends('dashboard.layouts.app')
@section('dayOfWorksActive', 'active')
@section('title')
    Create dateOfWork
@endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="card-header">أيام العمل</div>
    </div>


    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="card-block ">
                <form action="{{ route('dashboard.dayOfWorks.store') }}" method="POST">
                    @csrf
                    @method('post')
                    @include('layouts._error')


                    <div class="form-group">
                        <label for="name">Day</label>
                        <input type="text" class="form-control" name="day" id="day" value="{{ old('day') }}"
                            aria-describedby="helpId" placeholder="">
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>
                            Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
