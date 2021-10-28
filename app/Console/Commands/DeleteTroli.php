<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Image;
use Auth;
use DB;

class DeleteTroli extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:troli';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete Troli Every One Month';

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
     * @return mixed
     */
    public function handle()
    {
        
        $hour_now = Carbon::now('Asia/Jakarta')->format('H');
        $time_now = Carbon::now('Asia/Jakarta')->format('H:i:s');
        $date_now = Carbon::now('Asia/Jakarta')->format('Y-m-d');
        $date_now_3 = date('Y-m-d', strtotime("-3 day", strtotime(date("Y-m-d"))));
        $date_now_1 = date('Y-m-d H:i:s', strtotime("-1 hour", strtotime(date("Y-m-d H:i:s"))));
        $date_now_7 = date('Y-m-d', strtotime("-7 day", strtotime(date("Y-m-d"))));
        $date_now_30 = date('Y-m-d', strtotime("-30 day", strtotime(date("Y-m-d"))));
        $date_now_30a = date('Y-m-d', strtotime("+30 day", strtotime(date("Y-m-d"))));
        $date_time_now = Carbon::now('Asia/Jakarta');

        $troli_data = DB::table('troli')
                        ->select(
                                    '*'
                                )
                        ->get();
        // foreach ($troli_data as $data) {
            $status = [
                            'status' => 1,
                            'jumlah' => 0,
                            'jumlah_harga' => 0
                        ];
            $update = DB::table('troli')
                        ->where('created_at', '<', $date_now_30)
                        ->update($status);
        // 
    }
}
