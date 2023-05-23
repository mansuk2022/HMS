<?php

namespace App\Console\Commands;

use App\Models\Backend\Event;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class EventNotifyCommand extends Command
{
    protected $signature = 'email:NotifyEvent';
    protected $description = 'Send event email one day before  event start date.';

    public function handle()
    {
        $tomorrow = date('Y-m-d', strtotime('+1 day'));
        $event = Event::whereDate('start_date', $tomorrow)->first();

        if (isset($event)) {
            $reminder_date = date('Y-m-d', strtotime('-1 day', strtotime($event->start_date)));

            $today = date('Y-m-d');
            if ($today == $reminder_date) {
                $users = User::where('user_type','3')->get();
                foreach ($users as $user) {

                    $start_date = Carbon::parse($event->start_date);
                    $end_date = Carbon::parse($event->end_date);

                    $days = $start_date->diffInDays($end_date);

                    $details = [
                        'title' => $event->event_title,
                        'start_date' => $start_date,
                        'end_date' => $end_date,
                        'days' => $days,
                        'location'=>$event->event_location,
                        'description'=>$event->description,
                        'name'=>$user->name
                    ];
                    
                    $attachmentPath = '';
                    $attachmentName = '';
                    send_email($user->email, 'New Event Happening', 'mail.event', ['data' => $details], $attachmentPath, $attachmentName);
                }
            }
        }
    }
}
