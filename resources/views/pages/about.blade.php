@extends('layouts.app')

@section('title', 'О нас - МериЯн')

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

        <header class="u-page-header">
            <div class="container u-page-margin">
                <div class="row mb-6">
                    <div class="col-12 col-xl-5 text-center text-xl-start u-text_color_white">
                        <h1>О нас</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-xl-7 offset-xl-5 text-center text-xl-start u-text_color_white">
                        <p class="u-text_size_28">
                            Турагентство МэриЯн предлагает услуги по подбору и организации туров, экскурсий и
                            эксклюзивно-индивидуальных программ под запрос, в любой точке мира и в особенности в
                            республике Крым, где мы вляемся Встречающей стороной.
                        </p>
                        <p class="u-text_size_28 mt-6">
                            Путешествие может быть идеальным только в том случае, если в нем предусмотрено
                            абсолютно все. Поэтому все заботы от покупки авиабилетов и бронирования гостиницы до
                            трансфера из аэропорта и заказа экскурсий мы возьмем на себя. Вам останется лишь
                            наслаждаться отдыхом.
                        </p>
                    </div>
                </div>
            </div>
        </header>

        <section class="container u-page-margin">
            <div class="row mb-4 mb-md-8">
                <div class="col d-flex justify-content-end u-text_color_white">
                    <h2 class="mb-0">
                        Почему стоит обратиться именно к нам?
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-6">
                    <article class="m-about-point-card ph-4 pv-6">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3>
                                С нами безопасно
                            </h3>
                            <img src="/images/static/about/flower.svg" width="60px" height="60px">
                        </div>
                        <p class="mt-6">
                            Важно, что мы заботимся и о вашей безопасности: вы будете заранее знать об
                            обстановке в регионе, где собираетесь отдыхать, обо всех нюансах страховой программы,
                            особенностях перелета и трансфера.
                        </p>
                    </article>
                    <article class="m-about-point-card ph-4 pv-6 mt-4 mt-sm-8">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3>
                                Подходим каждому
                            </h3>
                            <img src="/images/static/about/medal.svg" width="60px" height="60px">
                        </div>
                        <p class="mt-6">
                            Думаете, что у вас нет денег на путешествие мечты? 
                            Вне зависимости от
                            бюджета поездки мы подберем лучшие варианты, 
                            которые будут соответствовать вашим пожеланиям.
                        </p>
                    </article>
                </div>
                <div class="col-12 col-lg-6 d-flex align-items-center">
                    <article class="m-about-point-card ph-4 pv-6 mt-4 mt-sm-8 mt-md-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3>
                                На нас можно положиться
                            </h3>
                            <img src="/images/static/about/support.svg" width="60px" height="60px">
                        </div>
                        <p class="mt-6">
                            Мы не бросаем своих клиентов в поездке!
                            Менеджер всегда будет на связи и поможет решить любую возникшую проблему.                            
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
                            Больше популярных туров
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