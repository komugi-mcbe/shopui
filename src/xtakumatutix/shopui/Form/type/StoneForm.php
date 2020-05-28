<?php

namespace xtakumatutix\shopui\Form\type;

use pocketmine\form\Form;
use pocketmine\Player;
use xtakumatutix\shopui\Form\buysellForm;

Class StoneForm implements Form
{
    public function handleResponse(Player $player, $data): void
    {
        if ($data === null) {
            return;
        }

        switch ($data) {
            case 0:
            $id = 4;
            $damage = 0;
            $buy = 10;
            $sell = 8;
            $player->sendForm(new buysellForm($id, $damage, $buy, $sell));
            break;

            case 1:
            $id = 1;
            $damage = 0;
            $buy = 15;
            $sell = 10;
            $player->sendForm(new buysellForm($id, $damage, $buy, $sell));
            break;

            case 2:
            $id = 48;
            $damage = 0;
            $buy = 17;
            $sell = 12;
            $player->sendForm(new buysellForm($id, $damage, $buy, $sell));
            break;
        }
    }

    public function jsonSerialize()
    {
        return [
            'type' => 'form',
            'title' => '②石類',
            'content' => '選択してください',
            'buttons' => [
                [
                    'text' => '丸石'
                ],
                [
                    'text' => '石' 
                ],
                [
                    'text' => '苔の生えた石'
                ]
            ],
        ];
    }
}