<?php
namespace Ihsan\Compressor\Bridge\Symfony;

/**
 * Author: Muhammad Surya Ihsanuddin<surya.kejawen@gmail.com>
 * Url: http://blog.khodam.org
 */

use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Ihsan\Compressor\HtmlCompressor;

final class HtmlCompressorOutputFilter
{
    public function onKernelResponse(FilterResponseEvent $event)
    {
        $response = $event->getResponse();
        $compressedContent = new HtmlCompressor($response->getContent());
        $response->setContent($compressedContent->compress());

        return $response;
    }
}
