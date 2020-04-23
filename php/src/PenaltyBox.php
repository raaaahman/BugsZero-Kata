<?php


namespace Game;


class PenaltyBox
{
    private $isGettingOutOfPenaltyBox;

    public function rollInPenaltyBox($roll, $game)
    {
        if ($roll % 2 != 0) {
            $this->isGettingOutOfPenaltyBox = true;

            echoln($game->players[$game->currentPlayer] . " is getting out of the penalty box");
            $game->places[$game->currentPlayer] = $game->places[$game->currentPlayer] + $roll;
            if ($game->places[$game->currentPlayer] > 11) $game->places[$game->currentPlayer] = $game->places[$game->currentPlayer] - 12;

            echoln($game->players[$game->currentPlayer]
                . "'s new location is "
                . $game->places[$game->currentPlayer]);
            echoln("The category is " . $game->currentCategory());
            $game->askQuestion();
        } else {
            echoln($game->players[$game->currentPlayer] . " is not getting out of the penalty box");
            $this->isGettingOutOfPenaltyBox = false;
        }
    }

    public function wasCorrectlyAnsweredPenaltyBox($game)
    {
        if ($this->isGettingOutOfPenaltyBox) {
            echoln("Answer was correct!!!!");
            $game->purses[$game->currentPlayer]++;
            echoln($game->players[$game->currentPlayer]
                . " now has "
                . $game->purses[$game->currentPlayer]
                . " Gold Coins.");

            $winner = $game->didPlayerWin();
            $game->currentPlayer++;
            if ($game->currentPlayer == count($game->players)) $game->currentPlayer = 0;

            return $winner;
        } else {
            $game->currentPlayer++;
            if ($game->currentPlayer == count($game->players)) $game->currentPlayer = 0;
            return true;
        }
    }
}