<?php

namespace mppankov\tanks\Game;


use mppankov\tanks\Objects\Team;
use mppankov\tanks\Factory\TankFactory;


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
        $damageRandom = $attacker->getDamageWithRandom();
        $chanceDodge = $defender->getChanceDodge();
        $dynamicProtection = $defender->getDynamicProtection();

        if($chanceDodge === true) {
            var_dump("Танк увернулся!");
            $attacker->rechargeStatus = $attacker->timeRecharge;
       // } elseif($dynamicProtection === true && $damageRandom < 30) {
            var_dump("Отработала динамическая защита!");
            $attacker->rechargeStatus = $attacker->timeRecharge;
        } elseif($defender->health > 0 && $defender->health > $damageRandom) {
         //   var_dump("Попадание!");
            $defender->health = $defender->health - $damageRandom;
            $attacker->rechargeStatus = $attacker->timeRecharge;
        } else {
           // var_dump("Критическое попадание!");
            $defender->health = 0;
            $attacker->rechargeStatus = $attacker->timeRecharge;
        }
        var_dump("Урон: {$damageRandom}\n");
        if ($defender->health == 0){
            var_dump("Танк уничтожен!");
        } else {
            var_dump("Остаток жизней: {$defender->health}");
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
            $teamA->getRecharge();
            $teamB->getRecharge();
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
