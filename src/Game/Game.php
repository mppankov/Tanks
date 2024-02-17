<?php

namespace Tanks\Game;

use Tanks\Factory\ArmorFactory;
use Tanks\Factory\ChassisFactory;
use Tanks\Factory\CrewFactory;
use Tanks\Factory\GunsFactory;
use Tanks\Factory\TankFactory;
use Tanks\Factory\TowersFactory;
use Tanks\Tanks\Crew\Human;
use Tanks\Tanks\Tank;
use Tanks\Tanks\Team;


class Game
{
    private int $count = 0;
    private string $nameA = '';
    private string $nameB = '';

    public function setManyPlayers(int $count): void
    {
        $this->count = $count;
    }

    public function setTeamA(string $nameA): void
    {
        $this->nameA = $nameA;
    }

    public function setTeamB(string $nameB): void
    {
        $this->nameB = $nameB;
    }

    private function attack(Tank $attacker, Tank $defender): void
    {
        $attackerCommander = $attacker->getCrewMember(Human::COMMANDER);
        $attackerGunner = $attacker->getCrewMember(Human::GUNNER);
        $attackerHelmsman = $attacker->getCrewMember(Human::HELMSMAN);

        $defenderCommander = $defender->getCrewMember(Human::COMMANDER);
        $defenderGunner = $defender->getCrewMember(Human::GUNNER);
        $defenderHelmsman = $defender->getCrewMember(Human::HELMSMAN);

        $randTankCriticalPenetration = $attacker->randTankCriticalPenetration();


        if ($attacker->chassis->speed <= $defender->chassis->speed &&
            $attackerCommander &&
            $attackerCommander->skill <= $defenderCommander->skill &&
            $defender->randChanceDodge()) {

            echo "Танк увернулся!\n";

            $attacker->tower->gun->recharge();

        } elseif ($attackerGunner &&
            $attackerGunner->skill <= $defenderGunner->skill &&
            $attackerHelmsman &&
            $attackerHelmsman->skill <= $defenderHelmsman->skill &&
            !$attacker->randChanceShot()) {

            echo "Не успел выстрелить!\n";

        } elseif ($attacker->tower->gun->penetration <= $defender->armor->armor &&
            !$randTankCriticalPenetration) {

            echo "Не пробил!\n";

            $defender->damageCrewWithoutPenetration();
            $defender->damageTankWithoutPenetration();
            $defender->tankRestoration();
            $attacker->tower->gun->recharge();

        } elseif ($attacker->tower->gun->penetration <= $defender->armor->armor &&
            $attackerHelmsman &&
            $randTankCriticalPenetration){

            echo "Критическое попадание!\n";

            $defender->damageCrewWithCriticalHit();
            $defender->damageTankWithPenetration($attacker->tankShotCriticalPower());
            $defender->tankRestoration();
            $attacker->tower->gun->recharge();

        } else {

            echo "Попадание!\n";

            $defender->damageCrewWithPenetration();
            $defender->damageTankWithPenetration($attacker->tower->gun->power);
            $defender->tankRestoration();
            $attacker->tower->gun->recharge();
        }
    }

    public function startGame(): string
    {
        $crewFactory = new CrewFactory();
        $armorFactory = new ArmorFactory();
        $chassisFactory = new ChassisFactory();
        $gunsFactory = new GunsFactory();
        $towersFactory = new TowersFactory($gunsFactory);
        $tankFactory = new TankFactory($crewFactory, $armorFactory, $chassisFactory, $towersFactory);

        $teamA = new Team($tankFactory->createTanks($this->count), $this->nameA);

        echo "Создана команда:\n{$teamA->toString()}\n{$teamA->getTypeTanks()}\n";

        $teamB = new Team($tankFactory->createTanks($this->count), $this->nameB);

        echo "Создана команда:\n{$teamB->toString()}\n{$teamB->getTypeTanks()}\n";

        echo "Раунд между командами: " . $teamA->name . " и " . $teamB->name . "\n\n";

        do {
            $teamA->chargingTanks();
            $teamB->chargingTanks();
            $teamA->treatmentCrew();
            $teamB->treatmentCrew();
            $tankAttackA = $teamA->getRandomReadyTank();
            $tankAttackB = $teamB->getRandomReadyTank();
            $tankAttackedA = $teamA->getRandAliveTank();
            $tankAttackedB = $teamB->getRandAliveTank();

            if ($tankAttackA) {

                echo "Атакует команда: {$teamA->name}\n";

                $this->attack($tankAttackA, $tankAttackedB);

            } else {

                echo "У команды {$teamA->name} нет боеспособных танков!";
            }

            echo "\n\n";

            if ($tankAttackB) {

                echo "Атакует команда: {$teamB->name}\n";

                $this->attack($tankAttackB, $tankAttackedA);

            } else {

                echo "У команды {$teamB->name} нет боеспособных танков!";
            }
            echo "\n\n";

        } while ($teamA->isTanksAlive() && $teamB->isTanksAlive());


        if (!$teamA->isTanksAlive() && !$teamB->isTanksAlive()) {

            echo "Ничья\n\n";

        } elseif ($teamA->isTanksAlive()) {

            echo "Команда: {$teamA->name} победила!\n\n";

        } else {

            echo "Команда: {$teamB->name} победила!\n\n";
        }

        echo "Итоги боя :\n\n{$teamA->toString()}\n{$teamA->getTypeTanks()}\n";
        echo "Итоги боя :\n\n{$teamB->toString()}\n{$teamB->getTypeTanks()}\n";

        return 'end';
    }
}
