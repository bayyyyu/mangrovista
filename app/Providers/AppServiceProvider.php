<?php

namespace App\Providers;

use App\Models\Notifikasi;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // View::composer('components.layout.header', function ($view) {
        //     $notifikasi = Notifikasi::with('roleRequest')->get();
        //     $view->with('list_notifikasi', $notifikasi);
        // });
        Paginator::useBootstrap();

        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage)
                ->subject('Verify Email Address')
                ->greeting('Hai ' . $notifiable->nama_lengkap . ',')
                ->line('Terima kasih telah bergabung dengan MangroVista! Untuk mengaktifkan akun Anda dan mulai menjelajah, silakan klik tombol verifikasi di bawah ini:')
                ->action('Verifikasi Alamat Email', $url)
                ->line('Jika Anda tidak membuat akun, tidak perlu melakukan tindakan lebih lanjut.')
                ->salutation('‎');
        });
    }
}
