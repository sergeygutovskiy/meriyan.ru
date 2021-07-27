@extends('layouts.app')

@section('title', 'Контакты - МериЯн')

@section('head')
    <link rel="stylesheet" href="css/pages/contacts.css">
@endsection

@section('content')
    <div class="u-page-background u-page-background-top">
        <picture class="u-page-background__image">
            <source
                srcset="/images/static/backgrounds/contacts.webp"
                type="image/webp"
            />
            <img class="u-page-background__image-fallback" src="/images/static/backgrounds/contacts.jpg" alt="">
        </picture>

        <header class="u-page-header">
            <div class="container u-page-margin d-flex flex-column justify-content-center text-center u-text_color_white">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-7">
                        <h1>
                            Наши сотрудники
                        </h1>
                    </div>
                </div>
            </div>
        </header>

        <section class="container u-page-margin">
            <div class="row row-cols-2 justify-content-center">
                <div class="col-12 col-lg-11">
                    <div class="row justify-content-between pv-2">
                        <div class="mb-8 d-flex justify-content-center col-12 justify-content-lg-start col-xl-6">
                            <x-contact-card 
                                name="Николаевна <br> Яна"
                                image="/images/static/contacts/yana.jpg"
                                paragraph="Коммерческий директор, ГИД по странам Скандинавии, бизнес-тренер, 
                                руководитель брокерского агентства 'Бюро Жилья', 
                                вице-президент Общественной организации людей 
                                с ограниченными возможностями слуха 'Мир Глухих'"
                                email="shatalinarf@yandex.ru"
                                phone="+7 (911) 194-12-61"
                                phone-href="+79111941261"
                            />
                        </div>
                        <div class="mb-8 d-flex justify-content-center col-12 justify-content-lg-end col-xl-6">
                            <x-contact-card 
                                name="Королева <br> Марианна"
                                image="/images/static/contacts/mariana.jpg"
                                paragraph="Генеральный директор ООО 'Мэриян', 
                                зам. директора брокерского агентства 'Бюро Жилья', 
                                вице-президент Общественной организации людей 
                                с ограниченными возможностями слуха 'Мир Глухих', сурдопереводчик"
                                email="mar.78ma@rambler.ru"
                                phone="+7 (962) 685-09-78"
                                phone-href="+79626850978"
                            />
                        </div>
                        <div class="mt-8 mb-8 d-flex justify-content-center col-12 justify-content-lg-start col-xl-6">
                            <x-contact-card 
                                name="Космосс Руслан"
                                image="/images/static/contacts/ruslan.jpg"
                                paragraph="Менеджер по сотрудничеству с партнёрами"
                                email="good.lucktome@yandex.ru"
                                phone="+7 (911) 154-56-87"
                                phone-href="+79111545687"
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
                <div 
                    class="col-12 col-lg pr-4 d-flex flex-column text-center text-lg-start 
                    flex-lg-column justify-content-evenly">
                    <div 
                        class="d-flex flex-column align-items-center
                        flex-lg-row align-items-lg-start
                        mb-6 mb-lg-0"
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
                            Ежедневно, круглосуточно на связи для вас
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