<?php

namespace xtakumatutix\shopui\Form;

use pocketmine\form\Form;
use pocketmine\Player;
use onebone\economyapi\EconomyAPI;
use xtakumatutix\shopui\Form\Wood\WoodForm;

Class MainForm implements Form
{
    public function handleResponse(Player $player, $data): void
    {
        if ($data === null) {
            return;
        }

        switch ($data) {
            case 0:
            $player->sendForm(new WoodForm());
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
                    'text' => '木類'
                ]
            ],
        ];
    }
}