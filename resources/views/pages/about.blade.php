@extends('layouts.app')

@section('title', 'About us')

@section('head')
    <link rel="stylesheet" href="css/pages/about.css">
@endsection

@section('content')
    <header class="container pt-100">
        <div class="row">
            <div class="col-12 col-xl-5 text-center text-xl-start u-text_color_white">
                <h1>Lorem ipsum </h1>
            </div>
        </div>
        <div class="row mt-8">
            <div class="col-12 col-xl-7 offset-xl-5 text-center text-xl-start u-text_color_white mt-xl-8">
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
    </header>

    <section class="container mt-200">
        <div class="row">
            <div class="col d-flex justify-content-end u-text_color_white">
                <h2>Lorem Ipsum</h2>
            </div>
        </div>
        <div class="row mt-8">
            <div class="col-12 col-lg-6 mt-lg-8">
                <article class="point p-4">
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
                <article class="point p-4 mt-8">
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
            <div class="col-12 col-lg-6 d-flex align-items-center mt-8">
                <article class="point p-4">
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

    <section class="mt-100">
        <div class="container">
            <nav class="row">
                <div class="col d-flex flex-column flex-lg-row justify-content-lg-between align-items-lg-center mb-8">
                    <div class="mb-4 mb-lg-0">
                        <h2 class="u-text_color_white mb-0">
                            Популярные туры
                        </h2>
                    </div>
                    <button class="u-btn u-btn_size_big u-btn_theme_transparent">
                        Больше туров
                    </button>
                </div>
            </nav>
        </div>
        <div class="tours-wrapper container">
            <div id="tours">
                <x-tours.columns-3-grid :tours="$tours" />
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
    <script src="js/pages/about.js"></script>
@endsection