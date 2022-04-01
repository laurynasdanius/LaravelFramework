<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        {{ __('Change language') }}
    </button>
    <ul class="dropdown-menu" aria-labelledby="languageDropdown">
    @foreach($available_locales as $locale_name => $available_locale)
        @if($available_locale === $current_locale)
            <li>
                <span class="dropdown-item active">{{ $locale_name }}</span>
            </li>
        @else
            <li>
                <a class="dropdown-item" href="language/{{ $available_locale }}">
                    <span>{{ $locale_name }}</span>
                </a>
            </li>
        @endif
    @endforeach
    </ul>
    
</div>