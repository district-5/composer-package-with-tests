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

namespace District5\ComposerTemplate\Model\Abstracts;

/**
 * @class PersonAbstract
 * @package District5\ComposerTemplate\Model\Abstracts
 */
abstract class PersonAbstract
{
    /**
     * @var string|null
     */
    protected string|null $name = null;

    /**
     * @return string
     */
    protected function getGreetingTemplate(): string
    {
        return '%s, welcome to the %s area!';
    }
}
