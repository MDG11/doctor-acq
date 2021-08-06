<?php

namespace App\Console\Commands;

use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class NotifyForAppointment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'appointment:notify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify users';

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
        $appointments = Appointment::where('start_time', '>', Carbon::now())->where ('start_time', '<', Carbon::now()->addHour())->get();
        foreach($appointments as $appointment){
            Mail::send('emails.notification', array(
                'appointment' => $appointment,
            ), function($message) use ($appointment){
                $message->from('ehealth@admin.com');
                $message->to($appointment->user->email, $appointment->user->name)->subject('Appointment starts soon');
            });
        }
        return 1;
    }
}
