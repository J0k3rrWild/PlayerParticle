<?php

declare(strict_types=1);

namespace J0k3rrWild\PlayerParticle;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\utils\TextFormat as TF;

//Particles
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\level\particle\EnchantParticle;
use pocketmine\level\particle\PortalParticle;
use pocketmine\level\particle\FlameParticle;
use pocketmine\level\particle\ExplodeParticle;




class Main extends PluginBase implements Listener{

    public function onEnable() : void {
        $this->getServer()->getPluginManager()->registerEvents($this,$this);
        $this->getLogger()->info(TF::GREEN."[PlayerParticle] > Plugin oraz konfiguracja została załadowana pomyślnie");
       
    }
    
    public function isOP(Player $player){
     $player->getLevel()->addParticle(new PortalParticle($player)); 
   
      
     
    }

    public function onJoin(PlayerMoveEvent $e){
      $player = $e->getPlayer();

      if($player->isOp()){
          $this->isOP($player);
          return true;
      }

      if($player->hasPermission("particle.portal")){
        $player->getLevel()->addParticle(new PortalParticle($player)); 
      
    }
      if($player->hasPermission("particle.flame")){
        $player->getLevel()->addParticle(new FlameParticle($player)); 
      
    }
      if($player->hasPermission("particle.explode")){
        $player->getLevel()->addParticle(new ExplodeParticle($player)); 
      
    }
       

    }



}
