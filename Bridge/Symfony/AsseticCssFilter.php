<?php
namespace Ihsan\Compressor\Bridge\Symfony;

/**
 * Author: Muhammad Surya Ihsanuddin<surya.kejawen@gmail.com>
 * Url: http://blog.khodam.org
 */

use Assetic\Filter\FilterInterface;
use Assetic\Asset\AssetInterface;
use Ihsan\Compressor\CssCompressor;

class AsseticCssFilter implements FilterInterface
{
    public function filterDump(AssetInterface $asset)
    {
        $css = new CssCompressor($asset->getContent());

        $asset->setContent($css->compress());
    }

    public function filterLoad(AssetInterface $asset)
    {
        $this->filterDump($asset);
    }
}
