@extends('dashboard.layouts.app')
@section('title', 'Sections')
@section('servicesActive', 'active')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header">الأقسام ل  <a href="{{route('dashboard.services.edit',$service->id)}}">{{ $service->title }}</a></div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="card-block">
           <a href="{{ route('dashboard.services.sections.create',$service->id) }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add </a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="card-block">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>العنوان</th>
                        {{-- <th>Title in English</th> --}}
                        <th>الصور</th>
                        <th>تعديل</th>
                        <th>حذف</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sections as $key => $section)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $section->translate('ar')->title }}</td>
                        {{-- <td>{{ $section->translate('en')->title }}</td> --}}
                        <td>
                            <a href="{{ route('dashboard.services.sections.images.index', $section->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-images"></i> الصور</a>
                        </td>
                        <td>
                            <a href="{{ route('dashboard.services.sections.edit', $section->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> تعديل</a>
                        </td>
                        <td>
                            <form action="{{ route('dashboard.services.sections.destroy', $section->id) }}" method="post" style="display: inline-block">
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
