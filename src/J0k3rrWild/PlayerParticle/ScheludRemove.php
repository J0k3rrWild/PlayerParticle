<?php // As always when you start a PHP file

namespace J0k3rrWild\PlayerParticle; // Use the same namespace as in your first file but add a \tasks who symbolise that this file is in the subfolder "tasks"

use pocketmine\scheduler\Task; // This is the class that your task will extends to be a plugin task
use J0k3rrWild\PlayerParticle\Schelud;
use J0k3rrWild\PlayerParticle\Main; // This will allow us to use our main class. It is a required argument for a plugin task.
use pocketmine\level\particle\FloatingTextParticle; 
use pocketmine\level\Level;


class ScheludRemove extends Task{ // Remember that your task must have the same name as your file !

// First we need a __construct function which is used when you create a class to set default variables, ect...
    public function __construct(Schelud $plugin, $part, Level $level){ // The arguments you define here depends on what do you want to do exept for your base.
       $this->plugin = $plugin; //You can retrieve your main class at anytime and use it's methods on your class by using $this->getOwner()
       $this->part = $part; // So we can retreive the player for later.
       $this->level = $level;
    } 


    public function onRun(int $tick){ 
        $this->part->setInvisible(true);
        $this->level->addParticle($this->part);
        
    }

}