
<form action="{{ route('set_language_locale', $lang) }}" method="POST" class="d-inline FlagBox">
    @csrf
    <button type="submit" class="btn">
        <img src="{{ asset('vendor/blade-flags/language-' . $lang . '.svg') }}" width="28" height="28"
            alt="">
    </button>
</form>
