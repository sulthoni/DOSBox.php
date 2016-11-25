<<<<<<< HEAD
Skip to content
This repository
Search
Pull requests
Issues
Gist
 @purbo82
 Watch 0
  Star 0
  Fork 5 sulthoni/DOSBox.php
forked from jpartogi/DOSBox.php
 Code  Pull requests 0  Projects 0  Wiki  Pulse  Graphs
Branch: master Find file Copy pathDOSBox.php/app/DOSBox/Command/Library/CmdVer.php
d93b3b5  19 minutes ago
@parmiyanto parmiyanto dari joko
1 contributor
RawBlameHistory     
45 lines (35 sloc)  1.35 KB
<?php
namespace DOSBox\Command\Library;
=======
<?php

namespace DOSBox\Command\Library;

>>>>>>> dec3aa05a6653e8985cc0ada2816b256b1edb2e2
use DOSBox\Interfaces\IDrive;
use DOSBox\Interfaces\IOutputter;
//use DOSBOx\Filesystem\Directory;
use DOSBox\Command\BaseCommand as Command;
<<<<<<< HEAD
class CmdVer extends Command {
    private $variasi;
    public function __construct($commandName, IDrive $drive){
        parent::__construct($commandName, $drive);
    }
    public function checkNumberOfParameters($numberOfParametersEntered) {
        return ($numberOfParametersEntered == 0 || $numberOfParametersEntered == 1);
    }
=======

class CmdVer extends Command {
    private $variasi;

    public function __construct($commandName, IDrive $drive){
        parent::__construct($commandName, $drive);
    }

    public function checkNumberOfParameters($numberOfParametersEntered) {
        return ($numberOfParametersEntered == 0 || $numberOfParametersEntered == 1);
    }

>>>>>>> dec3aa05a6653e8985cc0ada2816b256b1edb2e2
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
<<<<<<< HEAD
=======

>>>>>>> dec3aa05a6653e8985cc0ada2816b256b1edb2e2
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
    
<<<<<<< HEAD
}
Contact GitHub API Training Shop Blog About
© 2016 GitHub, Inc. Terms Privacy Security Status Help
=======
}
>>>>>>> dec3aa05a6653e8985cc0ada2816b256b1edb2e2
