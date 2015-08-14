<?php
/**
 * PHP-DI
 *
 * @link      http://php-di.org/
 * @copyright Matthieu Napoli (http://mnapoli.fr/)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE file)
 */

namespace DI\Test\UnitTest\Definition\Dumper;

use DI\Definition\DecoratorDefinition;
use DI\Definition\Dumper\DecoratorDefinitionDumper;
use DI\Definition\ValueDefinition;

/**
 * @covers \DI\Definition\Dumper\DecoratorDefinitionDumper
 */
class DecoratorDefinitionDumperTest extends \PHPUnit_Framework_TestCase
{
    public function testDump()
    {
        $definition = new DecoratorDefinition('foo', 'bar');
        $dumper = new DecoratorDefinitionDumper();

        $this->assertEquals('Decorate(foo)', $dumper->dump($definition));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage This definition dumper is only compatible with DecoratorDefinition objects, DI\Definition\ValueDefinition given
     */
    public function testInvalidDefinitionType()
    {
        $definition = new ValueDefinition('foo');
        $dumper = new DecoratorDefinitionDumper();

        $dumper->dump($definition);
    }
}
