<?php
namespace Germania\PathPrefixer;

/**
 * Adds a prefix to a given path string or array.
 *
 * Usage:
 *
 *    <?php
 *    use Germania\PathPrefixer\PathPrefixer;
 *
 *    // Root will default to getcwd()
 *    $prefixer = new PathPrefixer( '/path/to/root' );
 *
 *    echo $prefixer('templates');
 *    // Result: "/path/to/root/templates"
 *
 *
 *    // Try on array:
 *    $result = $prefixer([
 *        'foo' => 'includes',
 *        'bar' => 'templates'
 *    ]);
 *    // Result:
 *    //  'foo' => '/path/to/root/includes',
 *    //  'bar' => '/path/to/root/templates'
 *
 */
class PathPrefixer
{

    /**
     * @var string
     */
    public $root_path;

    /**
     * @var string
     */
    public $separator;

    /**
     * @param string $root_path  Path to root directory; default: null (or getcwd(), respectively)
     * @param string $separator  String separator for prefix and path.
     *                           When not set, DIRECTORY_SEPARATOR will be used.
     */
    public function __construct( $root_path = null, $separator = null)
    {
        $this->root_path = $root_path ?: getcwd();
        $this->separator = $separator ?: \DIRECTORY_SEPARATOR;
    }

    /**
     * Prepends a path prefix to the path given.
     *
     * @param  mixed $path Path string ar array
     * @return mixed       Path string ar array with root path prepended
     */
    public function __invoke( $path )
    {
        if (is_string( $path )):
            $result = join( $this->separator, [ $this->root_path,  $path ] );

        elseif (is_array($path)):
            $result = array_map($this, $path);

        elseif (is_object($path)):

            $result = new \StdClass;
            foreach($path as $key => $p):
                $result->{$key} = $this->__invoke($p);
            endforeach;

        else:
            throw new \InvalidArgumentException("String or String array expected.");
        endif;

        return $result;
    }
}
