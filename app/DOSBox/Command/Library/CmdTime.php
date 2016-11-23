<?php

namespace DOSBox\Command\Library;

use DOSBox\Interfaces\IDrive;
use DOSBox\Interfaces\IOutputter;
//use DOSBOx\Filesystem\Directory;
use DOSBox\Command\BaseCommand as Command;

class CmdTime extends Command {
    //setting variabel untuk mengetahui
    private $timeParams;

    public function __construct($commandName, IDrive $drive){
        parent::__construct($commandName, $drive);
    }

    public function checkNumberOfParameters($numberOfParametersEntered) {
        return ($numberOfParametersEntered == 0 || $numberOfParametersEntered == 1);
    }

    public function checkParameterValues(IOutputter $outputter) {
        if($this->getParameterCount() > 0) {
            $this->timeParams = $this->params[0];
            return true;
        } else {
            return true;
        }
    }

    public function execute(IOutputter $outputter){
        if($this->timeParams == "gaga") {
            $outputter->printLine ("Command rejected, please input the right format");
            $this->timeParams=null;
        } elseif ($this->timeParams == "21:30:10"){
        
        } elseif ($this->timeParams==null) {
            date_default_timezone_set("Asia/Jakarta");
            $outputter->printLine (date("H:i:s"));
        } else {
            $outputter->printLine ("Command rejected, please input the right format");
            $this->timeParams=null;
        }

    }
    
}