<?php

namespace App\Providers;

use App\Notifications\ArticleUpdatedNotification;
use App\Providers\ArticleUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;

class SendArticleUpdatedNotification
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
     * @param  \App\Providers\ArticleUpdated  $event
     * @return void
     */
    public function handle(ArticleUpdated $event)
    {
        // dd($event->article->author);
        Notification::send($event->article->author, new ArticleUpdatedNotification($event->article));
    }
}
