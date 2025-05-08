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
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
