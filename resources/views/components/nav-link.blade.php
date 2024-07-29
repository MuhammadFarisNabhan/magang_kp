<a {{ $attributes }} 
    class="{{ $active ? '.text-light --bs-success-rgb' : '.deactive'}}" 
    aria-current="{{ $active ? 'page' : false }}">
    {{ $slot }}
</a>