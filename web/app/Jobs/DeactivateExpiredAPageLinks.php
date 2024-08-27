<?php

namespace App\Jobs;

use App\Models\Modules\Customer\Models\Link;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class DeactivateExpiredAPageLinks implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info(sprintf('Starting %s job.', __CLASS__));

        Link::where('expires_at', '<', now())
            ->where('active', true)
            ->update(['active' => false]);
    }
}
