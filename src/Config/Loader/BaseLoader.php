<?php
/**
 * This file is part of the Config package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Copyright (c) 2016 - 2018 by Adam Banaszkiewicz
 *
 * @license   MIT License
 * @copyright Copyright (c) 2016 - 2018, Adam Banaszkiewicz
 * @link      https://github.com/requtize/config
 */

namespace Requtize\Config\Loader;

/**
 * @author Adam Banaszkiewicz https://github.com/requtize
 */
abstract class BaseLoader implements LoaderInterface
{
    /**
     * Configuration filepath.
     * @var string
     */
    protected $filepath;

    /**
     * Store cached data from file, prevent multiple times
     * include and parse the same file.
     * @var mixed
     */
    protected $cachedData;

    /**
     * Constructor.
     * @param string $filepath Configuration filepath to parse.
     */
    public function __construct($filepath)
    {
        $this->filepath = realpath($filepath);
    }

    /**
     * Shorthand static function to create objects for each supported
     * type of configuration file.
     * @param  string $filepath Filepath to resolve.
     * @return BaseLoader
     */
    public static function factory($filepath)
    {
        switch(pathinfo($filepath, PATHINFO_EXTENSION))
        {
            case 'ini' : return new IniLoader($filepath); break;
            case 'yaml': return new YamlLoader($filepath); break;
            default    : return new PhpLoader($filepath); break;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function setFilepath($filepath)
    {
        $this->filepath = $filepath;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getFilepath()
    {
        return $this->filepath;
    }

    /**
     * {@inheritdoc}
     */
    public function getModificationTime()
    {
        return filemtime($this->filepath);
    }
}
