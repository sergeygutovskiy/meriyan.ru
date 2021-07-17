@extends('layouts.app')

@section('title', 'About us')

@section('head')
    <link rel="stylesheet" href="css/pages/about.css">
@endsection

@section('content')
    <div class="u-page-background u-page-background-top">
        <picture class="u-page-background__image">
            <source
                srcset="/images/static/backgrounds/about.webp"
                type="image/webp"
            />
            <img class="u-page-background__image-fallback" src="/images/static/backgrounds/about.jpg" alt="">
        </picture>

        <header class="u-page-header u-page-header_size_100vh">
            <div class="container mt-auto mb-auto">
                <div class="row mb-6">
                    <div class="col-12 col-xl-5 text-center text-xl-start u-text_color_white">
                        <h1>О нас</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-xl-7 offset-xl-5 text-center text-xl-start u-text_color_white">
                        <p class="u-text_size_28">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Donec sodales lacinia velit, a malesuada enim placerat ac. 
                            Praesent maximus nisi eget nulla pulvinar, auctor egestas nulla sollicitudin. 
                            Sed nisl est, condimentum lobortis mauris aliquet, convallis pharetra risus. 
                            In cursus venenatis lorem et ullamcorper. 
                            Interdum et malesuada fames ac ante ipsum primis in faucibus.
                        </p>
                    </div>
                </div>
            </div>
        </header>

        <section class="container u-page-margin">
            <div class="row mb-4 mb-md-8">
                <div class="col d-flex justify-content-end u-text_color_white">
                    <h2 class="mb-0">Наши преимущества</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-6">
                    <article class="m-about-point-card ph-4 pv-6">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3>Lorem Ipsum</h3>
                            <img src="/images/tours/tags/icon-1.svg" width="60px" height="60px">
                        </div>
                        <p class="mt-6">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Donec dolor urna, vestibulum eget vestibulum in, iaculis non felis. 
                            Donec nec neque vel diam hendrerit ultrices non quis ante.
                        </p>
                    </article>
                    <article class="m-about-point-card ph-4 pv-6 mt-4 mt-sm-8">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3>Lorem Ipsum</h3>
                            <img src="images/tours/tags/icon-1.svg" width="60px" height="60px">
                        </div>
                        <p class="mt-6">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Donec dolor urna, vestibulum eget vestibulum in, iaculis non felis. 
                            Donec nec neque vel diam hendrerit ultrices non quis ante.
                        </p>
                    </article>
                </div>
                <div class="col-12 col-lg-6 d-flex align-items-center">
                    <article class="m-about-point-card ph-4 pv-6 mt-4 mt-sm-8 mt-md-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3>Lorem Ipsum</h3>
                            <img src="images/tours/tags/icon-1.svg" width="60px" height="60px">
                        </div>
                        <p class="mt-6">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Donec dolor urna, vestibulum eget vestibulum in, iaculis non felis. 
                            Donec nec neque vel diam hendrerit ultrices non quis ante.
                        </p>
                    </article>
                </div>
            </div>
        </section>

        <section class="u-page-margin">
            <div class="container">
                <nav class="row">
                    <div 
                        class="col d-flex flex-column flex-lg-row 
                        justify-content-lg-between align-items-lg-center 
                        mb-6 mb-sm-8">
                        <div class="mb-4 mb-lg-0">
                            <h2 class="u-text_color_white mb-0">
                                Популярные туры
                            </h2>
                        </div>
                        <a class="u-btn u-btn_size_big u-btn_theme_transparent"  href="{{ url("tours") }}">
                            Больше туров
                        </a>
                    </div>
                </nav>
            </div>
            <div class="container m-tours-mobile-slider">
                <div id="tours-slider">
                    <x-tours.columns-3-grid :tours="$tours" :max="3"/>
                
                    <div class="m-tours-mobile-slider-pagination"></div>
                </div>
            </div>
        </section>

    </div>

    <section class="container u-page-margin">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="u-text_color_green-light">Отзывы наших клиентов</h2>
            </div>
        </div>
        <div class="row">
            <div class="swiper-container pb-4" id="reviews-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide d-flex justify-content-lg-center">
                        <x-review-card
                            tour-image="https://cdn.pixabay.com/photo/2015/12/01/20/28/road-1072823_960_720.jpg"
                            tour-title="Lorem ipsum"
                            paragraph="Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Donec sodales lacinia velit, a malesuada enim placerat ac. 
                            Praesent  eget nulla pulvinar, auctor egestas nulla sollicitudin. 
                            Sed nisl est,  convallis pharetra risus. 
                            In cursus venenatis lorem et ullamcorper. 
                            Interdum et malesuada fames ac ante ipsum primis in faucibus."
                            />
                    </div>
                    <div class="swiper-slide d-flex justify-content-lg-center">
                        <x-review-card
                            tour-image="https://cdn.pixabay.com/photo/2015/12/01/20/28/road-1072823_960_720.jpg"
                            tour-title="Lorem ipsum"
                            paragraph="Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Donec sodales lacinia velit, a malesuada enim placerat ac. 
                            Praesent  eget nulla pulvinar, auctor egestas nulla sollicitudin. 
                            Sed nisl est,  convallis pharetra risus. 
                            In cursus venenatis lorem et ullamcorper. 
                            Interdum et malesuada fames ac ante ipsum primis in faucibus."
                            />
                    </div>
                    <div class="swiper-slide d-flex justify-content-lg-center">
                        <x-review-card
                            tour-image="https://cdn.pixabay.com/photo/2015/12/01/20/28/road-1072823_960_720.jpg"
                            tour-title="Lorem ipsum"
                            paragraph="Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Donec sodales lacinia velit, a malesuada enim placerat ac. 
                            Praesent  eget nulla pulvinar, auctor egestas nulla sollicitudin. 
                            Sed nisl est,  convallis pharetra risus. 
                            In cursus venenatis lorem et ullamcorper. 
                            Interdum et malesuada fames ac ante ipsum primis in faucibus."
                            />
                    </div>
                    <div class="swiper-slide d-flex justify-content-lg-center">
                        <x-review-card
                            tour-image="https://cdn.pixabay.com/photo/2015/12/01/20/28/road-1072823_960_720.jpg"
                            tour-title="Lorem ipsum"
                            paragraph="Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Donec sodales lacinia velit, a malesuada enim placerat ac. 
                            Praesent  eget nulla pulvinar, auctor egestas nulla sollicitudin. 
                            Sed nisl est,  convallis pharetra risus. 
                            In cursus venenatis lorem et ullamcorper. 
                            Interdum et malesuada fames ac ante ipsum primis in faucibus."
                            />
                    </div>
                </div>
            </div>
            <div class="reviews-slider-pagination"></div>
        </div>
    </section>

    <section class="container u-page-margin">
        <x-form.form-section
            title="Хотите начать путешествовать с нами?"
            paragraph="Оставляйте нам свои данные и интересующие 
            вас вопросы или пожелания к путешествию.
            Мы свяжемся с вами в ближайшее время!"
            is-green="true"
            />
    </section>

    <div class="u-page-padding"></div>
@endsection

@section('scripts')
    <script src="js/pages/about.js"></script>
@endsection