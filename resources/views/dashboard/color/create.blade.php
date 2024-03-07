@extends('dashboard.layouts.app')
@section('title', 'Color Value')
@section('colorActive', 'active')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header">تعديل قيم الألوان</div>
</div>
<div>
    @include('partials._errors')
</div>
<div class="container">

    <div class="row justify-content-center">
        <div class="card-block">
            <form action="{{ route('dashboard.color.store') }}" method="post">
                @csrf()
                <div class="form-group mb-3">
                    <label for="menu" class="form-label">القائمة - Menu</label>
                    <input type="text" name="menu" class="form-control" value="{{ old('menu') ?? isset($color) ? $color->menu : ''  }}">
                </div>
                <div class="form-group mb-3">
                    <label for="footer" class="form-label">الحاشية السفلية - Footer</label>
                    <input type="text" name="footer" class="form-control" value="{{ old('footer') ?? isset($color) ? $color->footer : ''  }}">
                </div>
                <div class="form-group mb-3">
                    <label for="logo_border" class="form-label">حدود الشعار - Logo Border</label>
                    <input type="text" name="logo_border" class="form-control" value="{{ old('logo_border') ?? isset($color) ? $color->logo_border : ''  }}">
                </div>
                <div class="form-group mb-3">
                    <label for="home_buttons" class="form-label">أزرار الصفحة الرئيسية</label>
                    <input type="text" name="home_buttons" class="form-control" value="{{ old('home_buttons') ?? isset($color) ? $color->home_buttons : ''  }}">
                </div>
                <div class="form-group mb-3">
                    <label for="contact_button" class="form-label">أزرار التواصل</label>
                    <input type="text" name="contact_button" class="form-control" value="{{ old('contact_button') ?? isset($color) ? $color->contact_button : ''  }}">
                </div>
                <div class="form-group mb-3">
                    <label for="menu_social_media" class="form-label">قائمة التواصل الاجتماعي</label>
                    <input type="text" name="menu_social_media" class="form-control" value="{{ old('menu_social_media') ?? isset($color) ? $color->menu_social_media : ''  }}">
                </div>

                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> تعديل </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
