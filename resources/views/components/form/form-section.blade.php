<div class="row d-flex flex-column flex-lg-row">
    <div 
        class="col col-lg-6 pr-4 
            d-flex flex-column justify-content-center
            {{ $is_green ? 'u-text_color_green' : 'u-text_color_white' }}">
        <h2>
            {{ $title }}
        </h2>
        <p class="u-text_size_28">
            {{ $paragraph }}
        </p>
    </div>
    <x-form.form/>
</div>