<?php

namespace xtakumatutix\shopui\Form;

use pocketmine\form\Form;
use pocketmine\Player;
use pocketmine\item\Item;
use onebone\economyapi\EconomyAPI;

Class buysellForm implements Form
{

    public function __construct($id, $damage, $buy, $sell)
    {
        $this->id = $id;
        $this->damage = $damage;
        $this->buy = $buy;
        $this->sell = $sell;
    }

    public function handleResponse(Player $player, $data): void
    {
        if ($data === null) {
            return;
        }
        $amount = $data[2];

        if($amount === null){
            $player->sendMessage("§c >> §f個数を指定してください");
        }
        if(!is_numeric($amount)){
            $player->sendMessage("§c >> §f数字で入力してください");
        }
        if($amount < 0){
            $player->sendMessage("§c >> §f整数で入力してください");
        }

        switch ($data[1]) {
            case true:
            if ($player->getInventory()->contains(Item::get($this->id,$this->damage,$amount))) {
                $player->getInventory()->removeItem(Item::get($this->id, $this->damage, $amount));
                $sellmoney = $this->sell * $amount;
                $player->sendMessage("§a >> §f".$this->id.":".$this->damage."を".$amount."個売りました(".$sellmoney."KG)");
                EconomyAPI::getInstance()->addmoney($player, $sellmoney);
            }else{
                $player->sendMessage("§c >> §f数が足りません。");
            }
            break;
            

            case false:
            if ($player->getInventory()->canAddItem(Item::get($this->id,$this->damage,$amount))) {
                $buymoney = $this->buy * $amount;
                $mymoney = EconomyAPI::getInstance()->myMoney($player->getName());
                if($mymoney > $buymoney){
                    $player->getInventory()->addItem(Item::get($this->id,$this->damage,$amount));
                    EconomyAPI::getInstance()->reduceMoney($player, $buymoney);
                    $player->sendMessage("§a >> §f".$this->id.":".$this->damage."を".$amount."個買いました (".$buymoney."KG)");
                }else{
                    $player->sendMessage("§c >> §fお金が足りません");
                }
            }else{
                $player->sendMessage("§c >> §fインベントリに入りません");
            }
        }
    }

    public function jsonSerialize()
    {
        return [
            'type' => 'custom_form',
            'title' => '③購入/売る',
            'content' => [
                [
                    'type' => 'label',
                    'text' => "{$this->id}:{$this->damage}の購入画面です"
                ],
                [
                    'type' => 'toggle',
                    'text' => '購入/売却',
                    'default' => false
                ],
                [
                    'type' => 'input',
                    'text' => '※整数で入力してください',
                    'placeholder' => '購入数/売却数',
                ]
            ]
        ];
    }
}