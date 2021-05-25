@extends('layouts.app')

@section('title', 'Tours')

@section('head')
    <link rel="stylesheet" href="css/pages/tours.css">
@endsection

@section('content')
    <header class="u-page-header u-page-header_size_100vh">
        <div class="container d-flex flex-column justify-content-center u-text_color_white text-center">
            <div class="row justify-content-center mb-7">
                <div class="col-12 col-lg-7">
                    <h1 class="mb-7">Lorem Ipsum</h1>
                    <p class="u-text_size_28">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Donec dolor urna, vestibulum eget vestibulum in, iaculis non felis. 
                        Donec nec neque vel diam hendrerit ultrices non quis ante.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-6 d-flex justify-content-center justify-content-lg-start">
                    <a class="u-btn u-btn_size_big u-btn_theme_transparent">
                        Lorem Ipsum
                    </a>
                </div>
                <div class="col-12 col-lg-6 d-flex justify-content-center justify-content-lg-end mt-6 mt-lg-0">
                    <a class="u-btn u-btn_size_big u-btn_theme_transparent">
                        Lorem Ipsum
                    </a>
                </div>
            </div>
            <div class="row justify-content-center mt-6">
                <div class="col">
                    <a class="u-btn u-btn_size_big u-btn_theme_transparent">
                        Lorem Ipsum
                    </a>
                </div>
            </div>
        <div>
    </header>

    <section class="container mt-100">
        <div class="d-flex flex-column justify-content-center u-text_color_white">
            <div class="row justify-content-center text-md-center">
                <div class="col-12">
                    <h2 class="u-tag-icon">
                        <span>Lorem Ipsum</span>
                        <img src="images/tours/tags/icon-1.svg">
                    </h2>
                </div>
                <p class="u-text_size_28 col-lg-7 mb-8">
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
        <div class="mt-8">
            <x-tours.columns-3-grid :tours="$tours" />
        </div>
    </section>

    <section class="container mt-100">
        <div class="d-flex flex-column justify-content-center u-text_color_white">
            <div class="row justify-content-center text-md-center">
                <div class="col-12">
                    <h2 class="u-tag-icon u-text_color_green-light">
                        <span>Lorem Ipsum</span>
                        <img src="images/tours/tags/icon-1.svg">
                    </h2>
                </div>
                <p class="u-text_size_28 u-text_color_green-light col-lg-7 mb-8">
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
        <div class="mt-8">
            <x-tours.columns-3-grid :tours="$tours" />
        </div>
    </section>

    <section class="container mt-100">
        <div class="d-flex flex-column justify-content-center u-text_color_white">
            <div class="row justify-content-center text-md-center">
                <div class="col-12">
                    <h2 class="u-tag-icon">
                        <span>Lorem Ipsum</span>
                        <img src="images/tours/tags/icon-1.svg">
                    </h2>
                </div>
                <p class="u-text_size_28 col-lg-7 mb-8">
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
        <div class="mt-8">
            <x-tours.columns-3-grid :tours="$tours" />
        </div>
    </section>    

    <section class="mt-100 container">
        <x-form.form-section
            title="Lorem Ipsum"
            paragraph="Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
            Donec dolor urna, vestibulum eget vestibulum in, iaculis non felis. 
            Donec nec neque vel diam hendrerit ultrices non quis ante."
        />
    </section>

    <div class="pb-100"></div>
@endsection