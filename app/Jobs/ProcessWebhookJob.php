<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable as BusQueueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Throwable;

class ProcessWebhookJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, BusQueueable, SerializesModels;

    protected $logger;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {

        $this->logger = new Logger("ProcessWebhookJob");
        $this->logger->pushHandler(new StreamHandler(storage_path('logs/queue.log')));
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        return true;
    }

    /**
     * Handle job failure.
     */
    public function failed(Throwable $e): void
    {
        $this->logger->error($e->getMessage(), [$e]);
    }
}
