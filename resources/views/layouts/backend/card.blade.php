@props(['card_title', 'title', 'search', 'button', 'footer'])
@push('css')
    <style>
        .card-header {
            height: 48px;
        }

        .card-header h5 {
            font-size: 17px !important;
        }
    </style>
@endpush
<div {{ $attributes->merge(['class' => 'card mb-3']) }}>
    @isset($title)
        <div {{ $title->attributes->merge(['class' => 'card-header']) }}>
            <h5 class="float-start">{{ $title }}</h5>
            @isset($search)
                <span {{ $search->attributes->merge(['class' => 'float-center']) }}>{{ $search }}</span>
            @endisset
            @isset($button)
                <span {{ $button->attributes->merge(['class' => 'float-end']) }}>{{ $button }}</span>
            @endisset
        </div>
    @endisset
    <div class="card-body">
        @isset($card_title)
            <h5 {{ $card_title->attributes->merge(['class' => 'card-title']) }}>
                {{ $card_title }}
            </h5>
        @endisset
        {{ $slot }}
    </div>
    @isset($footer)
        <div {{ $footer->attributes->merge(['class' => 'card-footer']) }}>
            {{ $footer }}
        </div>
    @endisset
</div>
