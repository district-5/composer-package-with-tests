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

namespace District5\ComposerTemplate;

/**
 * Class Singleton
 * @package District5\ComposerTemplate
 */
class Singleton
{
    /**
     * @var Singleton|null
     */
    private static Singleton|null $instance = null;

    /**
     * @var string
     */
    private string $name = '';

    /**
     * Protected constructor to prevent creating a new instance externally.
     */
    protected function __construct()
    {
    }

    /**
     * @return Singleton
     * @var string $name
     */
    public function setName(string $name): Singleton
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return Singleton
     */
    public static function getInstance(): Singleton
    {
        if (self::$instance === null) {
            self::$instance = new Singleton();
        }

        return self::$instance;
    }
}
