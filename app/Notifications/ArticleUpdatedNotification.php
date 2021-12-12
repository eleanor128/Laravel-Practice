<?php

namespace App\Notifications;

use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ArticleUpdatedNotification extends Notification
{
    use Queueable;
    public $article;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
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
            ->subject(__('Article Information Updated'))
            ->line(__('Information of :ArticleName has been updated.', ['title' => $this->article->title]))
            ->line(__('Please checkout the new information.'))
            ->action(__('Course Information'), route('showHomePage', ['article' => $this->article]))
            ->line(__('Thank you for using our application!'));
    }
}
