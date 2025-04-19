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

namespace District5\ComposerTemplate\Model;

use District5\ComposerTemplate\Model\Abstracts\PersonAbstract;
use District5\ComposerTemplate\Model\Interfaces\PersonInterface;
use District5\ComposerTemplate\Model\Traits\NameTrait;

/**
 * @class Person
 * @package District5\ComposerTemplate\Model
 */
class Person extends PersonAbstract implements PersonInterface
{
    use NameTrait;

    /**
     * @inheritdoc
     */
    public function welcome(string $area): string
    {
        return sprintf(
            $this->getGreetingTemplate(),
            $this->name,
            $area
        );
    }
}
