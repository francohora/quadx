<?php
declare(strict_types=1);

namespace App\Providers;

use App\Services\QuadxClient\QuadxClient;
use App\Services\QuadxClient\QuadxClientInterface;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

final class QuadxClientServiceProvider extends ServiceProvider
{
    /**
     * Register service
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(QuadxClientInterface::class, function ($app) {
            $config = [
                'base_uri' => 'https://api.staging.quadx.xyz',
                'Content-type' => 'application/json'
            ];


            return new QuadxClient(new Client($config), \env('QUADX_TOKEN'));
        });
    }
}
