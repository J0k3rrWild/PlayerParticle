<?php

declare(strict_types=1);

namespace J0k3rrWild\PlayerParticle;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\utils\TextFormat as TF;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\math\Vector3;
use pocketmine\level\Level;
use pocketmine\scheduler\Task;
use pocketmine\scheduler\TaskScheduler;
use J0k3rrWild\PlayerParticle\task\Schelud;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\utils\Config;

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
use pocketmine\level\particle\FloatingTextParticle;







class Main extends PluginBase implements Listener{

public $deco;
public $particle;
public $colors = array("0","1","2","3","4","5","6","7","8","9","a","b","c","d","e","f");
public $types = array("0","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18");


    public function onEnable() : void {
        $this->getServer()->getPluginManager()->registerEvents($this,$this);
        @mkdir($this->getDataFolder());
        @mkdir($this->getDataFolder()."players/");
        $this->getLogger()->info(TF::GREEN."[PlayerParticle] > Plugin oraz konfiguracja została załadowana pomyślnie");
       
    
    
      }
    

    public function isOP($player, $type){
      if($type === NULL){
        return true;
      }

      switch($type){
      case "0":
        $player->getLevel()->addParticle(new PortalParticle($player)); 
        return true;
      case "1":
        $player->getLevel()->addParticle(new FlameParticle($player)); 
        return true;
      case "2":
        $player->getLevel()->addParticle(new EntityFlameParticle($player)); 
        return true;
      case "3":
        $player->getLevel()->addParticle(new ExplodeParticle($player)); 
        return true;
      case "4":
        $player->getLevel()->addParticle(new WaterParticle($player)); 
        return true;
      case "5":
        $player->getLevel()->addParticle(new WaterDripParticle($player)); 
        return true;
      case "6":
        $player->getLevel()->addParticle(new LavaParticle($player)); 
        return true;
      case "7":
        $player->getLevel()->addParticle(new LavaDripParticle($player));
        return true;
      case "8":
        $player->getLevel()->addParticle(new HeartParticle($player)); 
        return true;
      case "9":
        $player->getLevel()->addParticle(new AngryVillagerParticle($player)); 
        return true;
      case "10":
        $player->getLevel()->addParticle(new HappyVillagerParticle($player)); 
        return true;
      case "11":
        $player->getLevel()->addParticle(new CriticalParticle($player));
        return true;
      case "12":
        $player->getLevel()->addParticle(new EnchantmentTableParticle($player)); 
        return true;
      case "13":
        $player->getLevel()->addParticle(new InkParticle($player)); 
        return true;
      case "14":
        $player->getLevel()->addParticle(new SporeParticle($player)); 
        return true;
      case "15":
        $player->getLevel()->addParticle(new SmokeParticle($player)); 
        return true;
      case "16":
        $player->getLevel()->addParticle(new SnowballPoofParticle($player)); 
        return true;
      case "17":
        $player->getLevel()->addParticle(new RedstoneParticle($player)); 
        return true;
      case "18":
        $task = new Schelud($this, $player); 
        $this->getScheduler()->scheduleDelayedTask($task,1*5); // Counted in ticks (1 second = 20 ticks)
        return true;


      }
      
    }
    
    public function onCommand(CommandSender $p, Command $cmd, string $label, array $args) : bool{
      if(!isset($args[0])) return false;
     
      
     
     
      switch(strtolower($args[0])){
        case "disable":
          $this->deco = new Config($this->getDataFolder()."players/". strtolower($p->getName()) . "/player.yaml", Config::YAML);
          $this->deco->get("Particle");
          $this->deco->set("Particle", false);
          $this->deco->save();
          $p->sendMessage(TF::GREEN."[MeetMate] > Pomyślnie wyłączono particlesy");
          return true;
        case "enable":
          $this->deco = new Config($this->getDataFolder()."players/". strtolower($p->getName()) . "/player.yaml", Config::YAML);
          $this->deco->get("Particle");
          $this->deco->set("Particle", true);
          $this->deco->save();
          $p->sendMessage(TF::GREEN."[MeetMate] > Pomyślnie włączono particlesy");
          return true;
        case "set":
          if($p->hasPermission("particle.set")){
            if(!isset($args[1])){
              $p->sendMessage(TF::GREEN."|--------------------[PlayerParticle]--------------------|");
              $p->sendMessage(TF::GOLD."By ustawic /pa set <numer>");
              $p->sendMessage(TF::GREEN."0 - PortalParticle");
              $p->sendMessage(TF::GREEN."1 - FlameParticle");
              $p->sendMessage(TF::GREEN."2 - EntityFlameParticle");
              $p->sendMessage(TF::GREEN."3 - ExplodeParticle");
              $p->sendMessage(TF::GREEN."4 - WaterParticle");
              $p->sendMessage(TF::GREEN."5 - WaterDripParticle");
              $p->sendMessage(TF::GREEN."6 - LavaParticle");
              $p->sendMessage(TF::GREEN."7 - LavaDripParticle");
              $p->sendMessage(TF::GREEN."8 - HeartParticle");
              $p->sendMessage(TF::GREEN."9 - AngryVillagerParticle");
              $p->sendMessage(TF::GREEN."10 - HappyVillagerParticle");
              $p->sendMessage(TF::GREEN."11 - CriticalParticle");
              $p->sendMessage(TF::GREEN."12 - EnchantTableParticle");
              $p->sendMessage(TF::GREEN."13 - InkParticle");
              $p->sendMessage(TF::GREEN."14 - SporeParticle");
              $p->sendMessage(TF::GREEN."15 - SmokeParticle");
              $p->sendMessage(TF::GREEN."16 - SnowballParticle");
              $p->sendMessage(TF::GREEN."17 - RedstoneParticle");
              $p->sendMessage(TF::GREEN."18 - ZajebistyFloatingTextParticle [MeetMate rainbow]");
              return true;
            }
            $this->deco = new Config($this->getDataFolder()."players/". strtolower($p->getName()) . "/player.yaml", Config::YAML);
            if(in_array($args[1], $this->types)){
              $this->deco->get("Type");
              $this->deco->set("Type", $args[1]);
              $this->deco->save();
              $p->sendMessage(TF::GREEN."[MeetMate] > Pomyślnie ustawiono particlesy o numerze ".$args[1]);
            }else{
              $p->sendMessage(TF::RED."[MeetMate] > Niepoprawne particlesy, wpisz /pa set by zobaczyć liste");
            }
          }else{
            $p->sendMessage(TF::RED."[MeetMate] > Ta funkcja jest zarezerwowana tylko dla operatorów");
          }
      }
      return true;
    }

    public function onJoinNew(PlayerJoinEvent $p){
      // var_dump($this->getDataFolder()."players/".$p->getPlayer()->getName());
      if(!is_dir($this->getDataFolder()."players/".strtolower($p->getPlayer()->getName()))){

          @mkdir($this->getDataFolder()."players/".strtolower($p->getPlayer()->getName()));
          $playerData = fopen($this->getDataFolder()."players/".strtolower($p->getPlayer()->getName())."/player.yaml", "w");
          $data = "Particle: true\nType: NULL";
          fwrite($playerData, $data);
          fclose($playerData);
          $this->deco = new Config($this->getDataFolder()."players/". strtolower($p->getPlayer()->getName()) . "/player.yaml", Config::YAML);
          
      }
      
  }


    public function onMove(PlayerMoveEvent $e){
      $player = $e->getPlayer();

      if($player->isOp()){
        $this->deco = new Config($this->getDataFolder()."players/". strtolower($player->getName()) . "/player.yaml", Config::YAML);
        $status = $this->deco->get("Particle");
        $type = $this->deco->get("Type");
        if($status === false){
          return true;
        }else{
        $this->isOP($player, $type);
          return true;
        }
      }
      
      $this->deco = new Config($this->getDataFolder()."players/". strtolower($player->getName()) . "/player.yaml", Config::YAML);
      $status = $this->deco->get("Particle");
      if($status === false){
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
      
      if($player->hasPermission("particle.floatingtxt")){
        $task = new Schelud($this, $player); 
        $this->getScheduler()->scheduleDelayedTask($task,1*5); // Counted in ticks (1 second = 20 ticks)
      
       
      
      
      
      

      
      
  } 

    }



}
