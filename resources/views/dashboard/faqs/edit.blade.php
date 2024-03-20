@extends('dashboard.layouts.app')
@section('title', 'Update questopn')
@section('faqActive', 'active')

@section('scripts')
@endsection

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="card-header">تعديل سؤال </div>
    </div>
    <div>
        @include('partials._errors')
    </div>
    <div class="container">

        <div class="row justify-content-center">
            <div class="card-block">
                <form action="{{ route('dashboard.faqs.update', $faq) }}" method="post" enctype="multipart/form-data">
                    @csrf()
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label>السؤال</label>
                        <textarea name="question" class="form-control">
                        {{ old('question', $faq->question) }}
                    </textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label>الاجابة</label>
                        <textarea name="answer" class="form-control">
                        {{ old('answer', $faq->question) }}
                    </textarea>
                    </div>

                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i> تعديل </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
