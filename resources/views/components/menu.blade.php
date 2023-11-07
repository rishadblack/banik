@isset($attributes['sub'])
<div class="menu-item has-sub @if(in_array($attributes['sub'],explode('.', Route::currentRouteName()))) active @endif">
    <a href="#" class="menu-link">
        <span class="menu-icon">
            <i class="{{$attributes['icon']}}"></i>
        </span>
        <span class="menu-text">{{$attributes['label']}}</span>
        <span class="menu-caret"><b class="caret"></b></span>
    </a>
    <div class="menu-submenu">
        {{$slot}}
    </div>
</div>
@else
<div class="menu-item @if(Route::currentRouteName() == $attributes['route']) active @endif">
    <a href="{{ route($attributes['route']) }}" wire:navigate
        class="menu-link">
        <span class="menu-text">{{$attributes['label']}}</span>
    </a>
</div>
@endisset
