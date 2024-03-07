@extends('customers.layouts.app')
@section('title', 'Gallery Images')
@section('galleryActive', 'active')
@section('scripts')
<script src="{{asset('customers/js/gallery.js')}}"></script>
@endsection
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header">Gallery Images</h1>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
           <a href="{{ route('customers.dashboard.gallery.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add </a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Showed</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($images as $image)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ basename($image->image) }}</td>
                        <td><img src="{{ Storage::disk('s3')->url($image->image) }}" alt="" width="150"></td>
                        <td>
                            <button type="button" data-link="{{route('customers.dashboard.gallery.status',$image->id)}}" class="change-status btn btn-primary btn-sm" style="width: 55px;">{{ $image->showed == 1 ? 'Hide' : 'Show' }}</button>
                        </td>
                        <td>
                            <a href="{{ route('customers.dashboard.gallery.edit', $image->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> edit</a>
                        </td>
                        <td>
                            <form action="{{ route('customers.dashboard.gallery.destroy', $image->id) }}" method="post" style="display: inline-block">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <button type="submit" class="btn btn-danger delete btn-sm"><i class="fas fa-trash"></i> Delete</button>
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
