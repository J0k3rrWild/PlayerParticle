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
use pocketmine\level\particle\EntityFlameParticle;
use pocketmine\level\particle\WaterParticle;
use pocketmine\level\particle\WaterDripParticle;
use pocketmine\level\particle\LavaParticle;
use pocketmine\level\particle\LavaDripParticle;
use pocketmine\level\particle\HeartParticle;
use pocketmine\level\particle\AngryVillagerParticle;
use pocketmine\level\particle\HappyVillagerParticle;
use pocketmine\level\particle\CriticalParticle;




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
      if($player->hasPermission("particle.entityflame")){
        $player->getLevel()->addParticle(new EntityFlameParticle($player)); 
      
    } 
      if($player->hasPermission("particle.explode")){
        $player->getLevel()->addParticle(new ExplodeParticle($player)); 
      
    }
      if($player->hasPermission("particle.water")){
        $player->getLevel()->addParticle(new WaterParticle($player)); 
      
    }
      if($player->hasPermission("particle.waterdrip")){
        $player->getLevel()->addParticle(new WaterDripParticle($player)); 
      
    }
      if($player->hasPermission("particle.lava")){
        $player->getLevel()->addParticle(new LavaParticle($player)); 
      
    }
      if($player->hasPermission("particle.lavadrip")){
        $player->getLevel()->addParticle(new LavaDripParticle($player)); 
      
    }
      if($player->hasPermission("particle.heart")){
        $player->getLevel()->addParticle(new HeartParticle($player)); 
      
    }
      if($player->hasPermission("particle.angryvillager")){
        $player->getLevel()->addParticle(new AngryVillagerParticle($player)); 
      
    }
      if($player->hasPermission("particle.happyvillager")){
        $player->getLevel()->addParticle(new HappyVillagerParticle($player)); 
      
    }
      if($player->hasPermission("particle.critical")){
        $player->getLevel()->addParticle(new CriticalParticle($player)); 
      
    }

    }



}
