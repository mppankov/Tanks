<?php

namespace Tanks\Game;

use Tanks\Factory\TankFactory;
use Tanks\Game\GameUtils\UtilsAttack;
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
        $attackerTank = new UtilsAttack($attacker);
        $defenderTank = new UtilsAttack($defender);


        $attackerCommander = $attacker->getCrewMember(Human::COMMANDER);
        $attackerGunner = $attacker->getCrewMember(Human::GUNNER);
        $attackerHelmsman = $attacker->getCrewMember(Human::HELMSMAN);
        $attackerMechanics = $attacker->getCrewMember(Human::MECHANICS);

        $defenderCommander = $defender->getCrewMember(Human::COMMANDER);
        $defenderGunner = $defender->getCrewMember(Human::GUNNER);
        $defenderHelmsman = $defender->getCrewMember(Human::HELMSMAN);
        $defenderMechanics = $defender->getCrewMember(Human::MECHANICS);

        $randTankCriticalPenetration = $attackerTank->randTankCriticalPenetration();
        $randTankShotPower = $attackerTank->randTankShotPower();


        if ($attacker->chassis->speed <= $defender->chassis->speed &&
            $attackerCommander->skill <= $defenderCommander->skill &&
            $attackerTank->randChanceDodge()) {

            echo "Танк увернулся!\n";

            $attacker->tower->gun->recharge();

        } elseif ($attackerGunner->skill <= $defenderGunner &&
                  $attackerHelmsman->skill <= $defenderHelmsman->skill &&
                  !$attackerTank->randChanceShot()) {

            echo "Не успел выстрелить!\n";

        } elseif ($attacker->tower->gun->penetration <= $defender->armor->armor &&
                  !$randTankCriticalPenetration) {

            echo "Не пробил!\n";

            $defenderTank->damageCrewWithoutPenetration();
            $defender->crewStunning();
            $attacker->tower->gun->recharge();

        } elseif (($attacker->tower->turningSpeed <= $defender->tower->turningSpeed &&
                $randTankCriticalPenetration) ||
                  $attacker->tower->turningSpeed > $defender->tower->turningSpeed) {

            if ($randTankCriticalPenetration) {

                $defender->health -= $randTankShotPower * 2;
                $defender->crewStunning();
                $attacker->tower->gun->recharge();

                echo "Критическое попадание!";
                echo "Урон: " . $randTankShotPower * 2 . "\n";

            } else {

                echo "Пробитие!\n";

                $defender->health -= $randTankShotPower;
                $defender->crewStunning();
                $attacker->tower->gun->recharge();
            }

                if($randTankShotPower > $attacker->tower->gun->power){

                    echo "Критический урон: {$randTankShotPower}\n";

                    $defenderTank->damageCrewWithCriticalHit();
                    $defender->crewStunning();
                    $attacker->tower->gun->recharge();

                } else {

                    echo "Урон: {$randTankShotPower}\n";

                    $defenderTank->damageCrewWithPenetration();
                    $defender->crewStunning();
                    $attacker->tower->gun->recharge();
            }
            $attacker->tower->gun->recharge();

        } else {

            echo "Не все условия продуманы!";
        }



        if ($defender->health <= 0) {

            $defender->health = 0;

            echo "Танк уничтожен!\n";

        } elseif (!$defender->isCrewAlive()) {

            echo "Экипаж убит!";

        } else {

            echo "Остаток жизней: {$defender->health}\n";
        }
    }

    public function startGame(): string
    {
        $tankFactory = new TankFactory();

        $teamA = new Team($tankFactory->createTanks($this->count), $this->nameA);

            echo "Создана команда:\n{$teamA->toString()}\n{$teamA->getTypeTank()}\n";

        $teamB = new Team($tankFactory->createTanks($this->count), $this->nameB);

            echo "Создана команда:\n{$teamB->toString()}\n{$teamB->getTypeTank()}\n";

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

            if($tankAttackA) {

                echo "Атакует команда: {$teamA->name}\n";

                $this->attack($tankAttackA, $tankAttackedB);

            } else {

                echo "У команды {$teamA->name} нет боеспособных танков!";
            }

            echo "\n\n";

            if($tankAttackB) {

                echo "Атакует команда: {$teamB->name}\n";

            $this->attack($tankAttackB, $tankAttackedA);

            } else {

                echo "У команды {$teamB->name} нет боеспособных танков!";
            }
            echo "\n\n";

        } while ($teamA->isTanksAlive() && $teamB->isTanksAlive());
        
            if (!$teamA->isTanksAlive() && !$teamB->isTanksAlive()) {

                echo "Ничья\n\n";

            } elseif ($teamA->isTanksAlive()){

                echo "Команда: {$teamA->name} победила!\n\n";

            } else {

               echo "Команда: {$teamB->name} победила!\n\n";
        }

        echo "Итоги боя :\n\n{$teamA->toString()}\n{$teamA->getTypeTank()}\n";
        echo "Итоги боя :\n\n{$teamB->toString()}\n{$teamB->getTypeTank()}\n";

        return 'end';
    }
}
