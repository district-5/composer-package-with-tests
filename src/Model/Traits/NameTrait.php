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

namespace District5\ComposerTemplate\Model\Traits;

use District5\ComposerTemplate\Model\Abstracts\PersonAbstract;
use District5\ComposerTemplate\Model\Interfaces\PersonInterface;

/**
 * @trait NameTrait
 * @package District5\ComposerTemplate\Model\Traits
 */
trait NameTrait
{
    /**
     * @inheritdoc
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getName(): string
    {
        return $this->name;
    }
}
