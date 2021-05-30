@extends('layouts.app')

@section('title', 'Contacts')

@section('head')
    <link rel="stylesheet" href="css/pages/contacts.css">
@endsection

@section('content')
    <header class="u-page-header mt-100">
        <div class="container d-flex flex-column justify-content-center text-center u-text_color_white">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-7">
                    <h1>Lorem Ipsum</h1>
                </div>
            </div>
        </div>
    </header>

    <section class="mt-100 container">
        <div class="row row-cols-2 justify-content-center">
            <div class="col-12 col-lg-11">
                <div class="row justify-content-between pv-2">
                    <div class="mb-8 d-flex justify-content-center col-12 justify-content-lg-start col-lg-6">
                        <x-contact-card 
                            name="Lorem Ipsum"
                            image="https://images7.alphacoders.com/686/thumb-1920-686386.jpg"
                            paragraph="Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Donec dolor urna, vestibulum eget vestibulum in, iaculis non felis. 
                            Donec nec neque vel diam hendrerit ultrices non quis ante."
                            email="mar.78ma@rambler.ru"
                            phone="+7 (962) 685-09-78"
                        />
                    </div>
                    <div class="mb-8 d-flex justify-content-center col-12 justify-content-lg-end col-lg-6">
                        <x-contact-card 
                            name="Lorem Ipsum"
                            image="https://images7.alphacoders.com/686/thumb-1920-686386.jpg"
                            paragraph="Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Donec dolor urna, vestibulum eget vestibulum in, iaculis non felis. 
                            Donec nec neque vel diam hendrerit ultrices non quis ante."
                            email="mar.78ma@rambler.ru"
                            phone="+7 (962) 685-09-78"
                        />
                    </div>
                    <div class="mt-8 mb-8 d-flex justify-content-center col-12 justify-content-lg-start col-lg-6">
                        <x-contact-card 
                            name="Lorem Ipsum"
                            image="https://images7.alphacoders.com/686/thumb-1920-686386.jpg"
                            paragraph="Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Donec dolor urna, vestibulum eget vestibulum in, iaculis non felis. 
                            Donec nec neque vel diam hendrerit ultrices non quis ante."
                            email="mar.78ma@rambler.ru"
                            phone="+7 (962) 685-09-78"
                        />
                    </div>
                    <div class="mt-8 mb-8 d-flex justify-content-center col-12 justify-content-lg-end col-lg-6">
                        <x-contact-card 
                            name="Lorem Ipsum"
                            image="https://images7.alphacoders.com/686/thumb-1920-686386.jpg"
                            paragraph="Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Donec dolor urna, vestibulum eget vestibulum in, iaculis non felis. 
                            Donec nec neque vel diam hendrerit ultrices non quis ante."
                            email="mar.78ma@rambler.ru"
                            phone="+7 (962) 685-09-78"
                        />
                    </div>
                    <div class="mt-8 mb-8 d-flex justify-content-center col-12 justify-content-lg-start col-lg-6">
                        <x-contact-card 
                            name="Lorem Ipsum"
                            image="https://images7.alphacoders.com/686/thumb-1920-686386.jpg"
                            paragraph="Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Donec dolor urna, vestibulum eget vestibulum in, iaculis non felis. 
                            Donec nec neque vel diam hendrerit ultrices non quis ante."
                            email="mar.78ma@rambler.ru"
                            phone="+7 (962) 685-09-78"
                        />
                    </div>
                    <div class="mt-8 mb-8 d-flex justify-content-center col-12 justify-content-lg-end col-lg-6">
                        <x-contact-card 
                            name="Lorem Ipsum"
                            image="https://images7.alphacoders.com/686/thumb-1920-686386.jpg"
                            paragraph="Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Donec dolor urna, vestibulum eget vestibulum in, iaculis non felis. 
                            Donec nec neque vel diam hendrerit ultrices non quis ante."
                            email="mar.78ma@rambler.ru"
                            phone="+7 (962) 685-09-78"
                        />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-200 container">
        <div class="form-container row d-flex flex-column flex-lg-row">
            <div class="col col-lg-6 pr-4 d-flex flex-column justify-content-center u-text_color_white">
                <div class="form-container__point">
                    <div class="form-container__image">
                        <img src="/images/static/icons/map.svg">
                    </div>
                    <p class="u-text_size_28">
                        196620, г. Санкт-Петербург,
                        г. Павловск, ул. Васенко, д. 9
                    </p>
                </div>
                <div class="form-container__point">
                    <div class="form-container__image">
                        <img src="/images/static/icons/clock.svg">
                    </div>
                    <p class="u-text_size_28">
                        196620, г. Санкт-Петербург,
                        г. Павловск, ул. Васенко, д. 9
                    </p>
                </div>
            </div>
            <x-form.form/>
        </div>
    </section>
@endsection

@section('scripts')
@endsection