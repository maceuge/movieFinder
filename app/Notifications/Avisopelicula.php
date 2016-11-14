<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Movie;

class Avisopelicula extends Notification
{
    use Queueable;

    protected $movie;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Movie $movie)
    {
        return $this->movie = $movie;
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
        $novedad = $this->movie->title;
        $url = url('http://localhost:8000/moviedetail/'.$this->movie->id);
        //dd($novedad);
        return (new MailMessage)
                    ->subject('Llego nueva pelicula')
                    ->line('No te pierdas en esta oportunidad de ver una nueva pelicula.')
                    ->line('Pelicula: &nbsp;&nbsp;&nbsp;'. $novedad)
                    ->action('Mirala Ahora', $url)
                    ->line('Gracias por elegir nuestro sitio!');
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
