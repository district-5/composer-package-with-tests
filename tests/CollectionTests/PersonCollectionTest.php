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

namespace District5\ComposerTemplateTests\CollectionTests;


use District5\ComposerTemplate\Collection\PersonCollection;
use District5\ComposerTemplate\Model\Person;
use District5\ComposerTemplateTests\TestAbstract;

/**
 * Class PersonCollectionTest
 * @package District5\ComposerTemplateTests\CollectionTests
 */
class PersonCollectionTest extends TestAbstract
{
    public function testSimpleList()
    {
        $names = [
            'Jane Bloggs',
            'Joe Bloggs'
        ];
        $models = [];
        foreach ($names as $name) {
            $person = new Person();
            $person->setName($name);
            $models[] = $person;
        }
        $collection = new PersonCollection($models);
        $this->assertEquals(2, $collection->count());

        $i = 0;
        foreach ($collection as $item) {
            $this->assertEquals($names[$i], $item->getName());
            $i++;
        }

        foreach ($names as $k => $name) {
            $this->assertEquals($name, $collection[$k]->getName());
        }

        $another = new Person();
        $another->setName('Fred Flintstone');
        $collection->append($another);

        $this->assertEquals('Fred Flintstone', $collection[2]->getName());
    }
}
