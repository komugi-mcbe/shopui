<?php

namespace xtakumatutix\shopui\Form\type;

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

            case 1:
            $id = 17;
            $damage = 1;
            $buy = 15;
            $sell = 10;
            $player->sendForm(new buysellForm($id, $damage, $buy, $sell));
            break;

            case 2:
            $id = 17;
            $damage = 2;
            $buy = 15;
            $sell = 10;
            $player->sendForm(new buysellForm($id, $damage, $buy, $sell));
            break;

            case 3:
            $id = 17;
            $damage = 3;
            $buy = 15;
            $sell = 10;
            $player->sendForm(new buysellForm($id, $damage, $buy, $sell));
            break;

            case 4:
            $id = 17;
            $damage = 4;
            $buy = 15;
            $sell = 10;
            $player->sendForm(new buysellForm($id, $damage, $buy, $sell));
            break;

            case 5:
            $id = 162;
            $damage = 0;
            $buy = 15;
            $sell = 10;
            $player->sendForm(new buysellForm($id, $damage, $buy, $sell));
            break;

            case 6:
            $id = 162;
            $damage = 1;
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
                ],
                [
                    'text' => '松の木' 
                ],
                [
                    'text' => '白樺の木'
                ],
                [
                    'text' => 'ジャングルの木'
                ],
                [
                    'text' => 'アカシアの木'
                ],
                [
                    'text' => 'ダークオークの木'
                ]
            ],
        ];
    }
}