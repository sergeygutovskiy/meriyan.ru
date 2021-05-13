<article class="tour-card">
    <div class="tour-card__image-wrapper">
        <img class="tour-card__image" src="{{ $img }}">
    </div>
    <div class="tour-card__content pv-4 ph-3 pv-xl-6 ph-xl-4">
        <div class="tour-card__tags">
            @for ($i = 0; $i < 3; $i++)
                <img class="tour-card__tag @if ($i > 0) ml-1 @endif" src="images/tours/tags/icon-{{ $tags[$i] }}.svg">
            @endfor
            @if (count($tags) - 3 > 0)
                <div class="tour-card__more-tags-count ml-1">
                    +{{ count($tags) - 3 }}
                </div>
            @endif
        </div>
        <div class="tour-card__text">
            <h3 class="tour-card__title">{{ $title }}</h3>
            <p class="tour-card__paragraph">
                {{ $desc }}
            </p>
        </div>
        <div class="tour-card__links mt-8">
            <a class="btn btn_size_sm ph-0 mr-1" href="">Подробнее</a>
            <a class="btn btn_size_sm btn_theme_secondary ph-0 ml-1" href="">Хочу поехать</a>
        </div>
    </div>
</article>