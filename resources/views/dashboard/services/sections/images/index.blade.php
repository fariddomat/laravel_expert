@extends('dashboard.layouts.app')
@section('title', 'Section Images')
@section('servicesActive', 'active')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header">صور القسم ل <a href="{{route('dashboard.services.sections.edit',$section->id)}}">{{ $section->title }}</a></div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="card-block">
           <a href="{{ route('dashboard.services.sections.images.create',$section->id) }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add </a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="card-block">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>الوصف</th>
                        {{-- <th>Caption in English</th> --}}
                        <th>الصورة</th>
                        <th>تعديل</th>
                        <th>حذف</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($images as $key => $image)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $image->translate('ar')->caption }}</td>
                        {{-- <td>{{ $image->translate('en')->caption }}</td> --}}
                        <td> <img src="{{asset($image->image)}}" style="width: 125px; height: auto;" alt=""> </td>
                        <td>
                            <a href="{{ route('dashboard.services.sections.images.edit', $image->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> تعديل</a>
                        </td>
                        <td>
                            <form action="{{ route('dashboard.services.sections.images.destroy', $image->id) }}" method="post" style="display: inline-block">
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
