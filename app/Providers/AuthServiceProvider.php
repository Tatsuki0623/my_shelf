<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
        VerifyEmail::toMailUsing(function ($notifiable, $url) {
        return (new MailMessage)
            ->from('myshelfservice@gmail.com')
            ->greeting('ご登録ありがとうございます')
            ->line('この度はご登録いただき、ありがとうございます。')
            ->line('ご登録を続けるには、以下のボタンを押し認証をしてください。')
            ->subject('MyShelfユーザーメール認証')
            ->action('認証する', $url)
            ->line('このEメールに心当たりがない場合は無視してください')
            ->line('※こちらのメールは送信専用のメールアドレスより送信しております。恐れ入りますが、直接ご返信しないようお願いいたします。');
        });
    }
}
