@extends('customers.layouts.app')
@section('title', 'Add New Blog')
@section('blogsActive', 'active')

@section('scripts')
<script type="text/javascript">
    var imageGalleryBrowseUrl = "{{ route('customers.dashboard.imageGallery.browser') }}";
    var imageGalleryUploadUrl = "{{ route('customers.dashboard.imageGallery.uploader') }}";
</script>

<script src="{{asset('dashboard/js/image_preview.js')}}"></script>
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('dashboard/js/blog.js')}}"></script>
@endsection

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header">Add New Blog</h1>
</div>
<div>
    @include('partials._errors')
</div>
<div class="container">

    <div class="row justify-content-center">
        <div class="col">
            <form action="{{ route('customers.dashboard.blogs.store') }}" method="post" enctype="multipart/form-data">
                @csrf()

                <div class="form-group mb-3">
                    <label for="ar[title]" class="form-label">Title in Arabic</label>
                    <input type="text" name="ar[title]" class="form-control" value="{{ old('ar.title') }}" dir="rtl">
                </div>
                <div class="form-group mb-3">
                    <label for="en[title]" class="form-label">Title in English</label>
                    <input type="text" name="en[title]" class="form-control" value="{{ old('en.title') }}">
                </div>

                <div class="form-group mb-3">
                    <label for="slug" class="form-label">Link</label>
                    <input type="text" name="slug" class="form-control" value="{{ old('slug') }}">
                </div>

                <div class="form-group mb-3">
                    <label for="ar[introduction]" class="form-label">Introduction in Arabic</label>
                    <textarea class="form-control" id="ar[introduction]" name="ar[introduction]" rows="5"
                        dir="rtl">{{ old('ar.introduction') }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="en[introduction]" class="form-label">Introduction in English</label>
                    <textarea class="form-control" id="en[introduction]" name="en[introduction]"
                        rows="5">{{ old('en.introduction') }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="ar[content_table]" class="form-label">Content table in Arabic</label>
                    <textarea class="form-control" id="ar[content_table]" name="ar[content_table]" rows="5"
                        dir="rtl">{{ old('ar.content_table') }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="en[content_table]" class="form-label">Content table in English</label>
                    <textarea class="form-control" id="en[content_table]" name="en[content_table]"
                        rows="5">{{ old('en.content_table') }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="ar[first_paragraph]" class="form-label">First paragraph in Arabic</label>
                    <textarea class="form-control" id="ar[first_paragraph]" name="ar[first_paragraph]" rows="5"
                        dir="rtl">{{ old('ar.first_paragraph') }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="en[first_paragraph]" class="form-label">First paragraph in English</label>
                    <textarea class="form-control" id="en[first_paragraph]" name="en[first_paragraph]"
                        rows="5">{{ old('en.first_paragraph') }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="ar[description]" class="form-label">Description in Arabic</label>
                    <textarea class="form-control" id="ar[description]" name="ar[description]" rows="5"
                        dir="rtl">{{ old('ar.description') }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="en[description]" class="form-label">Description in English</label>
                    <textarea class="form-control" id="en[description]" name="en[description]" rows="5">{{old('en.description')}}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="category" class="form-label">Select Category</label>
                    <select class="form-select" name="category" id="category">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}" {{ old('category') == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="1" id="showed" name="showed" {{ old('showed') == '1' ? 'checked' : '' }}>
                    <label class="form-check-label" for="showed">
                      Showed
                    </label>
                </div>

                <div class="form-group mb-3">
                    <label for="ar[author_name]" class="form-label">Author Name in Arabic</label>
                    <input type="text" name="ar[author_name]" class="form-control" value="{{ old('ar.author_name') }}"
                        dir="rtl">
                </div>
                <div class="form-group mb-3">
                    <label for="en[author_name]" class="form-label">Author Name in English</label>
                    <input type="text" name="en[author_name]" class="form-control"
                        value="{{ old('en.author_name') }}">
                </div>

                <div class="form-group mb-3">
                    <label for="ar[author_title]" class="form-label">Author Title in Arabic</label>
                    <input type="text" name="ar[author_title]" class="form-control" value="{{ old('ar.author_title') }}"
                        dir="rtl">
                </div>
                <div class="form-group mb-3">
                    <label for="en[author_title]" class="form-label">Author Title in English</label>
                    <input type="text" name="en[author_title]" class="form-control"
                        value="{{ old('en.author_title') }}">
                </div>

                <div class="form-group mb-3">
                    <label>Author Image</label>
                    <input type="file" name="author_image" class="form-control about-me-image">
                </div>

                <div class="form-group mb-3">
                    <img src="" style="width: 300px; display: none;" class="img-thumbnail about-me-image-preview"
                        alt="">
                </div>

                <div class="form-group mb-3">
                    <label for="author_instagram" class="form-label">Author Instagram</label>
                    <input type="text" name="author_instagram" class="form-control"
                        value="{{ old('author_instagram') }}">
                </div>

                <div class="form-group mb-3">
                    <label for="author_snapchat" class="form-label">Author Snapchat</label>
                    <input type="text" name="author_snapchat" class="form-control"
                        value="{{ old('author_snapchat') }}">
                </div>

                <div class="form-group mb-3">
                    <label for="author_twitter" class="form-label">Author Twitter</label>
                    <input type="text" name="author_twitter" class="form-control"
                        value="{{ old('author_twitter') }}">
                </div>

                <div class="form-group mb-3">
                    <label for="author_tiktok" class="form-label">Author Tiktok</label>
                    <input type="text" name="author_tiktok" class="form-control"
                        value="{{ old('author_tiktok') }}">
                </div>

                <div class="form-group mb-3">
                    <label for="author_linkedin" class="form-label">Author Linkedin</label>
                    <input type="text" name="author_linkedin" class="form-control"
                        value="{{ old('author_linkedin') }}">
                </div>
                <div class="form-group mb-3">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control image">
                </div>

                <div class="form-group mb-3">
                    <img src="" style="width: 300px; display: none;" class="img-thumbnail image-preview" alt="">
                </div>

                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
