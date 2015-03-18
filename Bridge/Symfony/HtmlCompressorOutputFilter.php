<?php
namespace Ihsan\Compressor\Bridge\Symfony;

/**
 * Author: Muhammad Surya Ihsanuddin<surya.kejawen@gmail.com>
 * Url: http://blog.khodam.org
 */

use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\KernelInterface;
use Ihsan\Compressor\HtmlCompressor;

final class HtmlCompressorOutputFilter
{
    /**
     * @var KernelInterface
     */
    private $kernel;

    public function __construct(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }

    public function onKernelResponse(FilterResponseEvent $event)
    {
        if (! in_array($this->kernel->getEnvironment(), array('test', 'dev'))) {
            $response = $event->getResponse();
            $compressedContent = new HtmlCompressor($response->getContent());
            $response->setContent($compressedContent->compress());

            return $response;
        }
    }
}
