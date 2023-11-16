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
            @role('Admin')
                <li @if ($pageSlug == 'users') class="active " @endif>
                    <a href="{{ route('user.index')  }}">
                        <i class="tim-icons icon-single-02"></i>
                        <p>{{ __('Usuarios') }}</p>
                    </a>
                </li>
            @endrole
            @hasanyrole('Admin|Import')
                <li @if ($pageSlug == 'import') class="active " @endif>
                    <a href="{{ route('imports.index') }}">
                        <i class="tim-icons icon-single-copy-04"></i>
                        <p>{{ __('Import') }}</p>
                    </a>
                </li>
            @endhasanyrole
            @hasanyrole('Admin|Aduana')
                <li @if ($pageSlug == 'aduana') class="active " @endif>
                    <a href="{{ route('aduanas.index') }}">
                        <i class="tim-icons icon-bullet-list-67"></i>
                        <p>{{ __('Aduana') }}</p>
                    </a>
                </li>
            @endhasanyrole
            @hasanyrole('Admin|Bodega')
                <li @if ($pageSlug == 'bodega') class="active " @endif>
                    <a href="{{ route('bodega.index') }}">
                        <i class="tim-icons icon-delivery-fast"></i>
                        <p>{{ __('Bodega') }}</p>
                    </a>
                </li>
            @endhasanyrole
            @hasanyrole('Admin|Vigilancia')
                <li @if ($pageSlug == 'vigilancia') class="active " @endif>
                    <a href="{{ route('vigilancia.index') }}">
                        <i class="tim-icons icon-bank"></i>
                        <p>{{ __('Vigilancia') }}</p>
                    </a>
                </li>
            @endhasanyrole
            @hasanyrole('Admin|Import')
                <li>
                <a data-toggle="collapse" href="#database-list" aria-expanded="true">
                    <i class="fab tim-icons icon-align-left-2" ></i>
                    <span class="nav-link-text" >{{ __('Database') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="database-list">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'transporte') class="active " @endif>
                            <a href="{{ route('transports.index') }}">
                                <i class="tim-icons icon-bus-front-12"></i>
                                <p>{{ __('Transportes') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'origen') class="active " @endif>
                            <a href="{{ route('origins.index') }}">
                                <i class="tim-icons icon-notes"></i>
                                <p>{{ __('Origenes') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
                </li>
            @endhasanyrole
        </ul>
    </div>
</div>
