@extends('customer.blogsLayout' )
@section('title')
{{$customerBlog->title}}
@endsection

@section('styles')
<style>
    .fs-25 {
        font-size: 25px;
    }

    img {
        width: 100% !important;
        height: auto !important;
    }

    p{
        font-family: 'Al-Jazeera-Arabic-Regular';
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
<div class="related-blogs section-padding" style="padding-top: 45px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h1>
                    <a href="{{route('customer',$customer->slug)}}">{!!$customer->name!!}</a>
                </h1>
            </div>
        </div>
        <div class="row mb-2 d-none d-md-flex">
            <div class="col-12 col-md-8 col-xl-8">
                <div class="border p-2">
                    <h1 style="font-family: '29ltbukralight';">{{$customerBlog->title}}</h1>
                </div>
            </div>
            <div class="col-12 col-md-4 col-xl-3">
                <div class="animate-box border h-100 p-2" data-animate-effect="fadeInUp">
                    <p class="pt-3 fs-25 text-center" style="font-family: '29ltbukralight';">@lang('site.related_blogs')</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-8 col-xl-8">
                <div class="animate-box" data-animate-effect="fadeInUp">
                    <div class="border mb-2 p-2 d-block d-md-none">
                        <h1 style="font-family: '29ltbukralight';">{{$customerBlog->title}}</h1>
                    </div>
                    <div class="post-img mb-30">
                        <div class="img"><img src="{{asset($customerBlog->image)}}" alt=""></div>
                    </div>
                    <div class="cont blog-content">
                        <div class="p-3" style="background-color: #f6f6f6; border-right: 4px solid; border-color: #104071">{!! $customerBlog->introduction !!}</div>
                        <div class="pb-3 mt-3">{!! $customerBlog->content_table !!}</div>
                        <div class="p-3" style="background-color: rgba(96,125,139,0.12); border-radius: 10px;">{!! $customerBlog->first_paragraph !!}</div>
                        <div class="mt-3">{!!$customerBlog->description!!}</div>
                        <div class="mt-3" style="background-color: rgba(96,125,139,0.12); border-radius: 10px;">
                            <div class="row p-4">
                                <div class="col-4 col-md-3">
                                    <img class="author_image rounded-circle" src="{{asset($customerBlog->author_image)}}" />
                                </div>
                                <div class="col-8 col-md-9">
                                    <h3>{{ $customerBlog->author_name}}</h3>
                                    <p>{{ $customerBlog->author_title}}</p>
                                </div>
                                <div class="col-3 mt-3 d-none d-md-block"></div>
                                <div class="col-12 col-md-9 mt-3 text-center text-md-left">
                                    @if($customerBlog->author_instagram)
                                    <a target="_blank" href="{{$customerBlog->author_instagram}}">
                                        <i class="fab fa-instagram fa-2x" style="color: #e1306c;"></i>
                                    </a>
                                    @endif

                                    @if($customerBlog->author_snapchat)
                                    <a target="_blank" href="{{$customerBlog->author_snapchat}}" class="ml-2">
                                        <i class="fab fa-snapchat fa-2x" style="color: #fffc00;"></i>
                                    </a>
                                    @endif

                                    @if($customerBlog->author_twitter)
                                    <a target="_blank" href="{{$customerBlog->author_twitter}}" class="ml-2">
                                        <i class="fab fa-twitter fa-2x" style="color: #00acee;"></i>
                                    </a>
                                    @endif

                                    @if($customerBlog->author_tiktok)
                                    <a target="_blank" href="{{$customerBlog->author_tiktok}}" class="ml-2">
                                        <i class="fab fa-tiktok fa-2x" style="color: #000000;"></i>
                                    </a>
                                    @endif

                                    @if($customerBlog->author_linkedin)
                                    <a target="_blank" href="{{$customerBlog->author_linkedin}}" class="ml-2">
                                        <i class="fab fa-linkedin fa-2x" style="color: #0072b1;"></i>
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="border rounded border-secondary p-3 mt-5">
                            <div class="mt-2 d-flex flex-column flex-md-row justify-content-between">
                                <div class="mb-4 d-flex justify-content-center">
                                    <div>
                                        <a href="{{route('customer.downloadBlog',$customerBlog->slug)}}" class="order-service">
                                            <i class="fas fa-download"></i>
                                            <span>@lang('site.download_pdf')</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="d-flex flex-row mb-4 share-div">
                                    <div>
                                        @lang('site.share_this_blog')
                                    </div>
                                    <div class="ml-4">
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{Request::url()}}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        <a href="https://twitter.com/share?text={{Request::url()}}" target="_blank"><i class="fab fa-twitter"></i></a>
                                        <a href="http://www.linkedin.com/shareArticle?mini=true&url={{Request::url()}}" target="_blank"><i class="fab fa-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 col-xl-3 mt-5 mt-md-0">
                <div class="animate-box d-block d-md-none border p-2 mb-2" data-animate-effect="fadeInUp">
                    <p class="pt-3 fs-25 text-center" style="font-family: '29ltbukralight';">@lang('site.related_blogs')</p>
                </div>
                <div class="animate-box relatedBlogs" data-animate-effect="fadeInUp">
                    <div class="row border rounded pt-3">
                        @foreach($relatedBlogs as $blog)
                        <div class="col-12 pb-2">
                            <div class="row no-gutters">
                                <div class="col-5">
                                    <div class="img"><a href="{{route('customer.blog',[$customer->slug,$blog->slug])}}"><img src="{{asset($blog->image)}}"
                                        alt=""></a>
                                    </div>
                                </div>
                                <div class="col-7 pl-2">
                                    <h6 class="mb-0" style="font-size: 13px; line-height: 1;"><a href="{{route('customer.blog',[$customer->slug,$blog->slug])}}">{{$blog->title}}</a></h6>
                                    <a style="font-size: 13px;" href="{{route('customer.blog',[$customer->slug,$blog->slug])}}" class="more"><span>@lang('site.read_more')</span></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>            
        </div>
    </div>
</div>

@endsection