@extends('layouts.app')

@section('title', 'Туры - МериЯн')

@section('head')
@endsection

@section('content')
    <div class="u-page-background u-page-background-top">
        <picture class="u-page-background__image">
            <source
                media="(max-width: 575px)"
                type="image/webp"
                srcset="/images/static/backgrounds/tours-top--mobile.webp"
            />
            <source
                media="(min-width: 576px)"
                type="image/webp"
                srcset="/images/static/backgrounds/tours-top.webp"
            />
            <img class="u-page-background__image-fallback" src="/images/static/backgrounds/tours-top.jpg">
        </picture>

        <header class="u-page-header u-page-header_size_100vh">
            <div class="container u-text_color_white text-center mt-auto mb-auto">
                <div class="row justify-content-center mb-8">
                    <div class="col-12 col-lg-7">
                        <h1 class="mb-6">
                            Наши уникальные туры
                        </h1>
                        <p class="u-text_size_28">
                            Мы собрали самые популярные категории наших туров, 
                            чтобы вы могли выбрать подходящее для вас путешествие
                        </p>
                    </div>
                </div>
                <div class="row mb-4 mb-lg-8">
                    <div class="col-12 col-lg-6 d-flex justify-content-center justify-content-lg-start mb-4 mb-lg-0">
                        <button class="u-btn u-btn_size_big u-btn_theme_transparent">
                            {{ $tag1->name }}
                        </button>
                    </div>
                    <div class="col-12 col-lg-6 d-flex justify-content-center justify-content-lg-end">
                        <button class="u-btn u-btn_size_big u-btn_theme_transparent">
                            {{ $tag2->name }}
                        </button>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col">
                        <button class="u-btn u-btn_size_big u-btn_theme_transparent">
                            {{ $tag3->name }}
                        </button>
                    </div>
                </div>
            <div>
        </header>

        <section class="container u-page-margin" id="tag1">
            <div class="d-flex flex-column justify-content-center u-text_color_white mb-6 mb-sm-8">
                <div class="row justify-content-center text-md-center">
                    <div class="col-12">
                        <h2 class="u-header-with-tags">
                            <span>{{ $tag1->name }}</span>
                            <div class="u-header-with-tags__icons">
                                <img src="{{ $tag1->image_path }}">
                            </div>
                        </h2>
                    </div>
                    <p class="u-text_size_28 col-lg-7 mb-6 mb-sm-8">
                        {{ $tag1->description }}
                    </p>
                    <div>
                        <a 
                            class="u-btn u-btn_size_big u-btn_theme_transparent" 
                            href="{{ route("tag.show", ['tag' => $tag1]) }}">
                            Больше туров
                        </a>
                    </div>
                </div>
            </div>
            <div>
                <x-tours.columns-3-grid 
                    :tours="$tag1->tours" 
                    :max="3" 
                    :centered="true" 
                    :is-with-price="true" 
                    />
            </div>
        </section>
    
    </div>

    <section class="container u-page-margin" id="tag2">
        <div class="d-flex flex-column justify-content-center u-text_color_green-light mb-6 mb-sm-8">
            <div class="row justify-content-center text-md-center">
                <div class="col-12">
                    <h2 class="u-header-with-tags">
                        <span>{{ $tag2->name }}</span>
                        <div class="u-header-with-tags__icons">
                            <img src="{{ $tag2->image_path }}" style="filter: none;">
                        </div>
                    </h2>
                </div>
                <p class="u-text_size_28 col-lg-7 mb-6 mb-sm-8">
                    {{ $tag2->description }}
                </p>
                <div>
                    <a 
                        class="u-btn u-btn_size_big u-btn_theme_green"
                        href="{{ route("tag.show", ['tag' => $tag2]) }}">
                        Больше туров
                    </a>
                </div>
            </div>
        </div>
        <div>
            <x-tours.columns-3-grid 
            :tours="$tag2->tours" 
            :max="3" 
            :centered="true" 
            :is-with-price="true" 
            />
        </div>
    </section>

    <div class="u-page-background u-page-background-bottom offset_2">
        <picture class="u-page-background__image">
            <source
                media="(max-width: 575px)"
                type="image/webp"
                srcset="/images/static/backgrounds/tours-bottom--mobile.webp"
            />
            <source
                media="(min-width: 576px)"
                type="image/webp"
                srcset="/images/static/backgrounds/tours-bottom.webp"
            />
            <img class="u-page-background__image-fallback" src="/images/static/backgrounds/tours-bottom.jpg">
        </picture>

        <section class="container u-page-margin" id="tag3">
            <div class="d-flex flex-column justify-content-center u-text_color_white mb-6 mb-sm-8">
                <div class="row justify-content-center text-md-center">
                    <div class="col-12">
                        <h2 class="u-header-with-tags">
                            <span>{{ $tag3->name }}</span>
                            <div class="u-header-with-tags__icons">
                                <img src="{{ $tag3->image_path }}">
                            </div>
                        </h2>
                    </div>
                    <p class="u-text_size_28 col-lg-7 mb-6 mb-sm-8">
                        {{ $tag3->description }}
                    </p>
                    <div>
                        <a 
                            class="u-btn u-btn_size_big u-btn_theme_transparent"
                            href="{{ route("tag.show", ['tag' => $tag3]) }}">
                            Больше туров
                        </a>
                    </div>
                </div>
            </div>
            <div>
                <x-tours.columns-3-grid 
                    :tours="$tag3->tours" 
                    :max="3" 
                    :centered="true" 
                    :is-with-price="true" 
                    />
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
@endsection

@section('scripts')
    <script src="/js/pages/tours.js"></script>
@endsection