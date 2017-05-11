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
    public function testUsage( $path, $separator, $expected )
    {

        $sut = new PathPrefixer( $this->cwd, $separator );
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


        $null_separator      = null;
        $system_separator    = \DIRECTORY_SEPARATOR;
        $alternate_separator = "@";

        return array(
            // String parameter
            [ $dir, $system_separator,    $cwd . $system_separator . $dir ],
            [ $dir, $null_separator,      $cwd . $system_separator . $dir ],
            [ $dir, $alternate_separator, $cwd . $alternate_separator . $dir ],

            // Array parameter
            [ array('foo' => $dir), $system_separator,    array('foo' => $cwd . $system_separator . $dir) ],
            [ array('foo' => $dir), $null_separator,      array('foo' => $cwd . $system_separator . $dir) ],
            [ array('foo' => $dir), $alternate_separator, array('foo' => $cwd . $alternate_separator . $dir) ],

            // StdClass parameter
            [ (object) array('foo' => $dir), $system_separator,    (object) array('foo' => $cwd . $system_separator . $dir) ],
            [ (object) array('foo' => $dir), $null_separator,      (object) array('foo' => $cwd . $system_separator . $dir) ],
            [ (object) array('foo' => $dir), $alternate_separator, (object) array('foo' => $cwd . $alternate_separator . $dir) ]
        );
    }

}

