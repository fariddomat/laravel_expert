@extends('dashboard.layouts.app')
@section('title', 'FAQ')
@section('faqActive', 'active')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header">@lang('site.FAQ')</div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="card-block">
            <a href="{{ route('dashboard.faqs.create') }}" class="btn btn-primary">إضافة</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="card-block">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>السؤال</th>
                        <th>تعديل</th>
                        <th>حذف</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($faqs as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->question }}</td>
                        <td>
                            <a href="{{ route('dashboard.faqs.edit', $item->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> تعديل</a>
                        </td>
                        <td>
                            <form action="{{ route('dashboard.faqs.destroy', $item) }}" method="post" style="display: inline-block">
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
