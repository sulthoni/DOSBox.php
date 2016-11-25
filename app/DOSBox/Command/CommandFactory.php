<?php

namespace DOSBox\Command;

use DOSBox\Interfaces\IDrive;
use DOSBox\Command\Library\CmdCd as CmdCd;
use DOSBox\Command\Library\CmdDir as CmdDir;
use DOSBox\Command\Library\CmdMkDir as CmdMkDir;
use DOSBox\Command\Library\CmdMkFile as CmdMkFile;
<<<<<<< HEAD
use DOSBox\Command\Library\CmdTime as CmdTime;
use DOSBox\Command\Library\CmdHelp as CmdHelp;
=======
use DOSBox\Command\Library\CmdVer as CmdVer;
use DOSBox\Command\Library\CmdTime as CmdTime;
>>>>>>> dec3aa05a6653e8985cc0ada2816b256b1edb2e2

class CommandFactory {
    private $commands = array();

    public function __construct(IDrive $drive){
        array_push($this->commands, new CmdDir("dir", $drive));
        array_push($this->commands, new CmdCd("cd", $drive));
        array_push($this->commands, new CmdCd("chdir", $drive));
        array_push($this->commands, new CmdMkDir("mkdir", $drive));
        array_push($this->commands, new CmdMkDir("md", $drive));
        array_push($this->commands, new CmdMkFile("mkfile", $drive));
        array_push($this->commands, new CmdMkFile("mf", $drive));
        array_push($this->commands, new CmdTime("time", $drive));
        array_push($this->commands, new CmdVer("ver", $drive));


        // Add your commands here
        array_push($this->commands, new CmdTime("time", $drive));
        array_push($this->commands, new CmdHelp("help", $drive));
    }

    public function getCommands(){
        return $this->commands;
    }
}
