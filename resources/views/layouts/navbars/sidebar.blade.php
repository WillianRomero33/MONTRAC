<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ __('MONTRAC') }}</a>
            <a href="#" class="simple-text logo-normal">{{ __('Sistema Aduana') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'import') class="active " @endif>
                <a href="{{ route('imports.index') }}">
                    <i class="tim-icons icon-single-copy-04"></i>
                    <p>{{ __('Import') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'aduana') class="active " @endif>
                <a href="{{ route('aduanas.index') }}">
                    <i class="tim-icons icon-bullet-list-67"></i>
                    <p>{{ __('Aduana') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'bodega') class="active " @endif>
                <a href="{{ route('bodega.index') }}">
                    <i class="tim-icons icon-delivery-fast"></i>
                    <p>{{ __('Bodega') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'vigilancia') class="active " @endif>
                <a href="{{ route('vigilancia.index') }}">
                    <i class="tim-icons icon-bank"></i>
                    <p>{{ __('Vigilancia') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'transporte') class="active " @endif>
                <a href="{{ route('imports.index') }}">
                    <i class="tim-icons icon-bus-front-12"></i>
                    <p>{{ __('Transportes') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
