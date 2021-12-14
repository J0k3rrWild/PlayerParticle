<?php

namespace J0k3rrWild\PlayerParticle\task; 
use pocketmine\scheduler\Task; 
use J0k3rrWild\PlayerParticle\task\Schelud;
use J0k3rrWild\PlayerParticle\Main;
use pocketmine\level\particle\FloatingTextParticle; 
use pocketmine\level\Level;


class ScheludRemove extends Task{


    public function __construct(Schelud $plugin, $part, Level $level){ 
       $this->level = $level;
       $this->part = $part;
    } 


    public function onRun(int $tick){ 
        $this->part->setInvisible(true);
        $this->level->addParticle($this->part);
        
    }

}