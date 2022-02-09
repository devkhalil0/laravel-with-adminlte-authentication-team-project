<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmailVerifyNotification extends Notification implements ShouldQueue

{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $student;

    public function __construct($student)
    {
        $this->student = $student;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)

            ->subject('Verify Email')
            ->greeting('Hello, '.$this->student->name)
            ->line('Please click the button below to verify your email address.')
            ->action('Verify Email', url('students/verify/email/'.$this->student->personal_token))
            ->line('Thank You So Much From Test')
            ->line('Regards,')
            ->salutation('Test');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
