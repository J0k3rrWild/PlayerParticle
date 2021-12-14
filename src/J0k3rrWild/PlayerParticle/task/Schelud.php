<?php 

namespace J0k3rrWild\PlayerParticle\task; 

use pocketmine\scheduler\Task;
use pocketmine\level\particle\FloatingTextParticle; 
use pocketmine\level\Level;
use pocketmine\math\Vector3;
use J0k3rrWild\PlayerParticle\Main;
use J0k3rrWild\PlayerParticle\task\ScheludRemove;


class Schelud extends Task{


    public function __construct(Main $plugin, $player){ 
       $this->plugin = $plugin; 
       $this->player = $player; 
       
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