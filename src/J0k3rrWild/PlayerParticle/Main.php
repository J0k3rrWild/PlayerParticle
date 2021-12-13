<?php

declare(strict_types=1);

namespace J0k3rrWild\PlayerParticle;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\utils\TextFormat as TF;
use pocketmine\event\player\PlayerMoveEvent;

//Particles
use pocketmine\level\particle\EnchantParticle;
use pocketmine\level\particle\EnchantmentTableParticle;
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
use pocketmine\level\particle\InkParticle;
use pocketmine\level\particle\SporeParticle;
use pocketmine\level\particle\SmokeParticle;
use pocketmine\level\particle\SnowballPoofParticle;
use pocketmine\level\particle\RedstoneParticle;





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
      if($player->hasPermission("particle.enchanttable")){
        $player->getLevel()->addParticle(new EnchantmentTableParticle($player)); 
      
    }
      if($player->hasPermission("particle.ink")){
        $player->getLevel()->addParticle(new InkParticle($player)); 
      
    }
      if($player->hasPermission("particle.spore")){
        $player->getLevel()->addParticle(new SporeParticle($player)); 
      
    }
      if($player->hasPermission("particle.smoke")){
        $player->getLevel()->addParticle(new SmokeParticle($player)); 
      
    } 
      if($player->hasPermission("particle.snowball")){
        $player->getLevel()->addParticle(new SnowballPoofParticle($player)); 
      
    } 
      if($player->hasPermission("particle.redstone")){
        $player->getLevel()->addParticle(new RedstoneParticle($player)); 
      
    } 

    }



}
