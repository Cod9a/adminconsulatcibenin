<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DemandRejected extends Notification
{
    use Queueable;
    public $demandRejection;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($demandRejection)
    {
        $this->demandRejection = $demandRejection;
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
            ->line('Votre demande a ete rejetee pour la cause suivante')
            ->line(
                $this->demandRejection->justification
            )->line('Veuillez re-soumettre votre demande en prenant en conideration les information cite sus');
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
