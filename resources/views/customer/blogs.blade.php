@extends('customer.blogsLayout')
@section('title', trans('site.blogs'))
@section('content')

<!-- Blog -->
<div id="blog" class="blog-home bg-gray center section-padding pt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h1>
                    <a href="{{route('customer',$customer->slug)}}">{!!$customer->name!!}</a>
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2 class="heading-title">@lang('site.my_blog')</h2>
                <hr class="line line-hr-primary">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <nav class="owl-filter-bar" id="filter-blog-menu">
                    <li class="list-inline-item">
                        <a class="item active" data-owl-filter="*">@lang('site.all')</a>
                    </li>
                    @foreach($blogCategories as $blogCategory)
                    <li class="list-inline-item d-none d-md-inline-block">
                        <a class="item" data-owl-filter="{{'.blogs'.$blogCategory->id}}">{{$blogCategory->name}}</a>
                    </li>
                    @endforeach
                    <select class="form-select d-md-none my-2 select-m-filter bg-gray" name="filter-blog-menu-select" id="filter-blog-menu-select">
                        <option class="option-m-filter" value="*">@lang('site.categories')</option>
                        @foreach($blogCategories as $blogCategory)
                        <option class="option-m-filter" value="{{'.blogs'.$blogCategory->id}}">{{$blogCategory->name}}</option>
                        @endforeach
                    </select>
                </nav>
            </div>
            <div class="col-md-12 owl-carousel owl-theme">
                @foreach($blogs as $blog)
                <div class="item {{'blogs'.$blog->blog_category_id}}">
                    <div class="post-img">
                        <div class="img"><a href="{{route('customer.blog',[$customer->slug,$blog->slug])}}"><img src="{{asset($blog->image)}}"
                                    alt=""></a>
                        </div>
                    </div>
                    <div class="cont">
                        <div class="info"><a href="{{route('customer.blog',[$customer->slug,$blog->slug])}}">{{$blog->updated_at->format('d F
                                Y')}}</a></div>
                        <h5><a href="{{route('customer.blog',[$customer->slug,$blog->slug])}}">{{$blog->title}}</a></h5>
                        <div>{!! Str::limit( Helper::removeSpecialCharacter($blog->description),100 ) !!}</div>
                        <a href="{{route('customer.blog',[$customer->slug,$blog->slug])}}" class="more"><span>@lang('site.read_more')</span></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection