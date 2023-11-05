@push('css')
    <style>

    </style>
@endpush
<div {{ $attributes->merge(['class' => 'container-fluid']) }}>
    @isset($title)
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">
                        {{ $title }}
                    </h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('default.dashboard') }}</a></li>
                            <li class="breadcrumb-item active">
                                {{ $title }}
                            </li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
    @endisset
    {{ $slot }}
</div>
