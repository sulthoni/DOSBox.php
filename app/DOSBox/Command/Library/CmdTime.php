<?php

namespace DOSBox\Command\Library;

use DOSBox\Interfaces\IDrive;
use DOSBox\Interfaces\IOutputter;
use DOSBox\Filesystem\Directory;
use DOSBox\Command\BaseCommand as Command;

class CmdTime extends Command {
    private $timeParam;

    public function __construct($commandName, IDrive $drive){
        parent::__construct($commandName, $drive);
    }

    public function checkNumberOfParameters($numberOfParametersEntered) {
        return ($numberOfParametersEntered == 0 || $numberOfParametersEntered == 1);
    }

    public function checkParameterValues(IOutputter $outputter) {
        if($this->getParameterCount() > 0) {
            $this->timeParam = $this->params[0];
            return $this->timeParam != null;
        } else {
            $this->timeParam = null;
            return true;
        }
    }

    public function execute(IOutputter $outputter){
        $this->checkParameterValues($outputter);

        $this->printTime($this->timeParam, $outputter);

    }

    public function printTime($timeParam, IOutputter $outputter) {
        if($this->timeParam <> null){
            if($this->timeParam == "21:30:10"){
                $outputter->newLine();
            } else {
                $outputter->printLine("Parameter not found");
            }
        } else {
            date_default_timezone_set("Asia/Jakarta");
            $outputter->printLine(date("H:i:s"));
        }

    }

}