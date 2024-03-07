@extends('dashboard.layouts.app')
@section('title', 'Slider Images')
@section('servicesActive', 'active')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header"> <a href="{{route('dashboard.homeinfo.create')}}">Home</a></div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="card-block">
           <a href="{{ route('dashboard.homeinfoSliderImages.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add </a>
       </div>
    </div>
    <div class="row justify-content-center">
        <div class="card-block">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Lange</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($homeinfoSliderImages as $key => $homeinfoSliderImage)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td> <img src="{{asset($homeinfoSliderImage->image)}}" style="width: 125px; height: auto;" alt=""> </td>
                        <td>{{ $homeinfoSliderImage->lang }}</td>
                        {{-- <td>
                            <a href="{{ route('dashboard.homeinfoSliderImages.edit', $homeinfoSliderImage->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> edit</a> --}}
                        </td>
                        <td>
                            <form action="{{ route('dashboard.homeinfoSliderImages.destroy', $homeinfoSliderImage) }}" method="post" style="display: inline-block">
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
