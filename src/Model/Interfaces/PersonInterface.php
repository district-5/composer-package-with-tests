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

namespace District5\ComposerTemplate\Model\Interfaces;

/**
 * @interface Person
 * @package District5\ComposerTemplate\Model\Interfaces
 */
interface PersonInterface
{
    /**
     * @param string $area
     * @return string
     */
    public function welcome(string $area): string;

    /**
     * @param string $name
     * @return $this
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function setName(string $name);

    /**
     * @return string
     */
    public function getName(): string;
}
