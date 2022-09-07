<?php

declare(strict_types = 1);

namespace skymin\FrozenEffect;

use pocketmine\player\Player;
use pocketmine\network\mcpe\protocol\SetActorDataPacket;
use pocketmine\network\mcpe\protocol\types\entity\FloatMetadataProperty;

final class FrozenEffect{

	public const FROZEN_EFFECT = 121;

	private function __construct(){
		//NOOP
	}

	public static function sendFrozenEffectScreen(Player $player, float $persent = 1.0) : void{
		$player->getNetworkSession()->sendDataPacket(
			SetActorDataPacket::create(
				$player->getId(),
				[self::FROZEN_EFFECT => new FloatMetadataProperty($persent)],
				0
			)
		);
	}

}