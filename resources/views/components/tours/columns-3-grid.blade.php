<div class="row row-cols-sm-1 row-cols-md-2 row-cols-xl-3 mb-n6 d-flex {{ $centered ? 'justify-content-center' : '' }}">
    @foreach ($tours as $tour)
        <x-tours.card-wrapper>
            <x-tours.card :tour="$tour" />
        </x-tours.card-wrapper>
    @endforeach
</div>