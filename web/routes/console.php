<?php

use App\Jobs\DeactivateExpiredAPageLinks;
use Illuminate\Support\Facades\Schedule;

Schedule::call(function () {
    (new DeactivateExpiredAPageLinks())->handle();
})
    ->name('a-page:deactivate-expired-links')
    ->everyMinute();
