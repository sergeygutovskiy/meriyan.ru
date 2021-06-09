<div class="row">
    <div 
        class="col-12 col-lg pr-4 
            d-flex flex-column justify-content-center
            {{ $is_green ? 'u-text_color_green-light' : 'u-text_color_white' }}">
        <h2>
            {{ $title }}
        </h2>
        <p class="u-text_size_28">
            {{ $paragraph }}
        </p>
    </div>
    <div class="col-12 col-lg d-flex justify-content-lg-end mt-6 mt-lg-0">
        <x-form.form textarea-placeholder="Ваш вопрос" />
    </div>
</div>