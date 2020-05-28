<?php

namespace xtakumatutix\shopui\Form\type;

use pocketmine\form\Form;
use pocketmine\Player;
use xtakumatutix\shopui\Form\buysellForm;

Class BrickForm implements Form
{
    public function handleResponse(Player $player, $data): void
    {
        if ($data === null) {
            return;
        }

        switch ($data) {
            case 0:
            $id = 45;
            $damage = 0;
            $buy = 25;
            $sell = 15;
            $player->sendForm(new buysellForm($id, $damage, $buy, $sell));
            break;

            case 1:
            $id = 98;
            $damage = 0;
            $buy = 25;
            $sell = 15;
            $player->sendForm(new buysellForm($id, $damage, $buy, $sell));
            break;

            case 2:
            $id = 98;
            $damage = 1;
            $buy = 25;
            $sell = 15;
            $player->sendForm(new buysellForm($id, $damage, $buy, $sell));
            break;

            case 3:
            $id = 98;
            $damage = 2;
            $buy = 25;
            $sell = 15;
            $player->sendForm(new buysellForm($id, $damage, $buy, $sell));
            break;

            case 4:
            $id = 98;
            $damage = 3;
            $buy = 17;
            $sell = 12;
            $player->sendForm(new buysellForm($id, $damage, $buy, $sell));
            break;

            case 5:
            $id = 206;
            $damage = 0;
            $buy = 55;
            $sell = 38;
            $player->sendForm(new buysellForm($id, $damage, $buy, $sell));
            break;

            case 6:
            $id = 168;
            $damage = 2;
            $buy = 34;
            $sell = 24;
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
                    'text' => 'レンガ'
                ],
                [
                    'text' => '石レンガ' 
                ],
                [
                    'text' => '苔の生えた石レンガ'
                ],
                [
                    'text' => 'ひび割れた石レンガ'
                ],
                [
                    'text' => '模様入り石レンガ'
                ],
                [
                    'text' => 'エンドストーンレンガ'
                ],
                [
                    'text' => '海晶レンガ'
                ]
            ],
        ];
    }
}