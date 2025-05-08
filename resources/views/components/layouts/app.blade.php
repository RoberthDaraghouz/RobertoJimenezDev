<x-layouts.app.header :title="$title ?? null">
    <main class="max-w-7xl mx-auto py-6 px-3 xl:px-0 text-slate-800">
        {{ $slot }}
    </main>
</x-layouts.app.header>
