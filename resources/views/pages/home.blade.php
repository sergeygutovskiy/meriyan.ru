@extends('layouts.app')

@section('title', 'Home')

@section('head')
    <link rel="stylesheet" href="css/pages/home.css">
@endsection

@section('content')
    {{-- <div class="u-page-background u-page-background__top" data-background-target="tours">
        <img class="u-page-background__image" 
            src="https://images7.alphacoders.com/686/thumb-1920-686386.jpg">
    </div>
    <div class="u-page-background u-page-background__bottom" data-background-target="tours">
        <img class="u-page-background__image" 
            src="https://images7.alphacoders.com/686/thumb-1920-686386.jpg">
    </div> --}}

    <header class="u-page-header u-page-header_size_100vh">
        <div class="container d-flex flex-column justify-content-center text-center u-text_color_white">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-7">
                    <h1 class="mb-7">Lorem Ipsum</h1>
                    <p class="u-text_size_28 mb-7">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Donec dolor urna, vestibulum eget vestibulum in, iaculis non felis. 
                        Donec nec neque vel diam hendrerit ultrices non quis ante.
                    </p>
                    <div>
                        <button class="u-btn u-btn_size_big u-btn_theme_transparent">
                            Узнать больше
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="container u-text_color_white">
        <div class="row">
            <div class="col">
                <h2>Lorem Ipsum</h2>
            </div>
        </div>
        <div class="row mb-7">
            <div class="col-lg-7">
                <p class="u-text_size_28">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Donec dolor urna, vestibulum eget vestibulum in, iaculis non felis. 
                    Donec nec neque vel diam hendrerit ultrices non quis ante.
                </p>
            </div>
        </div>
        <div class="row justify-content-end mb-7">
            <div class="col-lg-7">
                <p class="u-text_size_28">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Donec dolor urna, vestibulum eget vestibulum in, iaculis non felis. 
                    Donec nec neque vel diam hendrerit ultrices non quis ante.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button class="u-btn u-btn_size_big u-btn_theme_transparent">
                    Больше о нас
                </button>
            </div>
        </div>
    </section>

    <section class="container mt-100">
        <nav class="row">
            <div class="col d-flex 
                flex-column flex-lg-row 
                justify-content-lg-between align-items-lg-center 
                mb-8">
                <div class="mb-4 mb-lg-0">
                    <h2 class="u-text_color_white mb-0">
                        Lorem Ipsum
                    </h2>
                </div>
                <button class="u-btn u-btn_size_big u-btn_theme_transparent">
                    Больше туров
                </button>
            </div>
        </nav>
    </section>

    <section id="top-wave" class="tours-wrapper container">
        <div class="middle-back"></div>
        
        <div id="tours">
            <x-tours.columns-3-grid :tours="$tours" />
        </div>
    </section>

    <section class="container mt-100">
        <x-banner
            title="Lorem Ipsum Lorem Ipsu Lorem Ipsu"
            desc="Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                Donec dolor urna, vestibulum eget vestibulum in, iaculis non felis. 
                Donec nec neque vel diam hendrerit ultrices non quis ante."
            img="http://placehold.it/500x500"
            link-text="Подберите мне тур"
        />
    </section>

    <section class="container mt-100">
        <div class="row">
            <div class="col text-center u-text_color_white">
                <h2>Lorem Ipsum</h2>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-lg-3 justify-content-sm-between">
            <div class="col d-flex justify-content-center">
                <x-partner-card 
                    name="Lorem ipsum"
                    image="http://placehold.it/500x500"
                    paragraph="Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Donec sodales lacinia velit, a malesuada enim placerat ac."
                />
            </div>
            <div class="col d-flex justify-content-center mt-4 mt-lg-0">
                <x-partner-card 
                    name="Lorem ipsum"
                    image="http://placehold.it/500x500"
                    paragraph="Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Donec sodales lacinia velit, a malesuada enim placerat ac."
                />
            </div>
            <div class="col col-md-12 col-lg mt-4 mt-lg-0 d-flex justify-content-center">
                <x-partner-card 
                    name="Lorem ipsum"
                    image="http://placehold.it/500x500"
                    paragraph="Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Donec sodales lacinia velit, a malesuada enim placerat ac."
                />
            </div>
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

@section('scripts')
    <script src="js/pages/home.js"></script>
    
    <script>
        // document.addEventListener("DOMContentLoaded", function() {
        //     let el = document.getElementsByClassName("u-page-background")[0];
        //     let attr = el.dataset.backgroundTarget;
            
        //     let target = document.getElementById(attr);
        //     let height = target.getBoundingClientRect().top + pageYOffset + target.offsetHeight / 2;

        //     el.style.cssText = "height: " + height + "px";

        //     //

        //     el = document.getElementsByClassName("u-page-background")[1];
        //     attr = el.dataset.backgroundTarget;

        //     target = document.getElementById(attr);
        //     height = document.documentElement.offsetHeight - height;

        //     el.style.cssText = "height: " + height + "px"
        //         + ";" + "top: " + target.getBoundingClientRect().top;
        // });
    </script>
@endsection