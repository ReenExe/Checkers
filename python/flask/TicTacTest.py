import unittest
# pip install unittest-data-provider
from unittest_data_provider import data_provider
from tictac import TicTacGame, TicTacPriority

class TicTacTest(unittest.TestCase):
    chooses = lambda: (('X'),('0'))

    @data_provider(chooses)
    def testGame(self, choose):
        player = TicTacGame(choose)
        self.assertEqual(player.choose, choose)

    def testBeginnerStep(self):
        player = TicTacGame('X')

        turn = player.lastSelfTurn()
        self.assertTrue(turn.value in TicTacPriority.MAP)

        turnCopy = player.lastSelfTurn()
        self.assertEqual(turnCopy, turn)

    def testPartnerStep(self):
        beginner = TicTacGame('X')
        partner = TicTacGame('0')

        turn = beginner.lastSelfTurn()

        partner.turn(turn.value);

unittest.main()