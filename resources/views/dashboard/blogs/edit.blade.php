@extends('dashboard.layouts.app')
@section('title', 'Update Blog')
@section('blogsActive', 'active')

@section('scripts')
<script type="text/javascript">
    var imageGalleryBrowseUrl = "{{ route('dashboard.imageGallery.browser') }}";
    var imageGalleryUploadUrl = "{{ route('dashboard.imageGallery.uploader') }}";
</script>
<script src="{{asset('dashboard/js/image_preview.js')}}"></script>
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('dashboard/js/blog.js')}}"></script>
<script>
    $(function() {
        $("#delete-index-img").on("click", function() {
            $("#index-img").attr("src", "");
            $(".del").hide();
            $(".logo").val(null);
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");
            $.ajax({
                url: "{{ route('dashboard.blogs.indexImage.destroy', $blog->id) }}",
                type: "DELETE",
                data: {
                    _token: CSRF_TOKEN
                },
                dataType: "JSON",
                success: function(data) {
                    //done.
                },
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('.tags-input').select2({
            tags: true, // Enable tag creation

        });
    });

</script>
@endsection

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header">تعديل مقال</div>
</div>
<div>
    @include('partials._errors')
</div>
<div class="container">

    <div class="row justify-content-center">
        <div class="card-block">
            <form action="{{ route('dashboard.blogs.update', $blog->id) }}" method="post" enctype="multipart/form-data">
                @csrf()
                {{ method_field('put') }}

                <div class="form-group mb-3">
                    <label for="ar[title]" class="form-label">العنوان</label>
                    <input type="text" name="ar[title]" class="form-control" value="{{ $blog->translate('ar')->title }}"
                        dir="rtl">
                </div>
                {{-- <div class="form-group mb-3">
                    <label for="en[title]" class="form-label">Title in English</label>
                    <input type="text" name="en[title]" class="form-control"
                        value="{{ $blog->translate('en')->title }}">
                </div> --}}

                <div class="form-group mb-3">
                    <label for="slug" class="form-label">الرابط Link</label>
                    <input type="text" name="slug" class="form-control" value="{{ $blog->slug }}">
                </div>

                <div class="form-group mb-3">
                    <label for="ar[introduction]" class="form-label">تعريف - Introduction </label>
                    <textarea class="form-control" id="ar[introduction]" name="ar[introduction]" rows="5"
                        dir="rtl">{{ $blog->translate('ar')->introduction }}</textarea>
                </div>

                {{-- <div class="form-group mb-3">
                    <label for="en[introduction]" class="form-label">Introduction in English</label>
                    <textarea class="form-control" id="en[introduction]" name="en[introduction]"
                        rows="5">{{ $blog->translate('en')->introduction }}</textarea>
                </div> --}}

                <div class="form-group mb-3">
                    <label for="ar[content_table]" class="form-label">جدول المحتويات - Content table</label>
                    <textarea class="form-control" id="ar[content_table]" name="ar[content_table]" rows="5"
                        dir="rtl">{{ $blog->translate('ar')->content_table }}</textarea>
                </div>

                {{-- <div class="form-group mb-3">
                    <label for="en[content_table]" class="form-label">Content table in English</label>
                    <textarea class="form-control" id="en[content_table]" name="en[content_table]"
                        rows="5">{{ $blog->translate('en')->content_table }}</textarea>
                </div> --}}

                <div class="form-group mb-3">
                    <label for="ar[first_paragraph]" class="form-label">النص الأول - First paragraph</label>
                    <textarea class="form-control" id="ar[first_paragraph]" name="ar[first_paragraph]" rows="5"
                        dir="rtl">{{ $blog->translate('ar')->first_paragraph }}</textarea>
                </div>

                {{-- <div class="form-group mb-3">
                    <label for="en[first_paragraph]" class="form-label">First paragraph in English</label>
                    <textarea class="form-control" id="en[first_paragraph]" name="en[first_paragraph]"
                        rows="5">{{ $blog->translate('en')->first_paragraph }}</textarea>
                </div> --}}

                <div class="form-group mb-3">
                    <label for="ar[description]" class="form-label">الوصف - Description</label>
                    <textarea class="form-control" id="ar[description]" name="ar[description]" rows="5"
                        dir="rtl">{{ $blog->translate('ar')->description }}</textarea>
                </div>

                {{-- <div class="form-group mb-3">
                    <label for="en[description]" class="form-label">Description in English</label>
                    <textarea class="form-control" id="en[description]" name="en[description]"
                        rows="5">{{ $blog->translate('en')->description }}</textarea>
                </div> --}}

                <div class="form-group mb-3">
                    <label for="category" class="form-label">اختر تصنيف</label>
                    <select class="form-control" name="category" id="category">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}" {{ $blog->blog_category_id == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="tags">Tags:</label>
                    <select multiple class="form-control  tags-input" id="tags" name="tags[]">
                        @foreach ($allTags as $tag)
                            <option value="{{ $tag->id }}"
                                 @if (in_array($tag->id, $blog->tags->pluck('id')->toArray())) selected @endif>{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <input class="" type="checkbox" value="1" id="showed" name="showed" {{ $blog->showed  == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="showed">
                      عرض
                    </label>
                </div>

                <div class="form-group mb-3">
                    <input class="" type="checkbox" value="1" id="show_at_home" name="show_at_home" {{ $blog->show_at_home  == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="show_at_home">
                      عرض في الصفحة الرئيسية
                    </label>
                </div>

                <div class="form-group mb-3">
                    <label for="ar[author_name]" class="form-label">اسم الكاتب</label>
                    <input type="text" name="ar[author_name]" class="form-control" value="{{ $blog->translate('ar')->author_name }}"
                        dir="rtl">
                </div>
                {{-- <div class="form-group mb-3">
                    <label for="en[author_name]" class="form-label">Author Name in English</label>
                    <input type="text" name="en[author_name]" class="form-control"
                        value="{{ $blog->translate('en')->author_name }}">
                </div> --}}

                <div class="form-group mb-3">
                    <label for="ar[author_title]" class="form-label">وصف الكاتب</label>
                    <input type="text" name="ar[author_title]" class="form-control" value="{{ $blog->translate('ar')->author_title }}"
                        dir="rtl">
                </div>
                {{-- <div class="form-group mb-3">
                    <label for="en[author_title]" class="form-label">Author Title in English</label>
                    <input type="text" name="en[author_title]" class="form-control"
                        value="{{ $blog->translate('en')->author_title }}">
                </div> --}}

                <div class="form-group mb-3">
                    <label>صورة الكاتب</label>
                    <input type="file" name="author_image" class="form-control about-me-image">
                </div>

                {{-- <div class="form-group mb-3">
                    <img src="{{ asset($blog->author_image) }}" style="width: 300px;" class="img-thumbnail about-me-image-preview"
                        alt="">
                </div>

                <div class="form-group mb-3">
                    <label for="author_instagram" class="form-label">الكاتب Instagram</label>
                    <input type="text" name="author_instagram" class="form-control"
                        value="{{ $blog->author_instagram }}">
                </div>

                <div class="form-group mb-3">
                    <label for="author_snapchat" class="form-label">الكاتب Snapchat</label>
                    <input type="text" name="author_snapchat" class="form-control"
                        value="{{ $blog->author_snapchat }}">
                </div>

                <div class="form-group mb-3">
                    <label for="author_twitter" class="form-label">الكاتب Twitter</label>
                    <input type="text" name="author_twitter" class="form-control"
                        value="{{ $blog->author_twitter }}">
                </div>

                <div class="form-group mb-3">
                    <label for="author_tiktok" class="form-label">الكاتب Tiktok</label>
                    <input type="text" name="author_tiktok" class="form-control"
                        value="{{ $blog->author_tiktok }}">
                </div>

                <div class="form-group mb-3">
                    <label for="author_linkedin" class="form-label">الكاتب Linkedin</label>
                    <input type="text" name="author_linkedin" class="form-control"
                        value="{{ $blog->author_linkedin }}">
                </div> --}}

                <div class="form-group mb-3">
                    <label>الصورة</label>
                    <input type="file" name="image" class="form-control image">
                </div>

                <div class="form-group mb-3">
                    <img src="{{ asset($blog->image) }}" style="width: 300px;" class="img-thumbnail image-preview"
                        alt="">
                </div>

                <div class="form-group mb-3">
                    <label>الصورة الرئيسية
                    </label>
                    <input type="file" name="index_image" class="form-control logo">
                </div>

                <div class="form-group mb-3">
                    @if ($blog->index_image)

                        <div class="img-wrap del">
                            <span id="delete-index-img" class="close" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Delete">&times;</span>
                            <img id="index-img" src="{{ asset($blog->index_image) }}" style="width: 300px;"
                                class="img-thumbnail logo-preview" alt="">
                        </div>
                    @else
                        <img src="" style="width: 300px; display: none;" class="img-thumbnail logo-preview"
                            alt="">
                    @endif
                </div>


                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i> تعديل </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
