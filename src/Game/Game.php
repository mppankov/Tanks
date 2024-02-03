<?php

namespace Tanks\Game;

use Tanks\Tanks\Team;
use Tanks\Factory\TankFactory;


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

    private function attack($attacker, $defender): void
    {
        $shot = $attacker->towers->guns->power;
        $randCriticalShot = $attacker->towers->guns->power >= rand(1, 100);
        $randShot = $attacker->towers->guns->power * rand(2, 3);
        $randCriticalPenetration = $attacker->towers->guns->penetration >= rand(1, 60);
        $gunnerSpeed = $attacker->towers->turningSpeed >= rand(1, 40);
        $steeringSpeed = $defender->chassis->speed >= rand(1, 200);

        if ($steeringSpeed) {
            echo "Танк увернулся!\n";
            $attacker->towers->guns->recharge();

        } elseif ($attacker->towers->turningSpeed <= $defender->towers->turningSpeed &&
                  !$gunnerSpeed) {
            echo "Не успел выстрелить!\n";

        } elseif (($attacker->towers->turningSpeed <= $defender->towers->turningSpeed &&
                  $gunnerSpeed) || ($attacker->towers->turningSpeed > $defender->towers->turningSpeed)) {

            if ($attacker->towers->guns->penetration <= $defender->armor->armor &&
                !$randCriticalPenetration) {
                echo "Не пробил!\n";
                $attacker->towers->guns->recharge();

            } elseif (($attacker->towers->guns->penetration <= $defender->armor->armor &&
                    $randCriticalPenetration) || $attacker->towers->guns->penetration > $defender->armor->armor) {
                if ($randCriticalPenetration) {
                    echo "Критическое пробитие!\n";
                } else {
                    echo "Пробитие!\n";
                }
                    if($randCriticalShot){
                        $defender->health = $defender->health - $randShot;
                        echo "Критический урон: {$randShot}\n";
                    } else {
                        $defender->health = $defender->health - $shot;
                        echo "Урон: {$shot}\n";
                    }
                $attacker->towers->guns->recharge();

            } else {
                echo "Не все условия продуманы!";
            }

            if ($defender->health <= 0) {
                $defender->health = 0;
                echo "Танк уничтожен!\n";
            } else {
                echo "Остаток жизней: $defender->health\n";
            }
        }
    }

    public function startGame(): string
    {

        $tankFactory = new TankFactory();

        $teamA = new Team($tankFactory->creatTanks($this->count), $this->nameA);
        echo "Создана команда:\n{$teamA->toString()}\n{$teamA->getTypeTank()}";
        $teamB = new Team($tankFactory->creatTanks($this->count), $this->nameB);
        echo "Создана команда:\n{$teamB->toString()}\n{$teamB->getTypeTank()}";
        echo "Раунд между командами: " . $teamA->name . " и " . $teamB->name . "\n\n";

        do {
            $teamA->chargingTeam();
            $teamB->chargingTeam();
            $tankAttackA = $teamA->getRandomReadyTank();
            $tankAttackB = $teamB->getRandomReadyTank();
            $tankAttackedA = $teamA->getRandAliveTank();
            $tankAttackedB = $teamB->getRandAliveTank();

            if($tankAttackA) {
                echo "Атакует команда: {$teamA->name}\n";
                $this->attack($tankAttackA, $tankAttackedB);
            } else {
                echo "У команды {$teamA->name} нет заряженных танков!";
            }
            echo "\n\n";
            if($tankAttackB) {
                echo "Атакует команда: {$teamB->name}\n";
            $this->attack($tankAttackB, $tankAttackedA);
            } else {
                echo "У команды {$teamB->name} нет заряженных танков!";
            }
            echo "\n\n";

        } while ($teamA->isTeamAlive() && $teamB->isTeamAlive());
        
        if (!$teamA->isTeamAlive() && !$teamB->isTeamAlive()) {
            echo "Ничья";
        } elseif ($teamA->isTeamAlive()){
            echo "Команда: {$teamA->name} победила!\n\n";
        } else {
            echo "Команда: {$teamB->name} победила!\n\n";
        }
        echo "Итоги боя :\n\n{$teamA->toString()}{$teamA->getTypeTank()}";
        echo "Итоги боя :\n\n{$teamB->toString()}{$teamB->getTypeTank()}";

        return 'end';
    }
}
