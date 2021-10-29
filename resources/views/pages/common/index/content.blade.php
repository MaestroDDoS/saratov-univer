@extends('pages.common.main-frame')
@section('content')
    <section class="section swiper-container swiper-slider swiper-slider-3" data-loop="true">
        <div class="swiper-wrapper context-dark text-md-left">
            <div class="swiper-slide" data-slide-bg="{{ asset('images/media/slide-1.jpg') }}">
                <div class="swiper-slide-caption section-xl">
                    <div class="container">
                        <h1 class="swiper-title-1" data-caption-animate="fadeInLeft" data-caption-delay="100">Натуральные</h1>
                        <h3 class="swiper-title-2" data-caption-animate="fadeInLeft" data-caption-delay="250"><span></span>Молочные продукты</h3>
                        <h4 class="swiper-title-3" data-caption-animate="fadeInLeft" data-caption-delay="400">Lorem ipsum consectetur adipiscing<br class="d-none d-sm-block">elit sed do eiusmod tempor incididunt</h4>
                        <div class="button-wrap"   data-caption-animate="fadeInLeft" data-caption-delay="550">
							<a class="button button-lg button-shadow-2 button-primary button-zakaria" href="{{ route('common.shop') }}">Список товаров</a>
						</div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide" data-slide-bg="{{ asset('images/media/slide-2.jpg') }}">
                <div class="swiper-slide-caption section-xl">
                    <div class="container">
                        <h1 class="swiper-title-1" data-caption-animate="fadeInLeft" data-caption-delay="100">Свежая</h1>
                        <h3 class="swiper-title-2" data-caption-animate="fadeInLeft" data-caption-delay="250"><span></span>Ежедневная продукция</h3>
                        <h4 class="swiper-title-3" data-caption-animate="fadeInLeft" data-caption-delay="400">Lorem ipsum consectetur adipiscing <br class="d-none d-sm-block">elit sed do eiusmod tempor incididunt </h4>
                        <div class="button-wrap" data-caption-animate="fadeInLeft" data-caption-delay="550">
							<a class="button button-lg button-shadow-2 button-primary button-zakaria" href="{{ route('common.shop') }}">Список товаров</a>
						</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </section>
    <section class="section section-sm section-top-0 bg-default offset-negative-1">
        <div class="container">
            <article class="promo-classic">
                <h4 class="promo-classic-title">Качество провереное временем</h4>
                <p class="big promo-classic-text">Саратовский Молочный Комбинат - лидер среди перерабатывающих предприятий пищевой индустрии Саратовской области. Наша продукция вырабатывается из натурального молока по традиционным технологиям на современном высокотехнологичном оборудовании. Мы предлагаем всю классическую линейку свежих молочных продуктов.</p>
                <a class="button button-sm button-icon-3 button-primary button-zakaria" href="{{ route('common.shop') }}"><span class="mdi mdi-arrow-right"></span> </a>
            </article>
        </div>
    </section>
    <section class="section section-sm section-last bg-default">
        <div class="container">
            <div class="owl-carousel owl-style-8" data-items="1" data-sm-items="2" data-lg-items="3" data-margin="30" data-dots="true" data-mouse-drag="false">
                <article class="box-info-modern box-md wow slideInUp" data-wow-delay=".1s">
					<a class="box-info-modern-figure" href="{{ route('common.info','about-products') }}">
						<img src="{{ asset('images/media/about-1-340x243.jpg') }}" alt="" width="340" height="243"/>
					</a>
                    <h4 class="box-info-modern-title"><a href="#">Наша продукция</a></h4>
                    <div class="box-info-modern-text">Мы предлагаем всю классическую линейку свежих молочных продуктов.</div>
                    <a class="box-info-modern-link" href="#">{{ __( 'common.details' ) }}</a>
                </article>
                <article class="box-info-modern box-md wow slideInUp">
					<a class="box-info-modern-figure" href="{{ route('common.info','quality-policy') }}">
						<img src="{{ asset('images/media/about-2-340x243.jpg') }}" alt="" width="340" height="243"/>
					</a>
                    <h4 class="box-info-modern-title"><a href="#">Только натуральное</a></h4>
                    <div class="box-info-modern-text">Мы считаем, что это лучший способ вдохновить наше сообщество попробовать полезные и натуральные продукты, которые, как мы надеемся, им понравятся.</div>
                    <a class="box-info-modern-link" href="#">{{ __( 'common.details' ) }}</a>
                </article>
                <article class="box-info-modern box-md wow slideInUp" data-wow-delay=".1s">
					<a class="box-info-modern-figure" href="{{ route('common','about-us') }}">
						<img src="{{ asset('images/media/about-3-340x243.jpg') }}" alt="" width="340" height="243"/>
					</a>
                    <h4 class="box-info-modern-title"><a href="#">Ход работы</a></h4>
                    <div class="box-info-modern-text">Наш рабочий процесс включает в себя несколько элементов, основанных как на традиционных, так и на инновационных подходах к молочному животноводству.</div>
                    <a class="box-info-modern-link" href="#">{{ __( 'common.details' ) }}</a>
                </article>
            </div>
        </div>
    </section>
    <x-common.index.new-products/>
    <section class="section section-xxl bg-default">
        <div class="container">
            <h2 class="wow fadeScale section-title-font">{{ __('common.our_company') }}</h2>
            <div class="row row-30 row-lg justify-content-center">
                <div class="col-sm-8 col-md-7 col-lg-6 wow fadeInLeft"><img src="{{ asset('images/media/about-4-570x511.jpg') }}" alt="" width="570" height="511"/>
                </div>
                <div class="col-md-10 col-lg-6 wow fadeInRight">
                    <div class="tabs-custom tabs-jean" id="tabs-1">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tabs-1-1">
                                <div class="box-info-creative">
                                    <h4 class="box-info-creative-title"><a href="{{ route('common','about-us') }}">Современное оборудование</a></h4>
                                    <div class="box-info-creative-text">В настоящее время предприятие прочно удерживает лидирующие позиции в своей отрасли, расширяет ассортиментную матрицу, устанавливает новейшее оборудование, совершенствует</div>
                                    <a class="link-classic box-info-creative-link" href="#">{{ __( 'common.read_more' ) }}</a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tabs-1-2">
                                <div class="box-info-creative">
                                    <h4 class="box-info-creative-title"><a href="{{ route('common','about-us') }}">Современное оборудование</a></h4>
                                    <div class="box-info-creative-text">В настоящее время предприятие прочно удерживает лидирующие позиции в своей отрасли, расширяет ассортиментную матрицу, устанавливает новейшее оборудование, совершенствует</div>
                                    <a class="link-classic box-info-creative-link" href="#">{{ __( 'common.read_more' ) }}</a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tabs-1-3">
                                <div class="box-info-creative">
                                    <h4 class="box-info-creative-title"><a href="{{ route('common','about-us') }}">Современное оборудование</a></h4>
                                    <div class="box-info-creative-text">В настоящее время предприятие прочно удерживает лидирующие позиции в своей отрасли, расширяет ассортиментную матрицу, устанавливает новейшее оборудование, совершенствует</div>
                                    <a class="link-classic box-info-creative-link" href="#">{{ __( 'common.read_more' ) }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="nav-tabs-wrap">
                            <ul class="nav nav-tabs">
                                <li class="nav-item" role="presentation"><a class="nav-link active" href="#tabs-1-1" data-toggle="tab">{{ __( 'common.our_target' ) }}</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-2" data-toggle="tab">{{ __( 'common.quality' ) }}</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-3" data-toggle="tab">{{ __( 'common.goals' ) }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <x-common.index.partners/>
    <x-common.index.latest-news/>
@endsection
@section( 'js' )
    <script src="{{ asset('js/common/index.js') }}"></script>
@endsection

