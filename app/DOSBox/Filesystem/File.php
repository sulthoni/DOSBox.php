<?php

namespace DOSBox\Filesystem;

use DOSBox\Filesystem\FileSystemItem;

class File extends FileSystemItem {
    private $content;
    private $tgl; //joko

    public function __construct($name, $content){
        parent::__construct($name, NULL);
        $this->content = $content;
        $this->tgl = date('d/m/Y h:i:s a', time()); //joko
    }

    public function getFileContent() {
        return $this->content;
    }

    public function isDirectory() {
        return false;
    }

    public function getSize() {
        return strlen($this->content);
    }

    public function getTgl(){ //joko
        return $this->tgl;
    }
    public function getNumberOfContainedFiles() {
        return 0;  // A file does not contain any other files
    }

    public function getNumberOfContainedDirectories() {
        return 0;  // A file does not contain any sub-directories
    }
}