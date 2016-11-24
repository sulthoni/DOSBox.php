<?php

namespace DOSBox\Command\Library;

use DOSBox\Interfaces\IDrive;
use DOSBox\Interfaces\IOutputter;
use DOSBox\Filesystem\File;
use DOSBox\Command\BaseCommand as Command;

class CmdMkFile extends Command {
    public function __construct($commandName, IDrive $drive){
        parent::__construct($commandName, $drive);
    }

    public function checkNumberOfParameters($numberOfParametersEntered) {
        return true;
    }

    public function checkParameterValues(IOutputter $outputter) {
        return true;
    }

    public function execute(IOutputter $outputter){
        if ( count($this->params) != 0){
            $fileName = $this->params[0];
            if ( count($this->params) > 1){
                $fileContent = $this->params[1];
            } else {
                $fileContent = "";
            }
            $newFile = new File($fileName, $fileContent);
            $this->getDrive()->getCurrentDirectory()->add($newFile);
            $outputter->newLine();
            $outputter->printNoLine("file  " . $newFile . "  telah dibuat...");
            $outputter->newLine();
        } else{
            $outputter->newLine();
            $outputter->printNoLine("Setidaknya berikan nama file!!!");
            $outputter->newLine();
        }
    }

}