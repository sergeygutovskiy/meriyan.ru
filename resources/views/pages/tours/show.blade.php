@extends('layouts.app')

@section('title', 'Tours')

@section('head')
@endsection

@section('content')
    <div class="u-page-background u-page-background-top offset_2">
        <img 
            class="u-page-background__image"
            src="{{ $tour->image_path }}"
            >

        <header class="u-page-header u-page-header_size_100vh">
            <div class="container text-center u-text_color_white mt-auto mb-auto">
                <div class="row justify-content-center mb-7">
                    <div class="col-12 col-lg-7">
                        <h1 class="u-header-with-tags">
                            <span>
                                {{ $tour->title }}
                            </span>
                            {{-- // TODO доделать вывод тэгов --}}
                            {{-- <div class="u-header-with-tags__icons">
                                @foreach ($tour->tags as $tag)
                                    <img 
                                        src="{{ $tag->image_path }}"
                                        class="{{ $loop->last ? '' : 'mr-4' }}">
                                @endforeach
                            </div> --}}
                        </h1>
                    </div>
                </div>
                <div class="m-tour-info-header-buttons row justify-content-center mt-7">
                    <div class="col-12 col-md-6 col-lg-5 col-xxl-4 d-flex gx-sm-3">
                        <div 
                            class="u-btn u-btn_size_big u-btn_theme_transparent no-hover
                                d-inline-flex justify-content-between">
                            <span>Длительность:</span>
                            <span>
                                {{ $tour->info->duration }}
                                дней
                            </span>
                        </div>
                    </div>
                    <div class="gy-3 gy-md-0 col-12 col-md-6 col-lg-4 col-xxl-3 d-flex gx-sm-3">
                        <div 
                            class="u-btn u-btn_size_big u-btn_theme_transparent no-hover
                                d-inline-flex justify-content-between">
                            <span>Сложность:</span> 
                            <span>{{ $tour->info->complexity->name }}</span>
                        </div>
                    </div>
                    <div class="gy-3 gy-lg-0 order-3 order-lg-0 col-12 col-md-6 col-lg-3 col-xxl-3 d-flex gx-sm-3">
                        <div 
                            class="u-btn u-btn_size_big u-btn_theme_transparent no-hover
                                d-inline-flex justify-content-between">
                            <span>Сезон:</span> 
                            <span>{{ $tour->info->season->name }}</span>
                        </div>
                    </div>
                    <div class="order-5 order-lg-0 col-lg-7 col-xl-6 col-xxl-5 d-flex gy-3 g-sm-3">
                        <div 
                            class="u-btn u-btn_size_big u-btn_theme_transparent no-hover
                                d-inline-flex justify-content-between">
                            <span>Количество человек в группе:</span>
                            <span>
                                {{ $tour->info->people_amount }}
                            </span>
                        </div>
                    </div>
                    <div class="order-4 order-lg-0 col-12 col-md-6 col-lg-5 col-xl-5 col-xxl-4 d-flex gy-3 gx-sm-3">
                        <div 
                            class="u-btn u-btn_size_big u-btn_theme_white no-hover
                                d-inline-flex justify-content-between">
                            <span>Стоимость:</span> 
                            <span>
                                {{ $tour->price }}
                                ₽ 
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <section class="container u-page-margin">
            <div class="m-tour-info-video-container row justify-content-between align-items-center">
                <div class="col-12 col-lg-6">
                    <div class="m-tour-info-video-container__video-wrapper">
                        <iframe 
                            class="m-tour-info-video-container__video"
                            width="560" 
                            height="315" 
                            src="{{ $tour->info->video_path }}" 
                            title="YouTube video player" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>
                <div class="mt-7 mt-lg-0 col-12 col-lg-5 u-text_size_24 u-text_color_white">
                    <div class="m-tour-info-video-container__description">
                        {!! html_entity_decode($tour->info->description) !!}
                    </div>
                </div>
            </div>
        </section>

    </div>

    <section class="container u-page-margin u-page-margin_size_big">
        @foreach ($tour->info->locations as $location)
            <div class="m-tour-info-location {{ $loop->first ? '' : 'u-page-padding' }}">
                <div class="row mb-4 mb-lg-8">
                    <div class="col-12">
                        <div class="m-tour-info-location__name">
                            <div class="{{ $loop->first ? 'u-text_color_white' : 'u-text_color_green' }}">
                                <span class="pr-2 pr-sm-6">{{ $location->name }}</span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-tour-info-location__content row d-flex justify-content-end">
                    <div class="{{ 
                        $location->is_big ? 
                            'col-12 col-lg-9 col-xl-7' 
                            : 
                            'col-12 col-lg-7 col-xl-5'
                        }} m-tour-info-location__image-wrapper">
                        <img class="m-tour-info-location__image" src="{{ $location->image_path }}">
                    </div>
                    <div class="{{ 
                        $location->is_big ? 
                            'col-12 col-lg-8' 
                            : 
                            'col-12 col-lg-8'
                    }}">
                        <div class=
                            "m-tour-info-location__description {{
                                $location->is_big ? 'm-tour-info-location__description_green' : ''
                            }} u-text_size_24">
                            {!! html_entity_decode($location->description) !!}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>

    <div class="u-page-background u-page-background-bottom offset_1">
        <img 
            class="u-page-background__image"
            src="{{ $tour->image_path }}"
            >

        <section class="container u-page-margin">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-xl-11 col-xxl-10">
                    <div class="row">
                        <div class="col-12 col-md-6 d-flex">
                            <div class="m-tour-info-bottom-panel d-flex flex-column">
                                <h3 class="d-flex mt-auto mb-auto justify-content-between">
                                    <span>Стоимость:</span>
                                    <span>
                                        {{ $tour->price }} ₽
                                    </span>
                                </h3>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mt-4 mt-md-0">
                            <div class="m-tour-info-bottom-panel m-tour-info-bottom-panel_theme_green d-flex align-items-center">
                                <img src="/images/static/pdf.svg" width="56" height="80">
                                <h3 class="pl-4">
                                    <a href="">Посмотреть полную программу тура</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-12 col-lg-10 col-xl-11 col-xxl-10">
                    <div class="row">
                        <div class="col-12 col-xl-6">
                            <div class="m-tour-info-bottom-panel">
                                <h3 class="mb-4">Что входит в стоимость:</h3>
                                @foreach ($tour->info->services_in_price as $service)
                                    <div class="m-tour-info-bottom-panel__point">
                                        {!! html_entity_decode($service->description) !!}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-12 col-xl-6 mt-4 mt-xl-0">
                            <div class="m-tour-info-bottom-panel">
                                <h3 class="mb-4">Что не входит в стоимость:</h3>
                                @foreach ($tour->info->services_not_in_price as $service)
                                    <div class="m-tour-info-bottom-panel__point">
                                        {!! html_entity_decode($service->description) !!}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="container u-page-margin">
            <div class="row">
                <div 
                    class="col-12 col-lg pr-4 
                        d-flex flex-column justify-content-center 
                        u-text_color_white"
                    >
                    <h2>
                        Lorem Ipsum
                    </h2>
                    <p class="u-text_size_28">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Donec dolor urna, vestibulum eget vestibulum in, iaculis non felis. 
                        Donec nec neque vel diam hendrerit ultrices non quis ante.
                    </p>
                </div>
                <div class="col-12 col-lg d-flex justify-content-lg-end mt-6 mt-lg-0">
                    <form class="m-form m-form__theme_text ph-4 pv-6" id="tour-booking-form">
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
                        <div class="mb-4 m-form__success-text">
                            <p class="u-text_color_green-light">
                                Спасибо, заявка принята. Мы свяжемся с вами в ближайшее время
                            </p>
                        </div>
                        <div>
                            <button class="m-form-button u-btn u-btn_size_big u-btn_theme_green">Отправить</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <div class="u-page-padding"></div>
    </div>
@endsection