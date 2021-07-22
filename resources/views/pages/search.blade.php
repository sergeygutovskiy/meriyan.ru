@extends('layouts.app')

@section('title', 'Search')

@section('head')
    <link rel="stylesheet" href="css/pages/search.css">
@endsection

@section('content')
    <div class="u-page-background u-page-background-top offset_1">
        <picture class="u-page-background__image">
            <source
                srcset="/images/static/backgrounds/home.webp"
                type="image/webp"
            />
            <img class="u-page-background__image-fallback" src="/images/static/backgrounds/home.jpg" alt="">
        </picture>

        <header class="u-page-header">
            <div class="container u-page-margin">
                <div class="row justify-content-center">
                    <div class="col-12 col-xxl-9">

                        <form class="search-inputs row" id="search-form">
                            <div class="col-12 col-lg-8 mb-4">
                                <div class="dropdown" id="input_tags">
                                    <div class="dropdown__toggle">
                                        <span>Стиль путешествия</span>
                                        <span><img src="/images/static/arrow-bottom.svg"></span>
                                    </div>
                                    <div class="dropdown__menu-wrapper">
                                        <div class="dropdown__menu mb-n2">
                                            <div></div>

                                            @foreach ($tags as $tag)
                                                <button
                                                    type="button" 
                                                    data-tag-id="{{ $tag->id }}"
                                                    class="dropdown__btn tag-{{ $tag->id }} u-btn u-btn_theme_green_outlined mb-2 mr-2"
                                                    >
                                                    {{ $tag->name }}
                                                </button>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 col-lg-4 mb-4 mb-md-0">
                                <div class="toggle" id="input-discount">
                                    <span>Туры по акции</span>
                                    <div class="toggle__switcher active">
                                        <span></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-7 mb-4">
                                <div 
                                    class="input-complexity 
                                    d-flex flex-column flex-sm-row 
                                    align-items-stretch align-items-sm-center" 
                                    id="input-complexities"
                                    >
                                    <span>
                                        Сложность тура
                                    </span>
                                    <div class="mt-1 mt-sm-0 mb-n1 d-flex flex-wrap justify-content-between">
                                        <button
                                            type="button" 
                                            data-complexity-id="{{ $complexities[0]->id }}"
                                            class="u-btn complexity-{{ $complexities[0]->id }} 
                                            u-btn_theme_green_outlined mb-1 mr-1"
                                            >
                                            {{ $complexities[0]->name }}
                                        </button>
                                        <button
                                            type="button"
                                            data-complexity-id="{{ $complexities[1]->id }}"
                                            class="u-btn complexity-{{ $complexities[1]->id }} 
                                            u-btn_theme_green_outlined mb-1 mr-1"
                                            >
                                            {{ $complexities[1]->name }}
                                        </button>
                                        <button
                                            type="button" 
                                            data-complexity-id="{{ $complexities[2]->id }}"
                                            class="u-btn complexity-{{ $complexities[2]->id }} 
                                            u-btn_theme_green_outlined mb-1"
                                            >
                                            {{ $complexities[2]->name }}
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 col-lg-5 mb-4 mb-lg-0">
                                <div class="input-seasons" id="input-seasons">
                                    <span>
                                        <span>Сезон</span>
                                        <span class="d-none d-xl-inline">путешествия</span>
                                    </span>
                                    <div class="d-flex">
                                        <button
                                            type="button"
                                            data-season-id="{{ $seasons[0]->id }}"
                                            class="input-seasons__btn season-{{ $seasons[0]->id }}  mr-2"
                                            >
                                            <img src="/images/storage/seasons/winter.svg">
                                        </button>
                                        <button
                                            type="button" 
                                            data-season-id="{{ $seasons[1]->id }}"
                                            class="input-seasons__btn season-{{ $seasons[1]->id }} mr-2"
                                            >
                                            <img src="/images/storage/seasons/spring.svg">
                                        </button>
                                        <button 
                                            type="button"
                                            data-season-id="{{ $seasons[2]->id }}"
                                            class="input-seasons__btn season-{{ $seasons[2]->id }} mr-2"
                                            >
                                            <img src="/images/storage/seasons/summer.svg">
                                        </button>
                                        <button 
                                            type="button"
                                            data-season-id="{{ $seasons[3]->id }}"  
                                            class="input-seasons__btn season-{{ $seasons[3]->id }}"
                                            >
                                            <img src="/images/storage/seasons/autumn.svg">
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-8 mb-4 mb-lg-0">
                                <div class="input-price" id="input-price">
                                    <span>Бюджет</span>
                                    <div class="ml-auto">
                                        <span class="mr-1">от</span>
                                        <input type="number" class="input-price__input" value="{{ $min_price }}">
                                    </div>
                                    <div class="ml-1 ml-sm-4">
                                        <span class="mr-1">до</span>
                                        <input type="number" class="input-price__input" value="{{ $max_price }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 col-lg-4 ml-auto mr-auto mh-lg-0">
                                <button class="input-submit" type="submit">
                                    Подобрать туры
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
        </header>    
    </div>

    <div class="u-page-margin" id="loading">
        <img src="/images/static/loading.svg" width="360" height="360">
    </div>

    <section class="container u-page-margin active" id="tours">
        <x-tours.columns-3-grid 
            :tours="$tours" 
            :is-with-price="true"
            />
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
    <script src="/js/pages/search.js"></script>
@endsection