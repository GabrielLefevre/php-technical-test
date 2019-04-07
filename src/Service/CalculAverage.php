<?php
/**
 * Created by PhpStorm.
 * User: presh
 * Date: 07/04/2019
 * Time: 14:40
 */

namespace App\Service;


use App\Entity\Running;

class CalculAverage
{

    public function calculAverage(Running $running) {

        $this->calculSpeed($running);
        $this->calculPace($running);
    }

    protected function calculSpeed(Running $running) {
        $hours = $running->getDuration()->format('H') + $running->getDuration()->format('i')/60;
        $running->setSpeed(round($running->getDistance() / $hours,2));
    }

    protected function calculPace(Running $running) {
        $minutes = $running->getDuration()->format('H')*60 + $running->getDuration()->format('i');
        $running->setPace(round($running->getDistance() * $minutes,2));
    }

}