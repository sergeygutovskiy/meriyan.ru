@extends('layouts.app')

@section('title', 'Tag')

@section('head')
    {{-- <link rel="stylesheet" href="css/pages/home.css"> --}}
@endsection

@section('content')
    <div class="u-page-background">
        <img class="u-page-background__image" 
            src="https://images7.alphacoders.com/686/thumb-1920-686386.jpg">

        <header class="container pt-200">
            <div class="d-flex flex-column justify-content-center text-center u-text_color_white">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-7">
                        <h1 class="u-header-with-tags mb-7">
                            <span>
                                {{ $tag->name }}
                            </span>
                            <div class="u-header-with-tags__icons">
                                <img src="/images/{{ $tag->image_path }}">
                            </div>
                        </h1>
                        <p class="u-text_size_28">
                            {{ $tag->description }}
                        </p>
                    </div>
                </div>
            </div>
        </header>

        <div class="container mt-100">
            <x-tours.columns-3-grid :tours="$tag->tours" />
        </div>
    </div>

    <section class="mt-100 container">
        <x-form.form-section
            title="Lorem Ipsum"
            paragraph="Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
            Donec dolor urna, vestibulum eget vestibulum in, iaculis non felis. 
            Donec nec neque vel diam hendrerit ultrices non quis ante."
            is-green="true"
        />
    </section>

    <div class="pb-100"></div>
@endsection

@section('scripts')
    {{-- <script src="js/pages/home.js"></script> --}}
@endsection