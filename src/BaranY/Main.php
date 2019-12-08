<?php

/*
* ____                     __   __
*| __ )  __ _ _ __ __ _ _ _\ \ / /
*|  _ \ / _` | '__/ _` | '_ \ V /
*| |_) | (_| | | | (_| | | | | |
*|____/ \__,_|_|  \__,_|_| |_|_|
*
* It is forbidden to use the plugin without paying the license fee.
* If it is changed and sold without permission, legal procedures will be applied.
*
* @author BaranY (TheNamless05)
* @version 1.0
* @api 4.0.0+dev
* @since 16.06.19
* Plugin Language: Turkish
*
*/


namespace BaranY;

use pocketmine\plugin\PluginBase;
use pocketmine\{Player, Server};
use pocketmine\utils\MainLogger;
use pocketmine\utils\Config;

class Main extends PluginBase{
	
	/** @var Config */
	public $cfg;
	
	public function onEnable(): void{
		MainLogger::getLogger()->info("Plugin Aktif Coding By BaranY");
		@mkdir($this->getDataFolder());
		$this->saveResource("config.yml");
		@mkdir($this->getDataFolder());
		$this->cfg = new Config($this->getDataFolder()."config.yml", Config::YAML);
		$time = $this->cfg->get("time-setting");
		$this->getScheduler()->scheduleRepeatingTask(new MainTask(), 20 * $time);
		}
	public function onDisable(): void{
	MainLogger::getLogger()->info("Plugin De-Aktif Coding By BaranY");
	}
}