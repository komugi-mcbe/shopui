<?php

namespace xtakumatutix\shopui\Form;

use pocketmine\form\Form;
use pocketmine\Player;
use onebone\economyapi\EconomyAPI;
use xtakumatutix\shopui\Form\type\WoodForm;
use xtakumatutix\shopui\Form\type\StoneForm;
use xtakumatutix\shopui\Form\type\BrickForm;


Class MainForm implements Form
{
    public function handleResponse(Player $player, $data): void
    {
        if ($data === null) {
            return;
        }

        switch ($data) {
            case 1:
            $player->sendForm(new WoodForm());
            break;

            case 2:
            $player->sendForm(new StoneForm());
            break;

            case 3:
            $player->sendForm(new BrickForm());
            break;
        }
    }

    public function jsonSerialize()
    {
        return [
            'type' => 'form',
            'title' => '①種類選択',
            'content' => '購入/売却したい種類を選んで下さい',
            'buttons' => [
                [
                  'text' => '閉じる'
                ],
                [
                    'text' => '木類'
                ],
                [
                  'text' => '石類'
                ],
                [
                  'text' => 'レンガ類'
                ]
            ],
        ];
    }
}