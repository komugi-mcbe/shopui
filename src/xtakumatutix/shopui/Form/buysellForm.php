<?php

namespace xtakumatutix\shopui\Form;

use pocketmine\form\Form;
use pocketmine\Player;
use onebone\economyapi\EconomyAPI;
use xtakumatutix\shopui\Form\Wood;

Class buysellForm implements Form
{
    public function handleResponse(Player $player, $data, $id, $damage, $buy, $sell): void
    {
        if ($data === null) {
            return;
        }

        switch ($data) {
            case 0:
            $player->sendMessage($id.$damage);
            break;
        }
    }

    public function jsonSerialize($buy, $sell)
    {
        return [
            'type' => 'custom_form',
            'title' => '購入/売る',
            'content' => "売る数と買う数を入力してください\n買う値段:".$buy."売る値段:".$sell,
            'buttons' => [
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
            ],
        ];
    }
}