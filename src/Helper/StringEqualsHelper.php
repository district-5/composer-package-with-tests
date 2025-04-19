<?php
/**
 * District5 - Composer library
 *
 * @copyright District5
 *
 * @author District5 YEAR to present
 * @link https://www.district5.co.uk
 *
 * @license MIT License
 */

namespace District5\ComposerTemplate\Helper;

/**
 * @class StringEqualsHelper
 * @package District5\ComposerTemplate\Helper
 */
class StringEqualsHelper
{
    /**
     * @param string $string1
     * @param string $string2
     * @return bool
     */
    public static function equals(string $string1, string $string2): bool
    {
        return $string1 === $string2;
    }
}
