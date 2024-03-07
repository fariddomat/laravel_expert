@extends('layouts.site')
@section('title', trans('site.contact_us'))
@section('styles')
    <style>
        .form-control{
            margin-top: 25px;
        }
        .form-check-label {
            margin-bottom: 0;
            padding: 0 25px;
        }
    </style>
@endsection
@section('scripts')
    <script>
        $('#contactFrom').submit(function() {
            $('#btn-submit').prop("disabled", true);
            $('#btn-spinner').show();
            return true;
        });
    </script>
@endsection

@section('content')

    <!-- subheader -->
    <section id="subheader" data-speed="8" data-type="background"
        style="background: url({{ asset($info->contact_header_image) }})top fixed">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1>@lang('contact.connect')</h1>
                    <ul class="crumb">
                        <li><a href="{{ route('home') }}">@lang('site.home')</a></li>
                        <li class="sep">/</li>
                        <li>@lang('site.contact')</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- subheader close -->
    <!-- Contact Section -->
    <div id="contact" class="section-padding"
        style="background: #fff; padding-top: 100px; padding-left:15px; padding-right: 15px;">
        <div class="container-fluid">

            <div class="row">
                <!-- Contact Info -->
                <div class="col-md-6 mb-4">
                    <div>
                        <p>@lang('contact.always_happy')
                            <br />@lang('contact.your_inquiries')
                            <br />@lang('contact.weekdays')
                        </p>
                        <p><b>@lang('contact.give_call'):</b> <a href="tel:{{ $contactInfo->mobile }}">{{ $contactInfo->mobile }}</a>
                        </p>
                        <p><b>@lang('contact.whatsapp'):</b> <a
                                href="https://api.whatsapp.com/send?phone={{ $contactInfo->whatsapp }}"
                                target="_blank">{{ $contactInfo->whatsapp }}</a></p>
                        <p><b>@lang('contact.email_me'):</b> <a
                                href="mailto:{{ $contactInfo->email }}">{{ $contactInfo->email }}</a></p>
                        <p><i class="fa fa-map-marker-alt"></i> <b>@lang('contact.my_location'):</b> <a
                                href="{{ $contactInfo->location_link }}" target="_blank">{{ $contactInfo->location }}</a>
                        </p>
                    </div>
                    
                </div>
                <!-- Contact Form -->
                <div class="col-md-6">
                    <p><b>@lang('contact.get_in_touch')</b></p>
                    @include('partials._errors')
                    <form id="contactFrom" method="post" action="{{ route('contact.post') }}" class="row">
                        @csrf()

                        {{-- HonyBot hidden input Start --}}
                        <input type="hidden" name="username" value="">
                        {{-- HonyBot hidden input End --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                    placeholder="@lang('contact.name')" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <input type="number" min="0" name="mobile" value="{{ old('mobile') }}"
                                class="form-control" placeholder="@lang('contact.mobile')" required>
                        </div>
                        <div class="col-md-12" style="">
                            <div class="form-group">
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                                    placeholder="@lang('contact.email')">
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-top: 25px">
                            <div class="form-group">
                                <label for="">@lang('contact.service')</label>

                                @foreach ($services as $service)
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="services[]"
                                            value="{{ $service->id }}">
                                        <label class="form-check-label" for="service">{{ $service->title }}</label>
                                    </div>
                                @endforeach
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="services[]" value="0">
                                    <label class="form-check-label" for="service"> @lang('site.other_services')</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea name="message" id="message" cols="30" rows="4" class="form-control"
                                    placeholder="@lang('contact.message')"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin: 15px 0">
                            <div class="form-group">
                                <button id="btn-submit" type="submit"
                                    style="background-color: var(--primary-color-1); color:#fff; padding:8px;">
                                    @lang('contact.send_message')
                                    <span id="btn-spinner" style="display: none;" class="spinner-border spinner-border-sm"
                                        role="status" aria-hidden="true"></span>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <p><small><i>* @lang('contact.we_all_know')</i></small></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
