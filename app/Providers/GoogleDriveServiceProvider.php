<?php

namespace App\Providers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;

class GoogleDriveServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Storage::extend('google', function($app, $config) {
            $client = new \Google_Client();
            $client->setClientId('859035909965-jht09i01vsi0vlan8584agf46qsk5lf7.apps.googleusercontent.com');
            $client->setClientSecret('7NV0GjE8QQ0x_K8p85J5gU_7');
            $client->refreshToken('1//04ThxPMv4OM3fCgYIARAAGAQSNwF-L9IroSKvKaY7frHX4CAqN-5e59VDC6xMZzW7AkbkkvFFqijSxHcC9hg88kVfqIYTmKzYnlE');
            $service = new \Google_Service_Drive($client);
            $adapter = new \Hypweb\Flysystem\GoogleDrive\GoogleDriveAdapter($service, '1-0-jTRE_PFCmo2jghlSY1ZQGoaI2AgQm');

            return new \League\Flysystem\Filesystem($adapter);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
