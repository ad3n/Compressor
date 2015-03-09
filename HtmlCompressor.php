<?php
namespace Ihsan\Compressor;

/**
 * Author: Muhammad Surya Ihsanuddin<surya.kejawen@gmail.com>
 * Url: http://blog.khodam.org
 *
 * @see: http://php.net/manual/en/function.ob-start.php#71953
 */
final class HtmlCompressor implements CompressorInterface
{
    private $html;

    public function __construct($html = '')
    {
        $this->html = $html;
    }


    public function compress($string = null)
    {
        if (is_string($string)) {
            $this->html = $string;
        }

        $search = array(
            '/\>[^\S ]+/s',
            '/[^\S ]+\</s',
            '/(\s)+/s'
        );

        $replace = array(
            '>',
            '<',
            '\\1'
        );

        return preg_replace($search, $replace, $this->html);
    }
}
