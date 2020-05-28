<?php

namespace xtakumatutix\shopui;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use xtakumatutix\shopui\Form\MainForm;

Class Main extends PluginBase
{
    public function onEnable()
    {
        $this->getLogger()->notice("読み込み完了 - ver." . $this->getDescription()->getVersion());
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool
    {
        if(!($sender instanceof Player)){
            return true;
        }
        $sender->sendForm(new MainForm());
        return true;
    }
}