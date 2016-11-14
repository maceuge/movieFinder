<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use \App\Movie;

class Notifnuevapeli extends Notification
{
    use Queueable;

    protected $lastmovie;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Movie $lastmovie)
    {
        $this->lastmovie = $lastmovie;
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
        $film = $this->lastmovie->title;
        $rating = $this->lastmovie->rating;
        $fecha = $this->lastmovie->release_date;
        //$fechaestreno = Carbon::createFromDate('dd-mm-YYYY', $fecha);
        //$fechaestreno = Carbon::now($fecha);

        $duracion = $this->lastmovie->length;
        $genre = $this->lastmovie->genre->name;
        $url = url('http://localhost:8000/moviedetail/'.$this->lastmovie->id);

        return (new MailMessage)
            ->subject('Llego el Gran Estreno')
            ->line('No te pierdas en esta oportunidad de ver una nueva pelicula.')
            ->line('Pelicula: &nbsp;'.$film)
            ->line('Rating: &nbsp;'.$rating)
            ->line('Fecha de Estreno: &nbsp;'.$fecha)
            ->line('Duracion: &nbsp;'.$duracion)
            ->line('Genero: &nbsp;'.$genre)
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
