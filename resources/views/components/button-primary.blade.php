<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary']) }}>
    <span class="indicator-label">{{ $slot }}</span>
</button>
