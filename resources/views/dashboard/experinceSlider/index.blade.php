@extends('dashboard.layouts.app')
@section('title', 'Slider Images')
@section('experinceActive', 'active')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header"> <a href="{{route('dashboard.experinceSlider.create')}}">Home</a></div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="card-block">
           <a href="{{ route('dashboard.experinceSlider.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> إضافة </a>
       </div>
    </div>
    <div class="row justify-content-center">
        <div class="card-block">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>الصورة</th>
                        {{-- <th>Edit</th> --}}
                        <th>حذف</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($experinceSlider as $key => $homeinfoSliderImage)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td> <img src="{{asset($homeinfoSliderImage->image)}}" style="width: 125px; height: auto;" alt=""> </td>
                       {{-- <td>
                            <a href="{{ route('dashboard.experinceSlider.edit', $homeinfoSliderImage->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> edit</a> --}}
                        </td>
                        <td>
                            <form action="{{ route('dashboard.experinceSlider.destroy', $homeinfoSliderImage) }}" method="post" style="display: inline-block">
                                @csrf()
                                @method('delete')
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
