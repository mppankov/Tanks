<?php

namespace Tanks\Game;

use Tanks\Factory\TankFactory;
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
        $shot = $attacker->tower->gun->power;
        $randShot = $attacker->tower->gun->power * rand(2, 3);
        $randCriticalPenetration = $attacker->tower->gun->penetration >= rand(1, 60);
        $steeringSpeed = $defender->chassis->speed >= rand(1, 100);

        $helmsmanSkill = $this->skillHelmsman >= rand(1, 100);
        $gunnerSkill = $this->skillGunner >= rand(1, 100);
        $commander = $attacker->getCrewMember(Human::COMMANDER);



        if ($steeringSpeed && $commander && $commander->skill >= rand(0, 100)) {
            echo "Танк увернулся!\n";
            $attacker->tower->gun->recharge();

        } elseif ($attacker->tower->turningSpeed <= $defender->tower->turningSpeed &&
                  !$gunnerSkill) {
            echo "Не успел выстрелить!\n";

        } elseif (($attacker->tower->turningSpeed <= $defender->tower->turningSpeed &&
                $gunnerSkill) || ($attacker->tower->turningSpeed > $defender->tower->turningSpeed)) {
            if($gunnerSkill){
                echo "Наводчик молодец!";
            }
            if ($attacker->tower->gun->penetration <= $defender->armor->armor &&
                !$randCriticalPenetration) {
                echo "Не пробил!\n";
                $attacker->tower->gun->recharge();

            } elseif (($attacker->tower->gun->penetration <= $defender->armor->armor &&
                    $randCriticalPenetration) || $attacker->tower->gun->penetration > $defender->armor->armor) {
                if ($randCriticalPenetration) {
                    echo "Критическое пробитие!\n";
                } else {
                    echo "Пробитие!\n";
                }
                    if($helmsmanSkill){
                        $defender->health = $defender->health - $randShot;
                        echo "Критический урон: {$randShot}\n";
                    } else {
                        $defender->health = $defender->health - $shot;
                        echo "Урон: {$shot}\n";
                    }
                $attacker->tower->gun->recharge();

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

        $teamA = new Team($tankFactory->createTanks($this->count), $this->nameA);
        echo "Создана команда:\n{$teamA->toString()}\n{$teamA->getTypeTank()}";
        $teamB = new Team($tankFactory->createTanks($this->count), $this->nameB);
        echo "Создана команда:\n{$teamB->toString()}\n{$teamB->getTypeTank()}";
        echo "Раунд между командами: " . $teamA->name . " и " . $teamB->name . "\n\n";

        do {
            $teamA->chargingTanks();
            $teamB->chargingTanks();
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

        } while ($teamA->isTanksAlive() && $teamB->isTanksAlive());
        
        if ((!$teamA->isTanksAlive() || !$teamA->isCrewAlive()) &&
            (!$teamB->isTanksAlive() || !$teamB->isCrewAlive())) {
            echo "Ничья\n\n";
        } elseif ($teamA->isTanksAlive()){
            echo "Команда: {$teamA->name} победила!\n\n";
        } else {
            echo "Команда: {$teamB->name} победила!\n\n";
        }
        echo "Итоги боя :\n\n{$teamA->toString()}{$teamA->getTypeTank()}";
        echo "Итоги боя :\n\n{$teamB->toString()}{$teamB->getTypeTank()}";

        return 'end';
    }
}
