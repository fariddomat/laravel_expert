@extends('layouts.site' )
@section('title')
{{$blog->title}}
@endsection

@section('styles')
<style>
    .fs-25 {
        font-size: 25px;
    }

    img {
        width: 100% !important;
        /* height: auto !important; */
    }

    p{
        /* font-family: 'Al-Jazeera-Arabic-Regular'; */
    }

    .relatedBlogs {
        position: sticky;
        position: -webkit-sticky;
        top: 5px;
        max-height: 100vh;
        overflow-y: scroll;
        overflow-x: hidden;
        padding-left: 15px;
        padding-right: 15px;
        padding-bottom: 5px;
    }
    .gorman-page{
        overflow: unset;
    }

    @media (max-width: 576px) {
        .pt-2, .py-2 {
  padding-top: 2.2rem !important;
}
        .relatedBlogs {
            max-height: unset;
        }
        .gorman-page{
            overflow: hidden;
        }
    }
    .follow-a{
        display: flex;
        align-items: stretch;
        margin-left: 22px;
        background: #fff;
        border: 2px solid #fff;
        border-radius: 6px;
        box-shadow: 0 2px 10px 0 rgb(0 0 0 / 15%);
        transition: box-shadow;
        transition-duration: .25s;
        transition-timing-function: ease-out;
    }
    .follow-a:hover{
        color: #005cb1;
        box-shadow: 0 4px 20px 0 rgb(0 0 0 / 15%);
        border-color: rgba(0,92,177,.5);
    }
    .follow-a:hover .follow-span{
        border-color: rgba(0,92,177,.7);
    }
    .follow-a-div-icon{
        position: relative;
        flex: none;
        width: 50px;
        height: 50px;
        margin-left: -5px;
        margin-bottom: -3px;
        z-index: 1;
        padding: 0.625rem 0.8125rem 0.625rem 0.5rem;
        margin-top: auto;
        margin-bottom: auto;
    }
    .follow-a-div-content{
        padding: 0.625rem 0.8125rem 0.625rem 0.5rem;
        min-width: 0;
        overflow: hidden;
    }
    .follow-h3{
        color: #007ef3;
        display: block;
        margin: 0;
        font-size: 1.125rem;
        line-height: 1.3;
        font-weight: 400;
        font-family: "proxima-nova",sans-serif;
    }
    .follow-span{
        border-bottom: 1px solid rgba(0,126,243,.4);
        line-height: 1.6;
    }
    .blog-content h1,
    .blog-content h2,
    .blog-content h3,
    .blog-content h4,
    .blog-content h5,
    .blog-content h6 {
        line-height: 1;
    }

    ul{
        list-style-type: initial;
    }
    h1,h2,h3,h4,h5,h6,p,body,strong{
        color: unset;
    }

    .share-div {
        font-size: 20px;
        margin: auto;
    }

    @media (max-width: 576px) {
        h1 {
            font-size: 20px;
        }
        .follow-span {
            font-size: 1rem;
        }
        .order-service {
            font-size: 13px;
        }
        .share-div {
            font-size: 16px;
        }
        .fs-25 {
            font-size: 20px;
        }
    }
    .author_image {
        width: 100px !important;
        height: 100px !important;
        object-fit: cover;
    }
    @media (max-width: 576px) {
        .author_image {
            width: 75px !important;
            height: 75px !important;
        }
    }
</style>
@endsection
@section('scripts')
<script src="{{asset('js/blog.js')}}"></script>
@endsection

@section('content')
<div class="related-blogs section-padding" style="padding-top: 45px; background-color: #fff;padding-left: 25px; padding-right: 25px">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12 col-md-8 col-xl-8">
                <div class="animate-box" data-animate-effect="fadeInUp">
                    <div class="border mb-2 p-2 d-block d-md-none">
                        <h1 style="font-family: '29ltbukralight';">{{$blog->title}}</h1>
                    </div>
                    <div class="post-img mb-30">
                        <div class="img"><img src="{{asset($blog->image)}}" alt=""></div>
                    </div>
                    <div class="row mt-2 mb-2 d-none d-md-flex">
                        <div class="col-12 col-md-12 col-xl-12">
                            <div class="border p-2">
                                <h1 style="font-family: '29ltbukralight';">{{$blog->title}}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="cont blog-content">
                        <div class="p-3" style="background-color: #f6f6f6; border-right: 4px solid; border-color: #104071">{!! $blog->introduction !!}</div>
                        <div class="pb-3 mt-3">{!! $blog->content_table !!}</div>
                        <div class="p-3" style="background-color: rgba(96,125,139,0.12); border-radius: 10px;">{!! $blog->first_paragraph !!}</div>
                        <div class="mt-3">{!!$blog->description!!}</div>
                        <div class="mt-3" style="background-color: rgba(96,125,139,0.12); border-radius: 10px;">
                            <div class="row p-4">
                                <div class="col-4 col-md-3">
                                    <img class="author_image rounded-circle" src="{{asset($blog->author_image)}}" />
                                </div>
                                <div class="col-8 col-md-9">
                                    <h3>{{ $blog->author_name}}</h3>
                                    <p>{{ $blog->author_title}}</p>
                                </div>
                                <div class="col-3 mt-3 d-none d-md-block"></div>
                                <div class="col-12 col-md-9 mt-3 text-center text-md-left">
                                    @if($blog->author_instagram)
                                    <a target="_blank" href="{{$blog->author_instagram}}">
                                        <i class="fa-brands fa-instagram fa-2x" style="color: #e1306c;"></i>
                                    </a>
                                    @endif

                                    @if($blog->author_snapchat)
                                    <a target="_blank" href="{{$blog->author_snapchat}}" class="ml-2">
                                        <i class="fa-brands fa-snapchat fa-2x" style="color: #fffc00;"></i>
                                    </a>
                                    @endif

                                    @if($blog->author_twitter)
                                    <a target="_blank" href="{{$blog->author_twitter}}" class="ml-2">
                                        <i class="fa-brands fa-x-twitter fa-2x" ></i>
                                    </a>
                                    @endif

                                    @if($blog->author_tiktok)
                                    <a target="_blank" href="{{$blog->author_tiktok}}" class="ml-2">
                                        <i class="fa-brands fa-tiktok fa-2x" style="color: #000000;"></i>
                                    </a>
                                    @endif

                                    @if($blog->author_linkedin)
                                    <a target="_blank" href="{{$blog->author_linkedin}}" class="ml-2">
                                        <i class="fa-brands fa-linkedin fa-2x" style="color: #0072b1;"></i>
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 mb-4">
                            <div class="mb-3">
                                <a target="_blank" href="{{ $socialMedias->where('name', 'Facebook')->first()->link}}" class="follow-a">
                                    <div class="follow-a-div-icon text-center">
                                        <i class="fa-brands fa-facebook fa-2x" style="color: #4267b2;"></i>
                                    </div>
                                    <div class="follow-a-div-content">
                                        <h3 class="follow-h3">
                                            <span class="follow-span">
                                                @lang('site.blog_social.facebook')
                                            </span>
                                        </h3>
                                    </div>
                                </a>
                            </div>
                            <div class="mb-3">
                                <a target="_blank" href="{{ $socialMedias->where('name', 'Instagram')->first()->link}}" class="follow-a">
                                    <div class="follow-a-div-icon text-center">
                                        <i class="fa fa-brands fa-instagram fa-2x" style="color: #e1306c;"></i>
                                    </div>
                                    <div class="follow-a-div-content">
                                        <h3 class="follow-h3">
                                            <span class="follow-span">
                                                @lang('site.blog_social.instagram')
                                            </span>
                                        </h3>
                                    </div>
                                </a>
                            </div>
                            <div class="mb-3">
                                <a target="_blank" href="{{ $socialMedias->where('name', 'Twitter')->first()->link}}" class="follow-a">
                                    <div class="follow-a-div-icon text-center">
                                        <i class="fa-brands fa-x-twitter fa-2x" style=""></i>
                                    </div>
                                    <div class="follow-a-div-content">
                                        <h3 class="follow-h3">
                                            <span class="follow-span">
                                                @lang('site.blog_social.twitter')
                                            </span>
                                        </h3>
                                    </div>
                                </a>
                            </div>
                            <div class="mb-3">
                                <a target="_blank" href="{{ $socialMedias->where('name', 'Youtube')->first()->link}}" class="follow-a">
                                    <div class="follow-a-div-icon text-center">
                                        <i class="fa-brands fa-youtube fa-2x" style="color: #ff0000;"></i>
                                    </div>
                                    <div class="follow-a-div-content">
                                        <h3 class="follow-h3">
                                            <span class="follow-span">
                                                @lang('site.blog_social.youtube')
                                            </span>
                                        </h3>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="border rounded border-secondary p-3" style="margin-top: 35px">
                            <div class="mt-2 d-flex flex-column flex-md-row justify-content-between">
                                <div class="mb-4 d-flex justify-content-between">
                                    <div>
                                        <a href="{{route('downloadBlog',$blog->slug)}}" class="order-service">
                                            <i class="fa fa-download"></i>
                                            <span>@lang('site.download_pdf')</span>
                                        </a>
                                    </div>
                                    <div class="d-inline d-md-none">
                                        <a href="{{route('contact')}}" class="order-service px-4">
                                            @lang('site.order_now')
                                        </a>
                                    </div>
                                </div>
                                <div class="d-flex flex-row mb-4 share-div">
                                    <div>
                                        @lang('site.share_this_blog')
                                    </div>
                                    <div class="ml-4">
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{Request::url()}}" target="_blank"><i class="fa fa-facebook-f"></i></a>
                                        <a href="https://twitter.com/share?text={{Request::url()}}" target="_blank"><i class="fa fa-twitter"></i></a>
                                        <a href="http://www.linkedin.com/shareArticle?mini=true&url={{Request::url()}}" target="_blank"><i class="fa fa-linkedin"></i></a>
                                    </div>
                                </div>
                                <div class="mb-4 d-none d-md-block">
                                    <a href="{{route('contact')}}"
                                        class="order-service px-5">@lang('site.order_now')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 col-xl-3 mt-5 mt-md-0">

                <div id="sidebar">
                    <div class="widget widget-post ">
                        <h4 class="border p-3" style="text-align: center">@lang('site.related_blogs')</h4>
                        <div class="small-border"></div>

                        <ul class="de-bloglist-type-1 border" style="  direction: ltr;">
                            @foreach($relatedBlogs as $blog)
                            <li style="padding: 15px;">
                                <div class="d-image">
                                    <img src="{{asset($blog->image)}}" alt="">
                                </div>
                                <div class="d-content" style="border-bottom: unset"> <div class="d-date">{{$blog->updated_at->format('d F
                                        Y')}}</div>


                                </div>
                                <div class="pt-2" style="border-bottom: solid 1px rgba(0, 0, 0, .1);"><a href="{{route('blog',$blog->slug)}}">{{$blog->title}}</a></div>
                            </li>
                            @endforeach

                        </ul>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

@endsection
