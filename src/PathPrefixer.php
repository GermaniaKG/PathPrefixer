<?php
namespace Germania\PathPrefixer;

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
     * @param string $root_path path to root directory; default: null (or getcwd(), respectively)
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
