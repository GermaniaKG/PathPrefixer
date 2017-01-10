<?php
namespace tests;

use Germania\PathPrefixer\PathPrefixer;
use \InvalidArgumentException;

class PathPrefixerTest extends \PHPUnit_Framework_TestCase
{

    public $cwd;

    public function setUp()
    {
        $this->cwd = dirname(__DIR__);
    }

    /**
     * @dataProvider providePaths
     */
    public function testUsage( $path, $expected )
    {

        $sut = new PathPrefixer( $this->cwd );
        $result = $sut( $path );

        $this->assertEquals($expected, $result);
    }


    public function testInvalidArgument( )
    {

        $sut = new PathPrefixer();
        $this->expectException( InvalidArgumentException::class );
        $sut( 2 );

    }


    public function providePaths() {

        $dir = basename(__DIR__);
        $cwd = dirname(__DIR__);

        return array(
            // String parameter
            [ $dir, $cwd . "/" . $dir ],

            // Array parameter
            [ array('foo' => $dir), array('foo' => $cwd . "/" . $dir) ],

            // StdClass parameter
            [ (object) array('foo' => $dir), (object) array('foo' => $cwd . "/" . $dir) ]
        );
    }

}

