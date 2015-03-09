<?php
namespace Ihsan\Compressor;

/**
 * Author: Muhammad Surya Ihsanuddin<surya.kejawen@gmail.com>
 * Url: http://blog.khodam.org
 *
 * @see: ttps://gist.github.com/brentonstrine/5f56a24c7d34bb2d4655
 */
final class CssCompressor implements CompressorInterface
{
    private $css;

    public function __construct($css = '')
    {
        $this->css = $css;
    }

    public function compress($string = null)
    {
        if (is_string($string)) {
            $this->css = $string;
        }

        $this->css = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $this->css);

        $this->css = str_replace(array("\r\n", "\r", "\n", "\t"), '', $this->css);

        $this->css = ereg_replace(' {2,}', ' ', $this->css);

        $this->css = str_replace(
            array(
                ': ',
                '} ',
                '{ ',
                '; ',
                ', ',
                ' }',
                ' {',
                ' ;',
                ' ,',
            ), array(
                ':',
                '}',
                '{',
                ';',
                ',',
                '}',
                '{',
                ';',
                ',',
            ),
        $this->css);

        return $this->css;
    }
}
