<?php

namespace DOSBox\Command\Library;

use DOSBox\Interfaces\IDrive;
use DOSBox\Interfaces\IOutputter;
//use DOSBOx\Filesystem\Directory;
use DOSBox\Command\BaseCommand as Command;

class CmdVer extends Command {
    private $variasi;

    public function __construct($commandName, IDrive $drive){
        parent::__construct($commandName, $drive);
    }

    public function checkNumberOfParameters($numberOfParametersEntered) {
        return ($numberOfParametersEntered == 0 || $numberOfParametersEntered == 1);
    }

    public function checkParameterValues(IOutputter $outputter) {
        if($this->getParameterCount() > 0) {
            //$outputter->printLine($this->params[0]);
            $this->variasi = $this->params[0];
            return true;
        } else {
            //$this->destinationDirectory = null;
            return true;
        }
    }

    public function execute(IOutputter $outputter){
        $outputter->printLine("Microsoft Windows XP [Version 5.1.2600]");
        if ($this->variasi == "/w"){
            $outputter->printLine("Parmiyanto Parmiyanto@BPS.GO.ID");    
            $outputter->printLine("Assidqie PARMIYANTO@BPS.GO.ID");    
            $outputter->printLine("Hanung Hanung@BPS.GO.ID");    
            $outputter->printLine("Yudi Yudi@BPS.GO.ID");    
            $this->variasi = null;
        
        }
        
    }
    
}