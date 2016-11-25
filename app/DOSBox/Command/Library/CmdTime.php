<?php

namespace DOSBox\Command\Library;

use DOSBox\Interfaces\IDrive;
use DOSBox\Interfaces\IOutputter;
//use DOSBOx\Filesystem\Directory;
use DOSBox\Command\BaseCommand as Command;

class CmdTime extends Command {
    //setting variabel untuk mengetahui
    private $timeParams;
    private $timeValid;

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

    function isTimeValid($time) {
        return is_object(DateTime::createFromFormat('h:i:s', $time));
    } 

    public function execute(IOutputter $outputter){
        //$this->timeParams = isTimeValid($this->timeParams);
        if($this->timeParams == "gaga") {
            $outputter->printLine ("Command rejected, please input the right format");
            $this->timeParams=null;
        } elseif ($this->timeParams==is_object(DateTime::createFromFormat('h:i:s', $this->timeParams)){
        
        } elseif ($this->timeParams==null) {
            date_default_timezone_set("Asia/Jakarta");
            $outputter->printLine (date("H:i:s"));
        } else {
            $outputter->printLine ("Command rejected, please input the right format");
            $this->timeParams=null;
        }
    }
}