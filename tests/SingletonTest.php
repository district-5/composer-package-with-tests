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

namespace District5\ComposerTemplateTests;


use District5\ComposerTemplate\Singleton;

/**
 * Class SingletonTest
 * @package District5\ComposerTemplateTests\ModelTests
 */
class SingletonTest extends TestAbstract
{
    public function testSingleton()
    {
        $singleton1 = Singleton::getInstance();
        $singleton2 = Singleton::getInstance();

        $this->assertSame($singleton1, $singleton2);

        $singleton1->setName('test');
        $this->assertSame($singleton1->getName(), $singleton2->getName());
    }
}
