<?php

namespace xtakumatutix\shopui\Form\Wood;

use pocketmine\form\Form;
use pocketmine\Player;
use onebone\economyapi\EconomyAPI;
use xtakumatutix\shopui\Form\buysellForm;

Class WoodForm implements Form
{
    public function handleResponse(Player $player, $data): void
    {
        if ($data === null) {
            return;
        }

        switch ($data) {
            case 0:
            $id = 17;
            $damage = 0;
            $buy = 1;
            $sell = 1;
            $player->sendForm(new buysellForm($id, $damage, $buy, $sell));
            break;
        }
    }

    public function jsonSerialize()
    {
        return [
            'type' => 'form',
            'title' => 'リアクション',
            'content' => 'ボタンを押してリアクションしましょう',
            'buttons' => [
                [
                    'text' => 'オーク'
                ]
            ],
        ];
    }
}