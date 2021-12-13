<?php // As always when you start a PHP file

namespace J0k3rrWild\PlayerParticle; // Use the same namespace as in your first file but add a \tasks who symbolise that this file is in the subfolder "tasks"

use pocketmine\scheduler\Task; // This is the class that your task will extends to be a plugin task
use J0k3rrWild\PlayerParticle\Main; // This will allow us to use our main class. It is a required argument for a plugin task.
use pocketmine\level\particle\FloatingTextParticle; 
use pocketmine\level\Level;
use pocketmine\math\Vector3;



class Schelud extends Task{ // Remember that your task must have the same name as your file !

// First we need a __construct function which is used when you create a class to set default variables, ect...
    public function __construct(Main $plugin, $player){ // The arguments you define here depends on what do you want to do exept for your base.
       $this->plugin = $plugin; //You can retrieve your main class at anytime and use it's methods on your class by using $this->getOwner()
       $this->player = $player; // So we can retreive the player for later.
       
    } 


    public function onRun(int $tick){ 
        
        $colors = array_rand($this->plugin->colors);
        $level = $this->player->getLevel();
        $x = round($this->player->getX());
        $y = round($this->player->getY());
        $z = round($this->player->getZ());
        // $particlee = $player->getLevel()->addParticle(new FloatingTextParticle($player, TF::GREEN."MeetMate"));
        $this->plugin->particle = new FloatingTextParticle(new Vector3($x, $y, $z), "§{$colors}MeetMate");
        $this->player->getLevel()->addParticle($this->plugin->particle);
       
        $task = new ScheludRemove($this, $this->plugin->particle, $level); 
        $this->plugin->getScheduler()->scheduleDelayedTask($task, 1*20);
    }

}