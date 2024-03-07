@extends('dashboard.layouts.app')
@section('title', 'Work Ways')
@section('servicesActive', 'active')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header">Work Ways For <a href="{{route('dashboard.services.edit',$service->id)}}">{{ $service->title }}</a></div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="card-block">
           <a href="{{ route('dashboard.services.workways.create',$service->id) }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add </a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="card-block">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title in Arabic</th>
                        {{-- <th>Title in English</th> --}}
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($workWays as $key => $work)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $work->translate('ar')->title }}</td>
                        {{-- <td>{{ $work->translate('en')->title }}</td> --}}
                        <td>
                            <a href="{{ route('dashboard.services.workways.edit', $work->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> edit</a>
                        </td>
                        <td>
                            <form action="{{ route('dashboard.services.workways.destroy', $work->id) }}" method="post" style="display: inline-block">
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
