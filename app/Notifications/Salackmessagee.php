<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Movie;

class Salackmessagee extends Notification
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
        return ['slack'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toSlack($notifiable)
    {
        return (new SlackMessage)
                    ->success()
                    ->content('Ultimas Peliculas')
                    ->attachment(function ($att) {
                        $att->title('Pelicula: '.$this->movie->title, url('http://localhost:8000/moviedetail/'.$this->movie->id))
                            ->fields([
                                'Fecha de Estreno: ' => $this->movie->release_date,
                                'Rating: ' => $this->movie->rating,
                                'Duracion: ' => $this->movie->length,
                                'Awards: ' => $this->movie->awards,
                            ]);
                    });
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
