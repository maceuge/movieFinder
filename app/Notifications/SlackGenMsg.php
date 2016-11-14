<?php

namespace App\Notifications;

use App\Movie;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SlackGenMsg extends Notification
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
        $this->movie = $movie;
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
            ->content('Te gusta la siguiente pelicula?')
            ->attachment(function ($att) {
                $att->title('Pelicula: '.$this->movie->title, url('http://localhost:8000/moviedetail/'.$this->movie->id))
                    ->fields([
                        'Genero: ' => $this->movie->genre->name,
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
