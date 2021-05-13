@extends('layouts.app')

@section('title', 'Tag')

@section('head')
    {{-- <link rel="stylesheet" href="css/pages/home.css"> --}}
@endsection

@section('header')
    <div class="d-flex flex-column justify-content-center text-center text-white mt-100">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-7">
                <h1 class="header-tag-icon mb-7">
                    <span>Lorem Ipsum</span>
                    <img src="images/tours/tags/icon-1.svg">
                </h1>
                <p class="text-28">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Donec dolor urna, vestibulum eget vestibulum in, iaculis non felis. 
                    Donec nec neque vel diam hendrerit ultrices non quis ante.
                </p>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container mt-100">
        <div class="row row-cols-sm-1 row-cols-md-2 row-cols-xl-3 mb-n6">
            @for ($i = 0; $i < 6; $i++)
                <div class="col-sm mb-6">
                    <div class="ml-auto mr-auto d-flex justify-content-center">
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
    {{-- <script src="js/pages/home.js"></script> --}}
@endsection