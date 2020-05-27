<?php

namespace xtakumatutix\shopui\Form;

use pocketmine\form\Form;
use pocketmine\Player;
use onebone\economyapi\EconomyAPI;
use xtakumatutix\shopui\Form\Wood;
use pocketmine\item\Item;

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
        $amount = $data[1];
        if($amount == null){
            $player->sendMessage("個数を指定してください");
        }
        if(!is_numeric($amount)){
            $player->sendMessage("数字で入力してください");
        }
        if($amount < 0){
            $player->sendMessage("整数で入力してください");
        }

        switch ($data[0]) {
            case "true":
            if ($player->getInventory()->contains(Item::get($this->id,$this->damage,$amount))) {
                $player->getInventory()->removeItem(Item::get($this->id, $this->damage, $amount));
                $player->sendMessage($this->id."".$this->damage."を".$amount."個売りました");
                $sellmoney = $this->sell * $amount;
                EconomyAPI::getInstance()->addmoney($player, $sellmoney);
            }else{
                $player->sendMessage("売れません。");
            }
            break;

            case "false":
            if ($player->getInventory()->canAddItem(Item::get($this->id,$this->damage,$amount))) {
                $buymoney = $this->buy * $amount;
                $mymoney = EconomyAPI::getInstance()->myMoney($player->getName());
                if($mymoney > $buymoney){
                    $player->getInventory()->addItem(Item::get($this->id,$this->damage,$amount));
                    EconomyAPI::getInstance()->reduceMoney($player, $buymoney);
                }else{
                    $player->sendMessage("お金が足りません");
                }
            }else{
                $player->sendMessage("インベントリに入りません");
            }
            break;
        }
    }

    public function jsonSerialize()
    {
        return [
            'type' => 'custom_form',
            'title' => '購入/売る',
            'content' => [
                [
                    'type' => 'toggle',
                    'text' => '売るのはなにー？',
                    'default' => false
                ],
                [
                    'type' => 'input',
                    'text' => '入力',
                    'placeholder' => '売る/買う数',
                ]
            ]
        ];
    }
}