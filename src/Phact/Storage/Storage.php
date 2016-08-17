<?php
namespace Phact\Storage;

use Phact\Storage\Files\StorageFile;

/**
 * Created by PhpStorm.
 * User: aleksandrgordeev
 * Date: 08.08.16
 * Time: 14:03
 */
abstract class Storage
{
    protected $_name;

    /**
     * @param $name
     * @return mixed
     */
    abstract public function getPath($path);

    /**
     * @param $name
     * @return mixed
     */
    abstract public function getExtension($path);


    /**
     * @param $name
     * @return mixed
     */
    abstract public function delete($path);

    /**
     * @return mixed save method
     */
    abstract public function save($filename, $content);

    /**
     * @param $path
     * @return mixed
     */
    abstract public function getUrl($path);


    /**
     * @param $name string
     * @return mixed
     */
    public function setName($name)
    {
        $this->_name = $name;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param $path string path file
     * @return string content
     */
    abstract public function getContent($path);


    /**
     * @param $filename string
     * @param StorageFile $file
     * @return StorageFile
     */
    public function copyStorageFile($filename, StorageFile $file)
    {
        $path = null;

        if ($file->storage == $this->getName()){
            $path = $this->copy($file->getPath(), $filename);
        }else{
            $path = $this->save($filename, $file->getContent());
        }
        return $path ? new StorageFile($path, $this->getName()) : false;

    }

    /**
     * @param $from
     * @param $to
     * @return string file path after save
     */
    abstract public function copy($from, $to);

}