@extends('layouts.app')

@section('title', 'Категория "' . $tag->name . '" - МериЯн')

@section('head')
    {{-- <link rel="stylesheet" href="css/pages/home.css"> --}}
@endsection

@section('content')
    <div class="u-page-background u-page-background-top">
        <picture class="u-page-background__image">
            <source
                srcset="/images/static/backgrounds/tag.webp"
                type="image/webp"
            />
            <img class="u-page-background__image-fallback" src="/images/static/backgrounds/tag.jpg" alt="">
        </picture>

        <header class="u-page-header u-page-header_size_100vh">
            <div class="container mt-auto mb-auto">
                <div class="row justify-content-center text-center u-text_color_white">
                    <div class="col-12 col-lg-7">
                        <h1 class="u-header-with-tags mb-7">
                            <span>
                                {{ $tag->page_name != null ? $tag->page_name : $tag->name }}
                            </span>
                            {{-- // TODO доделать вывод тэгов --}}
                            {{-- <div class="u-header-with-tags__icons">
                                <img src="/images/{{ $tag->image_path }}">
                            </div> --}}
                        </h1>
                        <p class="u-text_size_28">
                            {{ $tag->description }}
                        </p>
                    </div>
                </div>
            </div>
        </header>

        <section class="container u-page-margin">
            <x-tours.columns-3-grid 
                :tours="$tag->tours" 
                :is-with-price="true"
                />
        </section>

    </div>

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
    {{-- <script src="js/pages/home.js"></script> --}}
@endsection