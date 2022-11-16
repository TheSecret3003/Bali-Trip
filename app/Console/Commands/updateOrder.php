<?php

namespace App\Console\Commands;
use Illuminate\Support\Facades\DB;
use App\Models\Order;

use Illuminate\Console\Command;

class updateOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:order';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $orders = DB::table('orders')->where('status','pending')->get();
        foreach($orders as $order){
            $date_transaction = $order->date;
            $deadline_date = date('Y-m-d H:i:s',strtotime('+2 hours',strtotime($date_transaction)));
            if(date('Y-m-d H:i:s') > $deadline_date) {
                Order::where('id',$order->id)->update([
                    'status' => 'timeout',
                ]);
            }
        }
    }
}
