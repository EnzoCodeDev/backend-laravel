<?php

use App\Console\Commands\Preliquidations;
use App\Jobs\PreliquidationsMonthly;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

// Agregar a la cola de los jobs de Laravel la generación de preliquidaciones mensualmente
Schedule::job(new PreliquidationsMonthly(now()->year, now()->month))
    ->monthlyOn(now()->endOfMonth()->day, '23:59');
