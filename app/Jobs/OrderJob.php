<?php

namespace App\Jobs;

use App\Services\Order\OrderService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class OrderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;
    public $userId;
    public $time;
    /**
     * Create a new job instance.
     */
    public function __construct(array $data, int $userId , $time)
    {
        $this->data = $data;
        $this->userId = $userId;
        $this->time = $time;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info("Order queue is running.");
        OrderService::calculateTotalPrice($this->data , $this->userId , $this->time);
    }
}
