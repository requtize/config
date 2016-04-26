<?php
/**
 * This file is part of the Config package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Copyright (c) 2016 by Adam Banaszkiewicz
 *
 * @license   MIT License
 * @copyright Copyright (c) 2016, Adam Banaszkiewicz
 * @link      https://github.com/requtize/config
 */

namespace Requtize\Config;

use Requtize\Config\Loader\LoaderInterface;

/**
 * @author Adam Banaszkiewicz https://github.com/requtize
 */
interface ConfigInterface
{
    /**
     * Gets modification times of each file imported to object.
     * @return array
     */
    public function getModificationTimes();

    /**
     * Gets boolean info, if any of imported file was changed.
     * @return boolean
     */
    public function isAnyFileChanged();

    /**
     * Appends config data from LoaderInterface object.
     * @param  LoaderInterface $loader LoaderInterface object with passed config filepath.
     * @return self
     */
    public function appendFromLoader(LoaderInterface $loader);

    /**
     * Shorthand to importing config files.
     * @param  string $filepath Path to config file.
     * @return self
     */
    public function import($filepath);

    /**
     * Allows merging current config data with other ConfigInterface object.
     * @param  ConfigInterface $config Object with data to merge.
     * @return self
     */
    public function merge(ConfigInterface $config);

    /**
     * Gets config value from given key in dot.notation.
     * @param  string $path    Indexes separated with dot.
     * @param  mixed  $default Default value to return, if given index(es) not exists.
     * @return mixed           Founded value or default value.
     */
    public function get($path, $default = null);

    /**
     * Sets value in given index(es) in dot.notation.
     * @param string $path  Indexes separated with dot.
     * @param mixed  $value Value to set.
     */
    public function set($path, $value);

    /**
     * Check if given index(es) in dot.notation exists.
     * @param  string  $path Index(ex) to check.
     * @return boolean
     */
    public function has($path);

    /**
     * Returns all configurations data.
     * @return mixed
     */
    public function all();

    /**
     * Returns access point to array in given index(es) in dot.notation.
     * @param  string $path Indexes to find.
     * @return mixed
     */
    public function access($path);

    /**
     * Check if given filepane exists in $this->modificationTimes array
     * and if is fresh. Otherwise return false.
     * @param  string  $filepath Filepath to check if file is fresh.
     * @return boolean
     */
    public function isFresh($filepath);

    /**
     * Check if in current Config data exists index 'imports.file',
     * and import files from given paths relative to file that
     * contains these imports. At the end removes these indexes.
     * @param  LoaderInterface $loader LoaderInterface object, which
     *                                 contains filewith imports we
     *                                 have to resolve.
     * @return self
     */
    public function resolveImports(LoaderInterface $loader);

    /**
     * Sets cache filepath.
     * @param string $cacheFilepath
     */
    public function setCacheFilepath($cacheFilepath);

    /**
     * Gets cache filepath.
     * @return string
     */
    public function getCacheFilepath();

    /**
     * Saves imported configs to Cache file.
     * @return null|boolean
     */
    public function saveToCache();

    /**
     * Include Cache file, and take data from it.
     * @return self
     */
    public function resolveCacheData();
}