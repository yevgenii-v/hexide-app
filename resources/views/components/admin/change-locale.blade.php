@if(request()->routeIs(['admin.*.index', 'admin.*.create', 'admin.*.store']))
    <a href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), [$locale]) }}"
       class="nav-link @if(app()->getLocale() == $locale) disabled active @endif"
    >
        <i class="fas fa-solid fa-circle nav-icon"></i>
        <p>{{ __("admin/sidebar.$locale") }}</p>
    </a>
@endif

@isset($user)
    <a href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), [$locale, $user]) }}"
       class="nav-link @if(app()->getLocale() == $locale) disabled active @endif"
    >
        <i class="fas fa-solid fa-circle nav-icon"></i>
        <p>{{ __("admin/sidebar.$locale") }}</p>
    </a>
@endisset

@isset($product)
    <a href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), [$locale, $product]) }}"
       class="nav-link @if(app()->getLocale() == $locale) disabled active @endif"
    >
        <i class="fas fa-solid fa-circle nav-icon"></i>
        <p>{{ __("admin/sidebar.$locale") }}</p>
    </a>
@endisset

@isset($order)
    <a href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), [$locale, $order]) }}"
       class="nav-link @if(app()->getLocale() == $locale) disabled active @endif"
    >
        <i class="fas fa-solid fa-circle nav-icon"></i>
        <p>{{ __("admin/sidebar.$locale") }}</p>
    </a>
@endisset
