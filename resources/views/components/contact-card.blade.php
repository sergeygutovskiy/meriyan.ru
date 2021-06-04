<article class="m-contact-card ph-4 ph-sm-6 pb-6 pt-8 pv-8">
    <div class="m-contact-card__image-wrapper u-skeleton-loader mr-4">
        <img class="m-contact-card__image" src="{{ $image }}">
    </div>

    <h3 class="mt-8 mt-sm-0 mb-4 mb-sm-6">{{ $name }}</h3>
    <p class="mb-5 mb-sm-6">{{ $paragraph }}</p>
    <a class="m-contact-card__link u-text_size_24 ph-3 pv-2 mb-3" href="">{{ $email }}</a>
    <a class="m-contact-card__link u-text_size_24 ph-3 pv-2" href="">{{ $phone }}</a>
</article>