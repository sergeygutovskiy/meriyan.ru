<article class="m-tour-card">
    <div class="m-tour-card__image-wrapper">
        <img class="m-tour-card__image" src="{{ $tour->image_path }}">
    </div>
    <div class="m-tour-card__content ph-4 pv-6">
        <div class="m-tour-card__tags">
            @for ($i = 0; $i < 3 && $i < count($tour->tags); $i++)
                <a
                    class="m-tour-card__tag @if ($i > 0) ml-3 @endif"
                    href="{{ route('tag.show', [ 'tag' => $tour->tags[$i] ]) }}">
                    <img src="{{ $tour->tags[$i]->image_path }}" title="{{ $tour->tags[$i]->name }}">
                </a>
            @endfor
            @if (count($tour->tags) - 3 > 0)
                <div class="m-tour-card__more-tags-count ml-3">
                    +{{ count($tour->tags) - 3 }}
                </div>
            @endif
        </div>
        <div class="m-tour-card__text">
            <h3 class="m-tour-card__title mb-1">
                <a href="{{ route('tour.show', ['tour' => $tour]) }}">
                    {{ $tour->title }}
                </a>
            </h3>
            <p class="m-tour-card__paragraph">
                {{ $tour->description }}
            </p>
        </div>
        <div class="m-tour-card__links">
            <a class="u-btn u-btn_size_small u-btn_theme_transparent ph-0 mr-1" 
                href="{{ route('tour.show', ['tour' => $tour]) }}">Подробнее</a>

            <a class="u-btn u-btn_size_small u-btn_theme_white ph-0 ml-1" 
                href="">Хочу поехать</a>
        </div>
    </div>
</article>