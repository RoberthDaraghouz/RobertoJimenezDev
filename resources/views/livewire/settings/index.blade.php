<x-layouts.app>
    <div x-data="{
            show: 'profile',
            active: 'border border-sky-900 !text-sky-900 hover:!bg-sky-50/50 dark:border-sky-400 dark:!text-sky-400 dark:hover:!bg-transparent'
        }">
        <div class="flex flex-wrap gap-2">
            <x-tab.button
                @click="show = 'profile'"
                x-bind:class="show == 'profile' ? active : ''">
                {{ __('Profile') }}
            </x-tab.button>
            <x-tab.button
                @click="show = 'password'"
                x-bind:class="show == 'password' ? active : ''">
                {{ __('Change password') }}
            </x-tab.button>
            <x-tab.button @click="show = 'appearance'"
            x-bind:class="show == 'appearance' ? active : ''">
                {{ __('Appearance') }}
            </x-tab.button>
        </div>

        <div class="mt-8 max-w-lg">
            <div x-show="show == 'profile'" x-cloak>
                <livewire:settings.profile />
            </div>

            <div x-show="show == 'password'" x-cloak>
                <livewire:settings.password />
            </div>

            <div x-show="show == 'appearance'" x-cloak>
                @include('livewire.settings.appearance')
            </div>
        </div>
    </div>
</x-layouts.app>