<?php
/**
 * PHP-DI
 *
 * @link      http://php-di.org/
 * @copyright Matthieu Napoli (http://mnapoli.fr/)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE file)
 */

namespace DI\Test\UnitTest\Definition\Dumper;

use DI\Definition\AliasDefinition;
use DI\Definition\Dumper\AliasDefinitionDumper;
use DI\Definition\ValueDefinition;

/**
 * @covers \DI\Definition\Dumper\AliasDefinitionDumper
 */
class AliasDefinitionDumperTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function dumps_alias_definition()
    {
        $definition = new AliasDefinition('bar');
        $dumper = new AliasDefinitionDumper();

        $str = 'get(bar)';

        $this->assertEquals($str, $dumper->dump($definition));
    }

    /**
     * @test
     */
    public function should_dump_alias_definition_with_name()
    {
        $definition = new AliasDefinition('bar');
        $definition->setName('foo');
        $dumper = new AliasDefinitionDumper();

        $str = 'get(foo => bar)';

        $this->assertEquals($str, $dumper->dump($definition));
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage This definition dumper is only compatible with AliasDefinition objects, DI\Definition\ValueDefinition given
     */
    public function should_only_accept_alias_definitions()
    {
        $definition = new ValueDefinition('foo');
        $dumper = new AliasDefinitionDumper();

        $dumper->dump($definition);
    }
}
