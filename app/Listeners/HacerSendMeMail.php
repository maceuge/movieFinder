<?php

namespace App\Listeners;

use App\Events\SendMeMail;
use App\Post;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;

class HacerSendMeMail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SendMeMail  $event
     * @return void
     */
    public function handle(SendMeMail $event)
    {
//        $movie = \App\Movie::find(2);
//        $movie->awards = $event->request->input('post');
//        $movie->save();

        $data = $event->request->only(['user', 'email', 'post']);
        $posts = Post::create($data);
        $posts->save();

//        $msguser = 'Usuario: '.$event->request->input('user');
        //$msgmail = 'Mail: '.$event->request->input('email');
        //$msgpost = 'Comentario: '.$event->request->input('post');
        //dd($event);
        //$msguser->storeAs('post/postin.txt', $msguser, env('PUBLIC_STORAGE', 'public'));
//        Storage::put('postin.txt', $msguser, 'public');

    }
}
