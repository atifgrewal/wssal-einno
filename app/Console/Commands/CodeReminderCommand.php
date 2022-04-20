<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Console\Command;
use App\Jobs\Sendcode;

class CodeReminderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Code:send-code';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send out code for OTP';

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
    // public function handle()
    // {
    //     // dd("sana");
    //     return 0;

    // }
    public function handle( )
{
//   dd("sana");
    $today = Carbon::now()->format('Y-m-d');
    $users = User::where('phone_no', '=', +9203164377598)->get();
    //   dd($users);
    if (!empty($users)) {
        // dd($users);
        foreach ($users as $user) {
            // dd("sana");
            Sendcode::dispatch($user);

        }
    }
}

}
