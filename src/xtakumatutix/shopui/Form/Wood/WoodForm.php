<?php

namespace xtakumatutix\shopui\Form\Wood;

use pocketmine\form\Form;
use pocketmine\Player;
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
            $buy = 15;
            $sell = 10;
            $player->sendForm(new buysellForm($id, $damage, $buy, $sell));
            break;
        }
    }

    public function jsonSerialize()
    {
        return [
            'type' => 'form',
            'title' => '②木類',
            'content' => '選択してください',
            'buttons' => [
                [
                    'text' => 'オークの木'
                ]
            ],
        ];
    }
}