<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::view('/', 'livewire.home.index')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');

    Volt::route('experience', 'experience.index')->name('experience.index');
    Volt::route('experience/new', 'experience.new')->name('experience.new');
    Volt::route('experience/{experience}/edit', 'experience.edit')->name('experience.edit');

    Volt::route('projects', 'projects.index')->name('projects.index');
    Volt::route('projects/new', 'projects.new')->name('projects.new');
    Volt::route('projects/{project}/edit', 'projects.edit')->name('projects.edit');

    Volt::route('tags', 'tags.index')->name('tags.index');

    Route::view('settings', 'livewire.settings.index')->name('settings');
});

require __DIR__.'/auth.php';
