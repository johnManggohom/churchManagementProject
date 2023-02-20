<?php

namespace App\Console\Commands;

use App\Mail\notificationMail;
use App\Mail\statusMail;
use App\Models\Appointment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:sendmail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send mail to appointment';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

            $users = Appointment::whereBetween('start_time', [
                Carbon::now()->startOfDay(),
                now()->addDays(3)
            ])->where('status', '=', 'accepted')->get();
            
        if ($users->count() > 0) {
            foreach ($users as $user) {
    Mail::to($user->user->email)->send(new notificationMail($user));
            }
        }
        return Command::SUCCESS;
    }
}
