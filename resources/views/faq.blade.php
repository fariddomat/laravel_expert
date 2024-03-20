@extends('layouts.site')

@section('title', trans('site.FAQ'))
@section('styles')
@endsection
@section('scripts')
@endsection
@section('content')

    <!-- Page title  -->
    <section class="page-title-wrap position-relative bg-light" data-bg-img="{{ asset($info->about_header_image) }}"   data-animate="fadeInUp" data-delay="1.1">
        <div id="particles_js"></div>
        <div class="container">
            <div class="row">
                <div class="col-11">
                    <div class="page-title position-relative pt-5 pb-5">
                        <ul class="custom-breadcrumb roboto list-unstyled mb-0 clearfix" data-animate="fadeInUp"
                            data-delay="1.2">
                            <li><a href="{{ route('home') }}">@lang('site.home')</a></li>
                            <li><i class="fas fa-angle-double-right"></i></li>
                            <li><a href="#">>@lang('site.FAQ')</a></li>
                        </ul>
                        <h1 data-animate="fadeInUp" data-delay="1.3">@lang('site.FAQ')</h1>
                    </div>
                </div>
                <div class="col-1">
                    <div class="world-map position-relative">
                        <img src="img/map.svg" alt="" alt="" data-no-retina class="svg">>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Banner -->


    <!-- FAQ -->
    <section class="pt-7 pb-7">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <div class="about-us-title text-center">
                        <h2 data-animate="fadeInUp" data-delay="1.5">Have Any Questions In Your Mind?</h2>
                        <p data-animate="fadeInUp" data-delay="1.6">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                    </div>
                </div>
            </div>
            <div class="border-bottom pt-4 pb-4">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="single-faq-wrap">
                            <h2 data-animate="fadeInUp" data-delay=".1">General Questions & Answers</h2>

                            <h4 data-animate="fadeInUp" data-delay=".2"><i class="fas fa-question-circle"></i> How do I setup StrongVPN?</h4>
                            <p data-animate="fadeInUp" data-delay=".3">At vero eos et accusamus et iusto odio dignissimos ducimus ui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati piditate non ilique sunt in culpa qui officia deserunt illitia test laborum et dolorum fuga.</p>

                            <h4 data-animate="fadeInUp" data-delay=".4"><i class="fas fa-question-circle"></i> What's the difference between a Proxy and VPN Service?</h4>
                            <p data-animate="fadeInUp" data-delay=".5">At vero eos et accusamus et iusto odio dignissimos ducimus ui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati piditate non ilique sunt in culpa qui officia deserunt illitia test laborum et dolorum fuga.</p>

                            <h4 data-animate="fadeInUp" data-delay=".6"><i class="fas fa-question-circle"></i> Can I use your VPN instead of my current ISP connection?</h4>
                            <p data-animate="fadeInUp" data-delay=".7">At vero eos et accusamus et iusto odio dignissimos ducimus ui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati piditate non ilique sunt in culpa qui officia deserunt illitia test laborum et dolorum fuga.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- Youtube video -->
                        <div class="youtube-video position-relative mt-5 mt-md-0" data-animate="fadeInUp" data-delay=".1">
                            <img src="img/faq-video.jpg" alt="">
                            <a href="https://www.youtube.com/watch?v=y2Ky3Wo37AY" class="youtube-popup play-btn ripple">
                                <i class="fas fa-play"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pt-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="single-faq-wrap">
                            <h2 data-animate="fadeInUp" data-delay=".1">Account related Questions & Answers</h2>

                            <h4 data-animate="fadeInUp" data-delay=".2"><i class="fas fa-question-circle"></i> Can I get trial account prior to purchase?</h4>
                            <p data-animate="fadeInUp" data-delay=".3">At vero eos et accusamus et iusto odio dignissimos ducimus ui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati piditate non ilique sunt in culpa qui officia deserunt illitia test laborum et dolorum fuga.</p>

                            <h4 data-animate="fadeInUp" data-delay=".4"><i class="fas fa-question-circle"></i> How many concurrent connections do you allow?</h4>
                            <p data-animate="fadeInUp" data-delay=".5">At vero eos et accusamus et iusto odio dignissimos ducimus ui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati piditate non ilique sunt in culpa qui officia deserunt illitia test laborum et dolorum fuga.</p>

                            <h4 data-animate="fadeInUp" data-delay=".6"><i class="fas fa-question-circle"></i> How can I test VPN servers’ connectivity for my current location?</h4>
                            <p data-animate="fadeInUp" data-delay=".7">At vero eos et accusamus et iusto odio dignissimos ducimus ui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati piditate non ilique sunt in culpa qui officia deserunt illitia test laborum et dolorum fuga.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="single-faq-wrap mt-5 mt-md-0">
                            <h2 data-animate="fadeInUp" data-delay=".1">Technical Guideline/How to Use</h2>

                            <h4 data-animate="fadeInUp" data-delay=".2"><i class="fas fa-question-circle"></i> I can connect, but cannot browse.</h4>
                            <p data-animate="fadeInUp" data-delay=".3">At vero eos et accusamus et iusto odio dignissimos ducimus ui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati piditate non ilique sunt in culpa qui officia deserunt illitia test laborum et dolorum fuga.</p>

                            <h4 data-animate="fadeInUp" data-delay=".4"><i class="fas fa-question-circle"></i> Does this site or device work with StrongVPN?</h4>
                            <p data-animate="fadeInUp" data-delay=".5">At vero eos et accusamus et iusto odio dignissimos ducimus ui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati piditate non ilique sunt in culpa qui officia deserunt illitia test laborum et dolorum fuga.</p>

                            <h4 data-animate="fadeInUp" data-delay=".6"><i class="fas fa-question-circle"></i> What ports should be open on firewall/router for it to work?</h4>
                            <p data-animate="fadeInUp" data-delay=".7">At vero eos et accusamus et iusto odio dignissimos ducimus ui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati piditate non ilique sunt in culpa qui officia deserunt illitia test laborum et dolorum fuga.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of FAQ -->

@endsection
