<?php
namespace Ihsan\Compressor\Bridge\Laravel;

/**
 * Author: Muhammad Surya Ihsanuddin<surya.kejawen@gmail.com>
 * Url: http://blog.khodam.org
 */

use Illuminate\Support\ServiceProvider;
use Response;
use Ihsan\Compressor\HtmlCompressor;

class HtmlCompressorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Response::macro('compress', function($value)
        {
            return Response::make((new HtmlCompressor($value))->compress());
        });
    }

    public function register()
    {
    }
}
