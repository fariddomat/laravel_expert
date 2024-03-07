<!DOCTYPE html>
<html>

<head>
    <title>{{$blog->title}}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        body {
            /* font-family: 'XBRiyaz', sans-serif; */
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        @page {
            header: page-header;
            footer: page-footer;
        }
    </style>
    @if(app()->getLocale()=='ar')
    <style>
        * {
            direction: rtl;
        }

        .rtl div {
            direction: rtl;
        }
    </style>
    @endif
</head>

<body>
    <div class="related-blogs section-padding rtl">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="post-img mb-30">
                        <div class="img"><img src="{{asset($blog->image)}}" alt=""></div>
                    </div>
                    <div>
                        <h3>{{$blog->title}}</h3>
                    </div>
                    <div class="p-3" style="background-color: #f6f6f6; border-right: 4px solid; border-color: #104071; padding: 15px;">{!! $blog->introduction !!}</div>
                    <div class="pb-3 mt-3">{!! $blog->content_table !!}</div>
                    <div class="p-3" style="background-color: rgba(96,125,139,0.12); border-radius: 10px; padding: 15px;">{!! $blog->first_paragraph !!}</div>
                    <div class="mt-3">{!!$blog->description!!}</div>
                </div>
            </div>
            <br />
        </div>
    </div>
</body>

</html>