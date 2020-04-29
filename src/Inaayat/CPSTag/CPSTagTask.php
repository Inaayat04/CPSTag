<?php

namespace Inaayat\CPSTag;

use pocketmine\scheduler\Task;
use Inaayat\CPSTag\Main;

class CPSTagTask extends Task{

	private $plugin;

	public function __construct(Main $plugin){
		$this->plugin = $plugin;
	}
	
	public function onRun(int $tick):void{
		foreach($this->plugin->getServer()->getOnlinePlayers() as $players){
			$cpstag = $this->plugin->config->get("CPSTag");
			$cpstag = str_replace("{cps}", $this->plugin->getCPS($players), $cpstag);
			$cpstag = str_replace("&", "§", $cpstag);
			$players->setScoreTag($cpstag);
		}
	}
}