@extends('layouts.app')

@section('title', 'Search')

@section('head')
    {{-- <link rel="stylesheet" href="css/pages/contacts.css"> --}}
@endsection

@section('content')

<div class="container u-page-margin">
    <div class="row">
        <div class="col-3">

        </div>
        <div class="col-3">

        </div>
        <div class="col-3">

        </div>
    </div>
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
@endsection