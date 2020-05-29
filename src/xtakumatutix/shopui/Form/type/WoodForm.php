<?php

namespace xtakumatutix\shopui\Form\type;

use pocketmine\form\Form;
use pocketmine\Player;
use xtakumatutix\shopui\Form\buysellForm;
use xtakumatutix\shopui\Form\MainForm;

Class WoodForm implements Form
{
    public function handleResponse(Player $player, $data): void
    {
        if ($data === null) {
            return;
        }

        switch ($data) {
            case 0:
            $player->sendForm(new MainForm());
            break;

            case 1:
            $id = 17;
            $damage = 0;
            $buy = 15;
            $sell = 10;
            $player->sendForm(new buysellForm($id, $damage, $buy, $sell));
            break;

            case 2:
            $id = 17;
            $damage = 1;
            $buy = 15;
            $sell = 10;
            $player->sendForm(new buysellForm($id, $damage, $buy, $sell));
            break;

            case 3:
            $id = 17;
            $damage = 2;
            $buy = 15;
            $sell = 10;
            $player->sendForm(new buysellForm($id, $damage, $buy, $sell));
            break;

            case 4:
            $id = 17;
            $damage = 3;
            $buy = 15;
            $sell = 10;
            $player->sendForm(new buysellForm($id, $damage, $buy, $sell));
            break;

            case 5:
            $id = 17;
            $damage = 4;
            $buy = 15;
            $sell = 10;
            $player->sendForm(new buysellForm($id, $damage, $buy, $sell));
            break;

            case 6:
            $id = 162;
            $damage = 0;
            $buy = 15;
            $sell = 10;
            $player->sendForm(new buysellForm($id, $damage, $buy, $sell));
            break;

            case 7:
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
            'content' => '選択してください (購入値段/売却値段)',
            'buttons' => [
                [
                    'text' => '§c戻る'
                ],
                [
                    'text' => 'オークの木 (15/10)'
                ],
                [
                    'text' => '松の木 (15/10)' 
                ],
                [
                    'text' => '白樺の木 (15/10)'
                ],
                [
                    'text' => 'ジャングルの木 (15/10)'
                ],
                [
                    'text' => 'アカシアの木 (15/10)'
                ],
                [
                    'text' => 'ダークオークの木 (15/10)'
                ]
            ],
        ];
    }
}