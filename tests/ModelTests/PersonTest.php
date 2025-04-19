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

namespace District5\ComposerTemplateTests\ModelTests;


use District5\ComposerTemplate\Model\Person;
use District5\ComposerTemplateTests\TestAbstract;

/**
 * Class PersonTest
 * @package District5\ComposerTemplateTests\ModelTests
 */
class PersonTest extends TestAbstract
{
    public function testSimpleWelcome()
    {
        $person = new Person();
        $person->setName('Joe Bloggs');

        $this->assertEquals(
            'Joe Bloggs',
            $person->getName()
        );

        $this->assertEquals(
            'Joe Bloggs, welcome to the account area!',
            $person->welcome('account')
        );
    }
}
