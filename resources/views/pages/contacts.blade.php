@extends('layouts.app')

@section('title', 'Contacts')

@section('head')
    <link rel="stylesheet" href="css/pages/contacts.css">
@endsection

@section('content')
    <div class="u-page-background u-page-background-top">
        <img 
            class="u-page-background__image"
            src="https://img.etimg.com/thumb/msid-68721417,width-650,imgsize-1016106,,resizemode-4/nature1_gettyimages.jpg"
            >

        <header class="u-page-header">
            <div class="container u-page-margin d-flex flex-column justify-content-center text-center u-text_color_white">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-7">
                        <h1>Lorem Ipsum</h1>
                    </div>
                </div>
            </div>
        </header>

        <section class="container u-page-margin">
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

    </div>  

    {{-- // TODO адаптировать --}}
    <section class="container u-page-margin">
            <div class="row">
                <div class="col-12 col-lg pr-4 d-flex flex-lg-column justify-content-evenly">
                    <div 
                        class="d-flex flex-column align-items-center
                        flex-lg-row align-items-lg-start"
                        >
                        <img 
                            class="form-icon mb-4 pb-lg-0" 
                            src="/images/static/geopoint.svg" 
                            width="90" 
                            height="77"
                            >
                        <p class="form-paragraph u-text_size_28 ml-lg-4">
                            196620, г. Санкт-Петербург,
                            г. Павловск, ул. Васенко, д. 9
                        </p>
                    </div>
                    <div 
                        class="d-flex ml-xxl-6 pl-xxl-6
                        d-flex flex-column align-items-center flex-lg-row align-items-lg-start"
                        >
                        <img 
                            class="form-icon mb-4 pb-lg-0" 
                            src="/images/static/clock.svg" 
                            width="80" 
                            height="80"
                            >
                        <p class="form-paragraph u-text_size_28 ml-lg-4">
                            196620, г. Санкт-Петербург,
                            г. Павловск, ул. Васенко, д. 9
                        </p>
                    </div>
                </div>
                <div class="col-12 col-lg d-flex justify-content-center justify-content-lg-end mt-6 mt-lg-0">
                    <x-form.form/>
                </div>
            </div>
        </div>
    </section>

    <div class="u-page-padding"></div>
@endsection

@section('scripts')
@endsection