<?php

namespace Tanks\Game;


use Tanks\Tanks\TanksComponents\Guns;
use Tanks\Tanks\Tank;
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

    public function chanceDodge(Tank $tank): bool
    {
        $speed = $tank->chassis->speed;
        $rand = rand(0, 100);

        if($speed > $rand){
            return true;
        }
        return false;
    }

    public function chanceCriticalShot(Tank $tank): float
    {
        $damage = $tank->towers->guns->power;
        $rand = rand(0,100);

        if($damage > $rand){
            return true;
        }
        return false;
    }

    private function attack($attacker, $defender): void
    {

        if($attacker->towers->turningSpeed * rand(1, 2) < $defender->towers->turningSpeed){
            var_dump("Не успел выстрелить!");
        } elseif ($this->chanceDodge($defender)){
            var_dump("Танк увернулся!");
            $attacker->towers->guns->rechargeNominal = $attacker->tower->guns->rechargeRate;
        } elseif ($attacker->towers->guns->penetration < $defender->armor){
            var_dump("Не пробил!");
            $attacker->towers->guns->rechargeNominal = $attacker->tower->guns->rechargeRate;
        } elseif ($this->chanceCriticalShot($attacker) && $attacker->towers->guns->power > $defender->health){
            var_dump("Критическое попадание!");
            $defender->health = $defender->health - $attacker->towers->guns->power * rand(2, 4);
            var_dump("Урон: {$attacker->towers->guns->power}");
            $attacker->towers->guns->rechargeNominal = $attacker->tower->guns->rechargeRate;
                if($defender->health < 0){
                    $defender->health = 0;
                    var_dump("Танк уничтожен!");
                } else {
                    var_dump("Остаток жизней: $defender->health");
                }
        } elseif ($attacker->towers->guns->penetration > $defender->armor){
            var_dump("Попадание!");
            var_dump("Урон: {$attacker->towers->guns->power}");
            $defender->health = $defender->health - $attacker->towers->guns->power;
            $attacker->towers->guns->rechargeNominal = $attacker->tower->guns->rechargeRate;
                if($defender->health < 0){
                    $defender->health = 0;
                    var_dump("Танк уничтожен!");
                } else {
                    var_dump("Остаток жизней: $defender->health");
                }
        }
    }

    public function startGame(): string
    {

        $tankFactory = new TankFactory();

        $teamA = new Team($tankFactory->creatTanks($this->count), $this->nameA);
        var_dump("Создана команда:\n{$teamA->toString()}\n{$teamA->getTypeTank()}");
        $teamB = new Team($tankFactory->creatTanks($this->count), $this->nameB);
        var_dump("Создана команда:\n{$teamB->toString()}\n{$teamB->getTypeTank()}");
        var_dump("Раунд между командами: " . $teamA->name . " и " . $teamB->name . "\n\n");

        do {
            $tankAttackA = $teamA->getRandomReadyTank();
            $tankAttackB = $teamB->getRandomReadyTank();
            $tankAttackedA = $teamA->getRandAliveTank();
            $tankAttackedB = $teamB->getRandAliveTank();

            if($tankAttackA) {
                var_dump("Атакует команда: {$teamA->name}");
                $this->attack($tankAttackA, $tankAttackedB);
            } else {
                var_dump("У команды {$teamA->name} нет заряженных танков!");
            }
            var_dump("\n\n");
            if($tankAttackB) {
            var_dump("Атакует команда: {$teamB->name}");
            $this->attack($tankAttackB, $tankAttackedA);
            } else {
                var_dump("У команды {$teamB->name} нет заряженных танков!");
            }
            var_dump("\n\n");

        } while ($teamA->isTeamAlive() && $teamB->isTeamAlive());
        
        if (!$teamA->isTeamAlive() && !$teamB->isTeamAlive()) {
            var_dump("Ничья");
        } elseif ($teamA->isTeamAlive()){
            var_dump("Команда: {$teamA->name} победила!\n");
        } else {
            var_dump("Команда: {$teamB->name} победила!\n");
        }
        var_dump("Итоги боя :\n{$teamA->toString()}{$teamA->getTypeTank()}");
        var_dump("Итоги боя :\n{$teamB->toString()}{$teamB->getTypeTank()}");

        return 'end';
    }
}
