@extends('dashboard.layouts.app')
@section('title', 'About')
@section('aboutActive', 'active')

@section('scripts')
<script type="text/javascript">
    var imageGalleryBrowseUrl = "{{ route('dashboard.imageGallery.browser') }}";
    var imageGalleryUploadUrl = "{{ route('dashboard.imageGallery.uploader') }}";
</script>
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('dashboard/js/about.js')}}"></script>
@endsection

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header">About</div>
</div>
<div>
    @include('partials._errors')
</div>
<div class="container">

    <div class="row justify-content-center">
        <div class="card-block">
            <form action="{{ route('dashboard.about.store') }}" method="post" enctype="multipart/form-data">
                @csrf()

                <div class="form-group mb-3">
                    <label for="ar[about_me]" class="form-label">عن الشركة About</label>
                    <textarea class="form-control" id="ar[about_me]" name="ar[about_me]" rows="5" dir="rtl">{{ old('ar.about_me') ?? isset($about) ? $about->translate('ar')->about_me : '' }}</textarea>
                </div>
                {{-- <div class="form-group mb-3">
                    <label for="en[about_me]" class="form-label">About Me in English</label>
                    <textarea class="form-control" id="en[about_me]" name="en[about_me]" rows="5">{{ old('en.about_me') ?? isset($about) ? $about->translate('en')->about_me : '' }}</textarea>
                </div> --}}

                <div class="form-group mb-3">
                    <label for="ar[brief]" class="form-label">التعريف غن الشركة</label>
                    <textarea class="form-control" id="ar[brief]" name="ar[brief]" rows="5" dir="rtl">{{ old('ar.brief') ?? isset($about) ? $about->translate('ar')->brief : '' }}</textarea>
                </div>

                {{-- <div class="form-group mb-3">
                    <label for="en[brief]" class="form-label">Brief about company in English</label>
                    <textarea class="form-control"  id="en[brief]" name="en[brief]" rows="5">{{ old('en.brief') ?? isset($about) ? $about->translate('en')->brief : '' }}</textarea>
                </div> --}}
                <hr>
                <div class="form-group mb-3">
                    <label for="ar[who]" class="form-label">من نحن؟</label>
                    <textarea class="form-control" id="ar[who]" name="ar[who]" rows="5" dir="rtl">{{ old('ar.who') ?? isset($about) ? $about->translate('ar')->who_are_we : '' }}</textarea>
                </div>

                {{-- <div class="form-group mb-3">
                    <label for="en[who]" class="form-label">Who are we? in English</label>
                    <textarea class="form-control" id="en[who]" name="en[who]" rows="5">{{ old('en.who') ?? isset($about) ? $about->translate('en')->who_are_we : '' }}</textarea>
                </div> --}}
                <hr>
                <div class="form-group mb-3">
                    <label for="ar[history]" class="form-label">تاريخنا</label>
                    <textarea class="form-control" id="ar[history]" name="ar[history]" rows="5" dir="rtl">{{ old('ar.history') ?? isset($about) ? $about->translate('ar')->history : '' }}</textarea>
                </div>

                {{-- <div class="form-group mb-3">
                    <label for="en[history]" class="form-label">Our history in English</label>
                    <textarea class="form-control" id="en[history]" name="en[history]" rows="5">{{ old('en.history') ?? isset($about) ? $about->translate('en')->history : '' }}</textarea>
                </div> --}}
                <hr>
                <div class="form-group mb-3">
                    <label for="ar[massage]" class="form-label">رسالتنا</label>
                    <textarea class="form-control" id="ar[massage]" name="ar[massage]" rows="5" dir="rtl">{{ old('ar.massage') ?? isset($about) ? $about->translate('ar')->massage : '' }}</textarea>
                </div>

                {{-- <div class="form-group mb-3">
                    <label for="en[massage]" class="form-label">Our message in English</label>
                    <textarea class="form-control" id="en[massage]" name="en[massage]" rows="5">{{ old('en.massage') ?? isset($about) ? $about->translate('en')->massage : '' }}</textarea>
                </div> --}}
                <hr>
                <div class="form-group mb-3">
                    <label for="ar[goals]" class="form-label">أهدافنا</label>
                    <textarea class="form-control" id="ar[goals]" name="ar[goals]" rows="5" dir="rtl">{{ old('ar.goals') ?? isset($about) ? $about->translate('ar')->goals : '' }}</textarea>
                </div>

                {{-- <div class="form-group mb-3">
                    <label for="en[goals]" class="form-label">Our goals in English</label>
                    <textarea class="form-control" id="en[goals]" name="en[goals]" rows="5">{{ old('en.goals') ?? isset($about) ? $about->translate('en')->goals : '' }}</textarea>
                </div> --}}
                <hr>
                <div class="form-group mb-3">
                    <label for="ar[vision]" class="form-label">رؤيتنا</label>
                    <textarea class="form-control" id="ar[vision]" name="ar[vision]" rows="5" dir="rtl">{{ old('ar.vision') ?? isset($about) ? $about->translate('ar')->vision : '' }}</textarea>
                </div>

                {{-- <div class="form-group mb-3">
                    <label for="en[vision]" class="form-label">Our vision in English</label>
                    <textarea class="form-control" id="en[vision]" name="en[vision]" rows="5">{{ old('en.vision') ?? isset($about) ? $about->translate('en')->vision : '' }}</textarea>
                </div> --}}
                <hr>
                <div class="form-group mb-3">
                    <label for="ar[ambition]" class="form-label">طموحنا</label>
                    <textarea class="form-control" id="ar[ambition]" name="ar[ambition]" rows="5" dir="rtl">{{ old('ar.ambition') ?? isset($about) ? $about->translate('ar')->ambition : '' }}</textarea>
                </div>

                {{-- <div class="form-group mb-3">
                    <label for="en[ambition]" class="form-label">Our ambition in English</label>
                    <textarea class="form-control" id="en[ambition]" name="en[ambition]" rows="5">{{ old('en.ambition') ?? isset($about) ? $about->translate('en')->ambition : '' }}</textarea>
                </div> --}}

                <div class="form-group mb-3">
                    <label for="ar[values]" class="form-label">قيمنا</label>
                    <textarea class="form-control" id="ar[values]" name="ar[values]" rows="5" dir="rtl">{{ old('ar.values') ?? isset($about) ? $about->translate('ar')->values : '' }}</textarea>
                </div>

                {{-- <div class="form-group mb-3">
                    <label for="en[values]" class="form-label">Our values in English</label>
                    <textarea class="form-control" id="en[values]" name="en[values]" rows="5">{{ old('en.values') ?? isset($about) ? $about->translate('en')->values : '' }}</textarea>
                </div> --}}
                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Save </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
