<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('components.layouts.partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        {{-- Desktop Menu --}}
        <flux:header container class="border-b border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900 flex items-center">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <a href="{{ route('home') }}" class="font-semibold text-slate-800 flex items-center gap-2 mr-4 dark:text-white" wire:navigate>
                <flux:icon.code-bracket class="size-5 text-slate-600 dark:text-sky-700" />
                {{ config('app.name') }}
            </a>

            <flux:navbar class="-mb-px max-lg:hidden">
                <flux:navbar.item icon="layout-grid" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>
                    {{ __('Dashboard') }}
                </flux:navbar.item>

                <flux:navbar.item icon="building-office-2" :href="route('experience.index')" :current="request()->routeIs('experience.*')" wire:navigate>
                    {{ __('Experience') }}
                </flux:navbar.item>

                <flux:navbar.item icon="briefcase" :href="route('projects.index')" :current="request()->routeIs('projects.*')" wire:navigate>
                    {{ __('Projects') }}
                </flux:navbar.item>

                <flux:navbar.item icon="tag" :href="route('tags.index')" :current="request()->routeIs('tags.*')" wire:navigate>
                    {{ __('Tags') }}
                </flux:navbar.item>
            </flux:navbar>

            <flux:spacer />

            <flux:navbar class="me-1.5 space-x-0.5 rtl:space-x-reverse py-0!">
                <flux:tooltip :content="__('Documentation')" position="bottom">
                    <flux:navbar.item
                        class="h-10 max-lg:hidden [&>div>svg]:size-5"
                        icon="book-open-text"
                        href="https://laravel.com/docs/starter-kits#livewire"
                        target="_blank"
                        label="Documentation"
                    />
                </flux:tooltip>
            </flux:navbar>

            <flux:dropdown position="top" align="end">
                <flux:profile
                    class="cursor-pointer"
                    :initials="auth()->user()->initials()"
                />

                <flux:menu>
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:header>

        <!-- Mobile Menu -->
        <flux:sidebar stashable sticky class="lg:hidden border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <a href="{{ route('dashboard') }}" class="font-semibold ms-1 flex items-center gap-2 rtl:space-x-reverse" wire:navigate>
                <flux:icon.code-bracket class="size-5 text-slate-600 dark:text-sky-700" />
                {{ config('app.name') }}
            </a>


            <flux:navlist variant="outline">
                <flux:navlist.group :heading="__('Menu')">
                    <flux:navlist.item icon="layout-grid" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>
                    {{ __('Dashboard') }}
                    </flux:navlist.item>

                    <flux:navlist.item icon="building-office-2" :href="route('experience.index')" :current="request()->routeIs('experience.*')" wire:navigate>
                    {{ __('Experience') }}
                    </flux:navlist.item>

                    <flux:navlist.item icon="briefcase" :href="route('projects.index')" :current="request()->routeIs('projects.*')" wire:navigate>
                    {{ __('Projects') }}
                    </flux:navlist.item>

                    <flux:navlist.item icon="tag" :href="route('tags.index')" :current="request()->routeIs('tags.*')" wire:navigate>
                    {{ __('Tags') }}
                    </flux:navlist.item>
                </flux:navlist.group>
            </flux:navlist>

            <flux:spacer />

            <flux:navlist variant="outline">
                <flux:navlist.item icon="book-open-text" href="https://laravel.com/docs/starter-kits#livewire" target="_blank">
                {{ __('Documentation') }}
                </flux:navlist.item>
            </flux:navlist>
        </flux:sidebar>

        <main class="max-w-7xl mx-auto py-6 px-3 xl:px-0 text-slate-800">
            {{ $slot }}
        </main>
    
        @fluxScripts
    </body>
</html>
