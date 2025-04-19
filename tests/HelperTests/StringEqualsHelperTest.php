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

namespace District5\ComposerTemplateTests\HelperTests;


use District5\ComposerTemplate\Helper\StringEqualsHelper;
use District5\ComposerTemplateTests\TestAbstract;

/**
 * Class StringEqualsHelperTest
 * @package District5\ComposerTemplateTests\HelperTests
 */
class StringEqualsHelperTest extends TestAbstract
{
    public function testSimpleEquals()
    {
        $this->assertTrue(StringEqualsHelper::equals('test', 'test'));
    }

    public function testEnvironmentVariable()
    {
        $this->assertTrue(StringEqualsHelper::equals('and-this-is-a-value', getenv('THIS_IS_A_KEY')));
    }
}
