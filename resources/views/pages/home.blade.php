@extends('layouts.app')

@section('title', 'Главная - МериЯн')

@section('head')
    <link rel="stylesheet" href="css/pages/home.css">
@endsection

{{-- // TODO сделать пагинацию, инь-янь в хедере, сделать отзывы, карту, ссылку на скачивание пдф--}}

@section('content')
    <div class="u-page-background u-page-background-top offset_2">
        <picture class="u-page-background__image">
            <source
                srcset="/images/static/backgrounds/home.webp"
                type="image/webp"
            />
            <img class="u-page-background__image-fallback" src="/images/static/backgrounds/home.jpg" alt="">
        </picture>

        <header class="u-page-header u-page-header_size_100vh">
            <div class="container mt-auto mb-auto">
                <div class="row justify-content-center text-center u-text_color_white">
                    <div class="home-header col-12 col-lg-7">
                        <h1 class="mb-7">
                            Отдыхай как любишь
                        </h1>
                        <p class="u-text_size_28 mb-7">
                            Зная рынок в нюансах, мы создаем путешествия мечты.
                            Мы подходим сугубо индивидуально и заботимся о вашем комфорте!
                        </p>
                        <div>
                            <button class="u-btn u-btn_size_big u-btn_theme_transparent" id="learn-more-btn">
                                Узнать больше
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <section class="container u-text_color_white u-page-margin">
            <div class="row">
                <div class="col">
                    <h2>О нас</h2>
                </div>
            </div>
            <div class="row mb-4 mb-sm-7">
                <div class="col-lg-7">
                    <p class="u-text_size_28">
                        Мы готовы организовать для вас абсолютно любую поездку – 
                        от семейного путешествия до свадебного торжества за границей. 
                        Так же в нашем арсенале большой выбор авторских
                        туров по всему миру.                       
                    </p>
                </div>
            </div>
            <div class="row justify-content-end mb-6 mb-sm-7">
                <div class="col-lg-7">
                    <p class="u-text_size_28">
                        Так же зная проблему путешествий людей с ограниченными возможностями слуха, 
                        мы организовали специальные туры в группах и индивидуально 
                        с участием гида-сурдопереводчика.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a class="u-btn u-btn_size_big u-btn_theme_transparent" href="{{ url("about") }}">
                        Больше о нас
                    </a>
                </div>
            </div>
        </section>

        <section class="container u-page-margin">
            <nav class="row">
                <div 
                    class="col d-flex 
                    flex-column flex-lg-row 
                    justify-content-lg-between align-items-lg-center 
                    mb-6 mb-sm-8"
                    >
                    <div class="mb-4 mb-lg-0">
                        <h2 class="u-text_color_white mb-0">
                            Мы рекомендуем
                        </h2>
                    </div>
                    <a class="u-btn u-btn_size_big u-btn_theme_transparent"  href="{{ url("tours") }}">
                        Больше туров
                    </a>
                </div>
            </nav>
        </section>

    </div>

    <section class="container m-tours-mobile-slider">
        <div id="tours-slider">
            <x-tours.columns-3-grid :tours="$tours" />
        
            <div class="m-tours-mobile-slider-pagination"></div>
        </div>
    </section>

    <div class="u-page-background u-page-background-bottom offset_1">
        <picture class="u-page-background__image">
            <source
                srcset="/images/static/backgrounds/home.webp"
                type="image/webp"
            />
            <img class="u-page-background__image-fallback" src="/images/static/backgrounds/home.jpeg" alt="">
        </picture>

        <section class="container u-page-margin">
            <x-banner
                title="Не можете выбрать тур?"
                desc="Мы подберем вам тур, учитывая все ваши пожелания к путешествию, 
                чтобы ваш отдых отвечал всем вашим пожеланиям. В ходе беседы менеджер 
                уточнит детали и пожелания, после чего изучит все доступные
                предложения и сформирует идеальный со всех точек зрения тур."
                link-text="Подберите мне тур"
                img="/images/static/banners/home.png"
            />
        </section>

        <section class="container u-page-margin">
            <div class="row">
                <div class="col text-center u-text_color_white">
                    <h2>Наши партнёры</h2>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-lg-3 justify-content-sm-between">
                <div class="col d-flex justify-content-center">
                    <x-partner-card 
                        name="Бюро жилья"
                        image="/images/static/partners/partner-1.png"
                        paragraph="Брокерское агентство недвижимости 'Бюро жилья'"
                    />
                </div>
                <div class="col d-flex justify-content-center mt-4 mt-lg-0">
                    <x-partner-card 
                        name=""
                        image="/images/static/partners/partner-2.png"
                        paragraph="Общественная организация по защите прав 
                        людей с ограниченными возможностями по слуху"
                    />
                </div>
                <div class="col col-md-12 col-lg mt-4 mt-lg-0 d-flex justify-content-center">
                    <x-partner-card 
                        name="Мир глухих"
                        image="/images/static/partners/partner-3.png"
                        paragraph="Центр сурдоперевода 'Мир глухих'"
                    />
                </div>
            </div>
        </section>

        <section class="container u-page-margin">
            <x-form.form-section
                title="Хотите начать путешествовать с нами?"
                paragraph="Оставляйте нам свои данные и интересующие 
                вас вопросы или пожелания к путешествию.
                Мы свяжемся с вами в ближайшее время!"
                />
        </section>

        <div class="u-page-padding"></div>
    </div>

    <div class="m-modal" id="modal-help-chose-tour">
        <div class="container m-modal-container m-modal__fade-container">
            <div class="row m-modal-container m-modal__fade-container">
                <div class="col d-flex justify-content-center align-items-center m-modal__fade-container">
                    <form 
                        class="m-modal__content m-form m-form__theme_icon ph-2 pv-2 mv-2 mv-sm-6" id="form-help-chose-tour">
                        <div class="d-flex justify-content-end">
                            <img class="m-modal__close-btn" src="/images/static/modal-close.svg">
                        </div>
                        <div class="ph-2 ph-sm-4 pv-2 mh-sm-4 mt-sm-2">
                            <div class="mb-4">
                                <h3 class="u-text_color_green-light">Заказать подбор тура</h3>
                            </div>
                            <div class="mb-4">
                                <p class="u-text_color_green-light">
                                    Оставьте нам свои контактные данные и мы свяжется с Вами в ближайшее время
                                </p>
                            </div>
                            <div class="mb-4">
                                <input 
                                    class="m-form-input"
                                    type="text"
                                    name="name" 
                                    placeholder="Ваше имя"
                                    >
                            </div>
                            <div class="mb-4">
                                <input 
                                    class="m-form-input" 
                                    type="text"
                                    name="email" 
                                    placeholder="Ваш E-mail"
                                    >
                            </div>
                            <div class="mb-4">
                                <input 
                                    class="m-form-input" 
                                    type="text"
                                    name="phone" 
                                    placeholder="Ваш телефон"
                                    >
                            </div>
                            <div class="mb-4">
                                <textarea 
                                    class="m-form-input"
                                    name="wishes"
                                    cols="30" 
                                    rows="8"
                                    placeholder="Ваши пожелания"></textarea>
                            </div>
                            <div class="">
                                <button 
                                    type="submit"
                                    class="m-form-button m-form-submit u-btn u-btn_size_big u-btn_theme_green"
                                    >
                                    Отправить
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="js/pages/home.js"></script>
@endsection