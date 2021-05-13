@extends('layouts.app')

@section('title', 'About us')

@section('head')
    <link rel="stylesheet" href="css/pages/about.css">
@endsection

@section('header')
    <div class="row mt-100">
        <div class="col-12 col-xl-5 text-center text-xl-start text-white">
            <h1>Lorem ipsum </h1>
        </div>
    </div>
    <div class="row mt-8">
        <div class="col-12 col-xl-7 offset-xl-5 text-center text-xl-start text-white mt-xl-8">
            <p class="text-28">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                Donec sodales lacinia velit, a malesuada enim placerat ac. 
                Praesent maximus nisi eget nulla pulvinar, auctor egestas nulla sollicitudin. 
                Sed nisl est, condimentum lobortis mauris aliquet, convallis pharetra risus. 
                In cursus venenatis lorem et ullamcorper. 
                Interdum et malesuada fames ac ante ipsum primis in faucibus.
            </p>
        </div>
    </div>
@endsection

@section('content')
    <section class="container mt-200">
        <div class="row">
            <div class="col d-flex justify-content-end text-white">
                <h2>Lorem Ipsum</h2>
            </div>
        </div>
        <div class="row mt-8">
            <div class="col-12 col-lg-6 mt-lg-8">
                <article class="point p-4 bg-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3>Lorem Ipsum</h3>
                        <img src="images/tours/tags/icon-1.svg">
                    </div>
                    <p class="mt-6">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Donec dolor urna, vestibulum eget vestibulum in, iaculis non felis. 
                        Donec nec neque vel diam hendrerit ultrices non quis ante.
                    </p>
                </article>
                <article class="point p-4 bg-white mt-8">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3>Lorem Ipsum</h3>
                        <img src="images/tours/tags/icon-1.svg">
                    </div>
                    <p class="mt-6">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Donec dolor urna, vestibulum eget vestibulum in, iaculis non felis. 
                        Donec nec neque vel diam hendrerit ultrices non quis ante.
                    </p>
                </article>
            </div>
            <div class="col-12 col-lg-6 d-flex align-items-center mt-8">
                <article class="point p-4 bg-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3>Lorem Ipsum</h3>
                        <img src="images/tours/tags/icon-1.svg">
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
                        <h2 class="text-white">
                            Популярные туры
                        </h2>
                    </div>
                    <button class="btn btn_size_lg">
                        Больше туров
                    </button>
                </div>
            </nav>
        </div>
        <div class="tours-wrapper container">
            <div id="tours">
                <div class="row row-cols-sm-1 row-cols-md-2 row-cols-xl-3 mb-sm-n6">
                    @for ($i = 0; $i < 3; $i++)
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
        <x-form.form-section
            title="Lorem Ipsum"
            paragraph="Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
            Donec dolor urna, vestibulum eget vestibulum in, iaculis non felis. 
            Donec nec neque vel diam hendrerit ultrices non quis ante."
        />
    </section>
@endsection

@section('scripts')
    <script src="js/pages/about.js"></script>
@endsection