@extends('layouts.app')

@section('title', 'Tours')

@section('head')
    <link rel="stylesheet" href="css/pages/tours.css">
@endsection

@section('header')
    <div class="header d-flex flex-column justify-content-center text-center text-white">
        <div class="row justify-content-center mb-7">
            <div class="col-12 col-lg-7">
                <h1 class="mb-7">Lorem Ipsum</h1>
                <p class="text-28">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Donec dolor urna, vestibulum eget vestibulum in, iaculis non felis. 
                    Donec nec neque vel diam hendrerit ultrices non quis ante.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-6 d-flex justify-content-center justify-content-lg-start">
                <a class="btn btn_size_lg">
                    Lorem Ipsum
                </a>
            </div>
            <div class="col-12 col-lg-6 d-flex justify-content-center justify-content-lg-end mt-6 mt-lg-0">
                <a class="btn btn_size_lg">
                    Lorem Ipsum
                </a>
            </div>
        </div>
        <div class="row justify-content-center mt-6">
            <div class="col">
                <a class="btn btn_size_lg">
                    Lorem Ipsum
                </a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <section class="container mt-100">
        <div class="d-flex flex-column justify-content-center text-white">
            <div class="row justify-content-center text-md-center">
                <div class="col-12">
                    <h2 class="header-tag-icon mb-7">
                        <span>Lorem Ipsum</span>
                        <img src="images/tours/tags/icon-1.svg">
                    </h2>
                </div>
                <p class="text-28 col-lg-7 mb-7">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Donec dolor urna, vestibulum eget vestibulum in, iaculis non felis. 
                    Donec nec neque vel diam hendrerit ultrices non quis ante.
                </p>
                <div>
                    <a class="btn btn_size_lg btn_theme_secondary">
                        Больше туров
                    </a>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3 justify-content-lg-center mt-8 mb-n6">
                @for ($i = 0; $i < 3; $i++)
                    <div class="col d-flex justify-content-center mb-6">
                        <x-tours.card
                            title="Lorem Ipsum Lorem Ipsu Lorem Ipsu"
                            desc="Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                Donec dolor urna, vestibulum eget vestibulum in, iaculis non felis. 
                                Donec nec neque vel diam hendrerit ultrices non quis ante."
                            img="http://placehold.it/500x500"
                            :tags="[1, 1, 1, 1, 1]"
                        />
                    </div>
                @endfor
            </div>
        </div>
    </section>

    <section class="container mt-200">
        <div class="d-flex flex-column justify-content-center text-white">
            <div class="row justify-content-center text-md-center">
                <div class="col-12">
                    <h2 class="header-tag-icon mb-7">
                        <span>Lorem Ipsum</span>
                        <img src="images/tours/tags/icon-1.svg">
                    </h2>
                </div>
                <p class="text-28 col-lg-7 mb-7">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Donec dolor urna, vestibulum eget vestibulum in, iaculis non felis. 
                    Donec nec neque vel diam hendrerit ultrices non quis ante.
                </p>
                <div>
                    <a class="btn btn_size_lg btn_theme_secondary">
                        Больше туров
                    </a>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3 justify-content-lg-center mt-8 mb-n6">
                @for ($i = 0; $i < 3; $i++)
                    <div class="col d-flex justify-content-center mb-6">
                        <x-tours.card
                            title="Lorem Ipsum Lorem Ipsu Lorem Ipsu"
                            desc="Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                Donec dolor urna, vestibulum eget vestibulum in, iaculis non felis. 
                                Donec nec neque vel diam hendrerit ultrices non quis ante."
                            img="http://placehold.it/500x500"
                            :tags="[1, 1, 1, 1, 1]"
                        />
                    </div>
                @endfor
            </div>
        </div>
    </section>

    <section class="container mt-200">
        <div class="d-flex flex-column justify-content-center text-white">
            <div class="row justify-content-center text-md-center">
                <div class="col-12">
                    <h2 class="header-tag-icon mb-7">
                        <span>Lorem Ipsum</span>
                        <img src="images/tours/tags/icon-1.svg">
                    </h2>
                </div>
                <p class="text-28 col-lg-7 mb-7">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Donec dolor urna, vestibulum eget vestibulum in, iaculis non felis. 
                    Donec nec neque vel diam hendrerit ultrices non quis ante.
                </p>
                <div>
                    <a class="btn btn_size_lg btn_theme_secondary">
                        Больше туров
                    </a>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3 justify-content-lg-center mt-8 mb-n6">
                @for ($i = 0; $i < 3; $i++)
                    <div class="col d-flex justify-content-center mb-6">
                        <x-tours.card
                            title="Lorem Ipsum Lorem Ipsu Lorem Ipsu"
                            desc="Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                Donec dolor urna, vestibulum eget vestibulum in, iaculis non felis. 
                                Donec nec neque vel diam hendrerit ultrices non quis ante."
                            img="http://placehold.it/500x500"
                            :tags="[1, 1, 1, 1, 1]"
                        />
                    </div>
                @endfor
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
@endsection