@extends('layouts.app')

@section('title', 'Tag')

@section('head')
    {{-- <link rel="stylesheet" href="css/pages/home.css"> --}}
@endsection

@section('content')
    <div class="u-page-background u-page-background-top">
        <img 
            class="u-page-background__image"
            src="https://img.etimg.com/thumb/msid-68721417,width-650,imgsize-1016106,,resizemode-4/nature1_gettyimages.jpg"
            >

        <header class="u-page-header u-page-header_size_100vh">
            <div class="container mt-auto mb-auto">
                <div class="row justify-content-center text-center u-text_color_white">
                    <div class="col-12 col-lg-7">
                        <h1 class="u-header-with-tags mb-7">
                            <span>
                                {{ $tag->name }}
                            </span>
                            {{-- // TODO доделать вывод тэгов --}}
                            {{-- <div class="u-header-with-tags__icons">
                                <img src="/images/{{ $tag->image_path }}">
                            </div> --}}
                        </h1>
                        <p class="u-text_size_28">
                            {{ $tag->description }}
                        </p>
                    </div>
                </div>
            </div>
        </header>

        <section class="container u-page-margin">
            <x-tours.columns-3-grid :tours="$tag->tours" />
        </section>

    </div>

    <section class="container u-page-margin">
        <x-form.form-section
            title="Lorem Ipsum"
            paragraph="Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
            Donec dolor urna, vestibulum eget vestibulum in, iaculis non felis. 
            Donec nec neque vel diam hendrerit ultrices non quis ante."
            is-green="true"
        />
    </section>
    
    <div class="u-page-padding"></div>
@endsection

@section('scripts')
    {{-- <script src="js/pages/home.js"></script> --}}
@endsection