<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class PurchaseStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:purchase-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Checking Purchase Status......');
        $purchases = \App\Models\Purchase::where('status', 'active')->get();
        foreach($purchases as $purchase){
            if(\Carbon\Carbon::now()->greaterThan($purchase->subscription_end)){
                $purchase->update(['status' => 'expired']);
            }
        }
        $this->info('Purchase Status Checked.....');
    }
    
}
