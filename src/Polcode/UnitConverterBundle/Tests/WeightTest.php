<?php

namespace Polcode\UnitConverterBundle\Tests;

use Polcode\UnitConverterBundle\Units\Weight;

class WeightTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider additionProvider
     */
    public function testToUnit($v,$u,$u2,$e)
    {
        $t = new Weight($v,$u);
        $this->assertEquals($e,round($t->toUnit($u2),2));
    }
    
    public function additionProvider()
    {
        return array(
            array(2000, 'g', 'kg', 2),
            array(2000, 'kg', 't', 2),
            array(2646, 'kg', 'oz', 93333.33),
            array(2655, 'lb', 'cwtUK', 23.71),
            array(200, 'dag', 'g', 2000),
            array(2, 't', 'dag', 200000),
            array(2646, 'oz', 'lb', 165.38),
            array(2000, 'cwtUK', 'tUK', 100)
        );
    }
    
    /**
    * @dataProvider additionProvider2
    * @expectedException Exception
    * @expectedExceptionMessage     Unsupported unit
    */
    public function testToUnitException($v,$u,$u2,$e)
    {
        $t = new Weight($v,$u);
        $this->assertEquals($e,round($t->toUnit($u2),2));
    }
    
    public function additionProvider2()
    {
        return array(
            array(2655, 'tUK', 'tUKss', 23.71),
            array(2000, 'kgsss', 't', 2)
        );
    }
}
?>