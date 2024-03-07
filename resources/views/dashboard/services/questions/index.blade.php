@extends('dashboard.layouts.app')
@section('title', 'Questions')
@section('servicesActive', 'active')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header">الأسئلة الشائعة ل <a href="{{route('dashboard.services.edit',$service->id)}}">{{ $service->title }}</a></div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="card-block">
           <a href="{{ route('dashboard.services.questions.create',$service->id) }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add </a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="card-block">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>السؤال</th>
                        {{-- <th>Question in English</th> --}}
                        <th>تعديل</th>
                        <th>حذف</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($questions as $key => $question)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $question->translate('ar')->question }}</td>
                        {{-- <td>{{ $question->translate('en')->question }}</td> --}}
                        <td>
                            <a href="{{ route('dashboard.services.questions.edit', $question->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> تعديل</a>
                        </td>
                        <td>
                            <form action="{{ route('dashboard.services.questions.destroy', $question->id) }}" method="post" style="display: inline-block">
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
