<?php

namespace DOSBox\Command\Library;

use DOSBox\Interfaces\IDrive;
use DOSBox\Interfaces\IOutputter;
use DOSBox\Filesystem\Directory;
use DOSBox\Command\BaseCommand as Command;

class CmdMkDir extends Command {
    private $directoryToPrint;

    const PARAMETER_CONTAINS_BACKLASH = "At least one parameter denotes a path rather than a directory name.";

    public function __construct($commandName, IDrive $drive){
        parent::__construct($commandName, $drive);
    }

    public function checkNumberOfParameters($numberOfParametersEntered) {
        return $numberOfParametersEntered >= 1 ? true : false;
    }

    public function checkParameterValues(IOutputter $outputter) {
        for($i=0; $i< $this->getParameterCount(); $i++) {
            if ($this->parameterContainsBacklashes($this->getParameterAt($i), $outputter))
                return false;
        }
        return true;
    }

    // TODO: Unit test
    public static function parameterContainsBacklashes($parameter, IOutputter $outputter) {
        // Do not allow "mkdir c:\temp\dir1" to keep the command simple
        if (strstr($parameter, "\\") !== false || strstr($parameter, "/") !== false) {
            $outputter->printLine(self::PARAMETER_CONTAINS_BACKLASH);
            return true;
        }

        return false;
    }

    public function execute(IOutputter $outputter){
        
            for($i=0; $i < $this->getParameterCount(); $i++) {

            //test begin
            $this->directoryToPrint = $this->getDrive()->getCurrentDirectory(); 
            $this->directoryToPrint->getContent();
            if ($this->directoryToPrint->getNumberOfContainedDirectories()==0){
                $this->createDirectory($this->params[$i], $this->getDrive());

            } else {

                $dirAvailable=true;
                foreach ($this->directoryToPrint->getContent() as $item) {
                    if($this->params[$i]==$item->getName()){
                        $outputter->printLine("Nama direktori sudah ada");
                        $dirAvailable=false;
                        break;
                    } 

                }

                 if($dirAvailable==true){$this->createDirectory($this->params[$i], $this->getDrive());
                    }
                //end test
            }
                      

            }
        
    }

    public function createDirectory($newDirectoryName, IDrive $drive) {
        $newDirectory = new Directory($newDirectoryName);
        $drive->getCurrentDirectory()->add($newDirectory);
    }

    public function checkAvailableDirectory($newDirectoryName,$outputter){


    }
}