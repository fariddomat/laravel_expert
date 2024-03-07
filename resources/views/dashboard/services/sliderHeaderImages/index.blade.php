@extends('dashboard.layouts.app')
@section('title', 'Slider Images')
@section('servicesActive', 'active')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header">Slider Header Images For <a href="{{route('dashboard.services.edit',$service->id)}}">{{ $service->title }}</a></div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="card-block">
           <a href="{{ route('dashboard.services.sliderHeaderImages.create',$service->id) }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add </a>
           <a href="{{ route('dashboard.services.sliderHeaderImages.show',$service->id) }}" class="btn btn-primary"> Show all </a>
           <a href="{{ route('dashboard.services.sliderHeaderImages.hide',$service->id) }}" class="btn btn-primary"> Hide all </a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="card-block">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Showed</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($images as $key => $image)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td> <img src="{{asset($image->image)}}" style="width: 125px; height: auto;" alt=""> </td>
                        <td>{{ $image->showed == 1 ? 'YES' : 'NO' }}</td>
                        <td>
                            <a href="{{ route('dashboard.services.sliderHeaderImages.edit', $image->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> edit</a>
                        </td>
                        <td>
                            <form action="{{ route('dashboard.services.sliderHeaderImages.destroy', $image->id) }}" method="post" style="display: inline-block">
                                @csrf()
                                @method('delete')
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
