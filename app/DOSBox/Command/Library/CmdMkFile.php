<?php

namespace DOSBox\Command\Library;

use DOSBox\Interfaces\IDrive;
use DOSBox\Interfaces\IOutputter;
use DOSBox\Filesystem\File;
use DOSBox\Command\BaseCommand as Command;

class CmdMkFile extends Command {
    private $directoryToPrint; // untuk ngambil nama file

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

            //code untuk mengecek apakah file sudah ada
            $fileAvailable=true;
            $this->directoryToPrint = $this->getDrive()->getCurrentDirectory(); 
            $this->directoryToPrint->getContent();
            foreach ($this->directoryToPrint->getContent() as $item) {
                    if($this->params[0]==$item->getName()){
                        $outputter->printLine("Nama file sudah ada");
                        $fileAvailable=false;
                        break;
                    } 

            }

            if($fileAvailable==true){
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
            }
        } else{
            $outputter->newLine();
            $outputter->printNoLine("Setidaknya berikan nama file!!!");
            $outputter->newLine();
        }
    }

}