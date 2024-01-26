<?php

namespace App\Console\Commands;

use App\Models\Discount;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CheckDiscountStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'discount:status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checking Discount status';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = Carbon::now();
        Discount::where("is_visible", true)->chunk(200 , function ($dicounts) use ($now){
            foreach ($dicounts as $dicount){
                $startAt = $dicount->start_at;
                $expiresAt = $dicount->expires_at;
                if ($now >= $startAt && $now <= $expiresAt){
                    $dicount->status = true;
                }else{
                    $dicount->status = false;
                }
                $dicount->save();
            }
        });
    }
}
