<div 
    class="row row-cols-sm-1 row-cols-md-2 row-cols-xl-3 
    {{ $centered ? 'mb-n6' : '' }}
    d-flex 
    {{ $centered ? 'justify-content-center' : '' }}"
    >
    <?php  $count = 0; ?>
    
    @foreach ($tours as $tour)
        <?php if ($count != null && $count == $max) break; ?>
    
        <x-tours.card-wrapper>
            <x-tours.card :tour="$tour" :is-with-price="$is_with_price"/>
        </x-tours.card-wrapper>

        <?php $count++; ?>
    @endforeach
</div>