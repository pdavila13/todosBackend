<?php

namespace PaoloDavila\TodosBackend\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use NotificationChannels\Gcm\GcmChannel;
use NotificationChannels\Gcm\GcmMessage;
use NotificationChannels\OneSignal\OneSignalMessage;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;
use PaoloDavila\TodosBackend\Message;
use PaoloDavila\TodosBackend\User;


class MessageSent extends Notification implements ShouldQueue
{
    use Queueable;

    public $user;
    public $message;
    public $imageURL;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user, Message $message)
    {
        $this->user = $user;
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [GcmChannel::class, TelegramChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        //
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            $this->user,
            $this->message
        ];
    }

    /**
     * @param $notifiable
     * @return mixed
     */
    public function toGcm($notifiable)
    {
        return GcmMessage::create()
            ->badge(1)
            ->title($this->user->name)
            ->message($this->message->message)
            ->data('message', $this->message)
            ->data('user', $this->user);
    }

    /**
     * @param $notifiable
     * @return mixed
     */
    public function toOneSignal($notifiable)
    {
        return OneSignalMessage::create()
            ->subject($this->user)
            ->body($this->message);
    }

    /**
     * To telegram.
     *
     * @param $notifiable
     * @return mixed
     */
    public function toTelegram($notifiable)
    {
        $url = url('https://todosbackend.pdavila.2dam.acacha.org');

        return TelegramMessage::create()
            ->to('@dam21617alum')
            ->content($this->message->message)
            ->button('Go to my todosBackend', $url);
    }
}
