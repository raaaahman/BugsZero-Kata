<?php


namespace Game;


class PenaltyBox
{
    private $isGettingOutOfPenaltyBox;

    public function isGettingOutOfPenaltyBox()
    {
        return $this->isGettingOutOfPenaltyBox;
    }

    public function getOutOfPenaltyBox($isGettingOutOfPenaltyBox)
    {
        $this->isGettingOutOfPenaltyBox = $isGettingOutOfPenaltyBox;
    }
}