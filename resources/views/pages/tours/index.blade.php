@extends('layouts.app')

@section('title', 'Tours')

@section('head')
@endsection

@section('content')
    <div class="u-page-background u-page-background-top">
        <img 
            class="u-page-background__image"
            src="https://img.etimg.com/thumb/msid-68721417,width-650,imgsize-1016106,,resizemode-4/nature1_gettyimages.jpg"
            >

        <header class="u-page-header u-page-header_size_100vh">
            <div class="container u-text_color_white text-center mt-auto mb-auto">
                <div class="row justify-content-center mb-8">
                    <div class="col-12 col-lg-7">
                        <h1 class="mb-6">Lorem Ipsum</h1>
                        <p class="u-text_size_28">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Donec dolor urna, vestibulum eget vestibulum in, iaculis non felis. 
                            Donec nec neque vel diam hendrerit ultrices non quis ante.
                        </p>
                    </div>
                </div>
                <div class="row mb-4 mb-lg-8">
                    <div class="col-12 col-lg-6 d-flex justify-content-center justify-content-lg-start mb-4 mb-lg-0">
                        <a class="u-btn u-btn_size_big u-btn_theme_transparent">
                            Lorem Ipsum
                        </a>
                    </div>
                    <div class="col-12 col-lg-6 d-flex justify-content-center justify-content-lg-end">
                        <a class="u-btn u-btn_size_big u-btn_theme_transparent">
                            Lorem Ipsum
                        </a>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col">
                        <a class="u-btn u-btn_size_big u-btn_theme_transparent">
                            Lorem Ipsum
                        </a>
                    </div>
                </div>
            <div>
        </header>

        <section class="container u-page-margin">
            <div class="d-flex flex-column justify-content-center u-text_color_white mb-6 mb-sm-8">
                <div class="row justify-content-center text-md-center">
                    <div class="col-12">
                        <h2 class="u-header-with-tags">
                            <span>Lorem Ipsum</span>
                            <div class="u-header-with-tags__icons">
                                <img src="/images/storage/tags/icons/1.svg">
                            </div>
                        </h2>
                    </div>
                    <p class="u-text_size_28 col-lg-7 mb-6 mb-sm-8">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Donec dolor urna, vestibulum eget vestibulum in, iaculis non felis. 
                        Donec nec neque vel diam hendrerit ultrices non quis ante.
                    </p>
                    <div>
                        <a class="u-btn u-btn_size_big u-btn_theme_transparent">
                            Больше туров
                        </a>
                    </div>
                </div>
            </div>
            <div>
                <x-tours.columns-3-grid :tours="$tours" :max="3" :centered="true" />
            </div>
        </section>
    
    </div>

    <section class="container u-page-margin">
        <div class="d-flex flex-column justify-content-center u-text_color_green-light mb-6 mb-sm-8">
            <div class="row justify-content-center text-md-center">
                <div class="col-12">
                    <h2 class="u-header-with-tags">
                        <span>Lorem Ipsum</span>
                        <div class="u-header-with-tags__icons">
                            <img src="/images/storage/tags/icons/1.svg">
                        </div>
                    </h2>
                </div>
                <p class="u-text_size_28 col-lg-7 mb-6 mb-sm-8">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Donec dolor urna, vestibulum eget vestibulum in, iaculis non felis. 
                    Donec nec neque vel diam hendrerit ultrices non quis ante.
                </p>
                <div>
                    <a class="u-btn u-btn_size_big u-btn_theme_green">
                        Больше туров
                    </a>
                </div>
            </div>
        </div>
        <div>
            <x-tours.columns-3-grid :tours="$tours" :max="3" :centered="true" />
        </div>
    </section>

    <div class="u-page-background u-page-background-bottom offset_2">
        <img 
            class="u-page-background__image"
            src="https://img.etimg.com/thumb/msid-68721417,width-650,imgsize-1016106,,resizemode-4/nature1_gettyimages.jpg"
            >

        <section class="container u-page-margin">
            <div class="d-flex flex-column justify-content-center u-text_color_white mb-6 mb-sm-8">
                <div class="row justify-content-center text-md-center">
                    <div class="col-12">
                        <h2 class="u-header-with-tags">
                            <span>Lorem Ipsum</span>
                            <div class="u-header-with-tags__icons">
                                <img src="/images/storage/tags/icons/1.svg">
                            </div>
                        </h2>
                    </div>
                    <p class="u-text_size_28 col-lg-7 mb-6 mb-sm-8">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Donec dolor urna, vestibulum eget vestibulum in, iaculis non felis. 
                        Donec nec neque vel diam hendrerit ultrices non quis ante.
                    </p>
                    <div>
                        <a class="u-btn u-btn_size_big u-btn_theme_transparent">
                            Больше туров
                        </a>
                    </div>
                </div>
            </div>
            <div>
                <x-tours.columns-3-grid :tours="$tours" :max="3" :centered="true" />
            </div>
        </section>

        <div class="u-page-padding"></div>
    </div>
@endsection