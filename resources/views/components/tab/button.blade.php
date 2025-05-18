<button {{ $attributes->merge([
    'class' => 'text-zinc-500 text-sm font-semibold py-1 px-2 rounded cursor-pointer transition
        hover:bg-zinc-100
        dark:hover:bg-white/10 dark:text-white/80'
]) }}>
    {{ $slot }}
</button>