<header class="min-h-screen">
    <div class="absolute w-full">
        <nav class="relative max-w-7xl mx-auto flex justify-between items-center py-2 px-3 xl:px-0">
            <div class="text-5xl kolker-brush-regular text-zinc-800 flex items-center gap-1
                dark:text-sky-800
                md:text-7xl">
                    <flux:icon.code-bracket class="size-8 text-zinc-600 dark:text-zinc-400" />
                    {{ config('app.name') }}
            </div>
            <div>
                <button class="bg-sky-900 text-white border-2 border-transparent rounded-full px-3 py-1 transition cursor-pointer flex items-center gap-1.5
                    hover:bg-white hover:text-zinc-800 hover:border-2 hover:border-zinc-200
                    dark:bg-sky-800
                    dark:hover:bg-sky-700 dark:hover:text-white dark:hover:border-sky-700
                    md:px-6">
                    <flux:icon.document-text class="size-4" />
                    <span class="md:hidden">CV</span>
                    <span class="hidden md:block">Curriculum vitae</span>
                </button>
            </div>
        </nav>
    </div>

    <div class="min-h-screen flex items-center">
        <div class="w-7xl mx-auto flex flex-col lg:flex-row items-center gap-8 lg:px-3 xl:px-0">
            <img src="{{ asset('img/roberth.jpg') }}" class="h-60 w-60 rounded-full object-cover" alt="Profile image">
            <div class="flex flex-col gap-2">
                <div class="text-5xl text-sky-900 font-bold text-center
                    dark:text-sky-700
                    lg:text-start">
                        Desarrollador Web
                        <span class="text-zinc-500 dark:text-zinc-400">Jr.</span>
                </div>
                <p class="text-xl text-zinc-600 text-center lg:text-start transition ease-in-out
                    dark:text-zinc-400">
                        Soy un desarrollador residente en Rioverde, SLP.
                </p>
                <div class="flex flex-row gap-4 text-zinc-600 mx-auto lg:mx-px">
                    <a href="https://github.com/RoberthDaraghouz"
                        target="_blank"
                        class="inline-flex gap-1 text-zinc-600 cursor-pointer transition
                        hover:text-sky-900
                        dark:text-zinc-400
                        dark:hover:text-white">
                        <flux:icon.github variant="mini" />
                        Github
                    </a>
                    <a href="https://www.linkedin.com/in/roberto-jimenez-dev"
                        target="_blank"
                        class="inline-flex gap-1 text-zinc-600 cursor-pointer transition
                        hover:text-sky-900
                        dark:text-zinc-400
                        dark:hover:text-white">
                        <flux:icon.linkedin variant="mini" />
                        LinkedIn
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
