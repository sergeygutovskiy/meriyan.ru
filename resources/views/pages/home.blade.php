@extends('layouts.app')

@section('title', 'Home')

@section('head')
    <link rel="stylesheet" href="css/pages/home.css">
@endsection

@section('header')
    <div class="header d-flex flex-column justify-content-center text-center text-white">
        <div class="row justify-content-center">
            <h1 class="mb-7">Lorem Ipsum</h1>
            <p class="text-28 col-lg-7 mb-7">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                Donec dolor urna, vestibulum eget vestibulum in, iaculis non felis. 
                Donec nec neque vel diam hendrerit ultrices non quis ante.
            </p>
            <div>
                <button class="btn btn_size_lg">
                    Узнать больше
                </button>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <section class="text-white container">
        <div class="row mb-7">
            <div class="col">
                <h2>Lorem Ipsum</h2>
            </div>
        </div>
        <div class="row mb-7">
            <div class="col-lg-7">
                <p class="text-28">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Donec dolor urna, vestibulum eget vestibulum in, iaculis non felis. 
                    Donec nec neque vel diam hendrerit ultrices non quis ante.
                </p>
            </div>
        </div>
        <div class="row justify-content-end mb-7">
            <div class="col-lg-7">
                <p class="text-28">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Donec dolor urna, vestibulum eget vestibulum in, iaculis non felis. 
                    Donec nec neque vel diam hendrerit ultrices non quis ante.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button class="btn btn_size_lg">
                    Больше о нас
                </button>
            </div>
        </div>
    </section>

    <section class="mt-100">
        <div class="container">
            <nav class="row">
                <div class="col d-flex flex-column flex-lg-row justify-content-lg-between align-items-lg-center mb-8">
                    <div class="mb-4 mb-lg-0">
                        <h2 class="text-white">
                            Lorem Ipsum
                        </h2>
                    </div>
                    {{-- <div> --}}
                        <button class="btn btn_size_lg">
                            Больше туров
                        </button>
                    {{-- </div> --}}
                </div>
            </nav>
        </div>
        <div class="tours-wrapper container">
            <div id="tours">
                <div class="row row-cols-sm-1 row-cols-md-2 row-cols-xl-3 mb-sm-n6">
                    @for ($i = 0; $i < 6; $i++)
                        <div class="col-sm mb-sm-6">
                            <div class="ml-auto mr-auto d-md-flex justify-content-md-center">
                                <x-tours.card
                                    title="Lorem Ipsum Lorem Ipsu Lorem Ipsu"
                                    desc="Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                        Donec dolor urna, vestibulum eget vestibulum in, iaculis non felis. 
                                        Donec nec neque vel diam hendrerit ultrices non quis ante."
                                    img="http://placehold.it/500x500"
                                    :tags="[1, 1, 1, 1, 1]"
                                />
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </section>

    <section class="mt-100 container">
        <x-banner
            title="Lorem Ipsum Lorem Ipsu Lorem Ipsu"
            desc="Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                Donec dolor urna, vestibulum eget vestibulum in, iaculis non felis. 
                Donec nec neque vel diam hendrerit ultrices non quis ante."
            img="http://placehold.it/500x500"
            link-text="Подберите мне тур"
        />
    </section>

    <section class="mt-100 container">
        <div class="row">
            <div class="col text-center text-white">
                <h2>Lorem Ipsum</h2>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-lg-3 justify-content-sm-between mt-6">
            <div class="col d-flex justify-content-center d-lg-block">
                <article class="partner ph-4 pv-6 pb-8">
                    <div class="partner__image-wrapper">
                        <img class="partner__image" src="http://placehold.it/500x500">
                    </div>
                    <h3 class="mt-4">Lorem ipsum</h3>
                    <p class="mt-4">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Donec sodales lacinia velit, a malesuada enim placerat ac. 
                    </p>
                </article>
            </div>
            <div class="col d-flex justify-content-center d-lg-block mt-4 mt-lg-0">
                <article class="partner ph-4 pv-6 pb-8">
                    <div class="partner__image-wrapper">
                        <img class="partner__image" src="http://placehold.it/500x500">
                    </div>
                    <h3 class="mt-4">Lorem ipsum</h3>
                    <p class="mt-4">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Donec sodales lacinia velit, a malesuada enim placerat ac. 
                    </p>
                </article>
            </div>
            <div class="col col-md-12 col-lg mt-4 mt-lg-0 d-flex d-lg-block justify-content-center">
                <article class="partner ph-4 pv-6 pb-8">
                    <div class="partner__image-wrapper">
                        <img class="partner__image" src="http://placehold.it/500x500">
                    </div>
                    <h3 class="mt-4">Lorem ipsum</h3>
                    <p class="mt-4">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Donec sodales lacinia velit, a malesuada enim placerat ac. 
                    </p>
                </article>
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

@section('scripts')
    <script src="js/pages/home.js"></script>
@endsection