import unittest
# pip install unittest-data-provider
from unittest_data_provider import data_provider
from tictac import TicTacPlayer, TicTacPriority

class TicTacTest(unittest.TestCase):
    chooses = lambda: (('X'),('0'))

    @data_provider(chooses)
    def testGame(self, choose):
        player = TicTacPlayer(choose)
        self.assertEqual(player.choose, choose)

    def testBeginnerStep(self):
        player = TicTacPlayer('X')

        turn = player.lastSelfTurn()
        self.assertTrue(turn.value in TicTacPriority.SEQUENCE)
        self.assertTrue(turn.winner == None)

        turnCopy = player.lastSelfTurn()
        self.assertEqual(turnCopy, turn)

    def testPartnerStep(self):
        beginner = TicTacPlayer('X')
        partner = TicTacPlayer('0')

        turn = beginner.lastSelfTurn()

        self.assertEqual(beginner.turn(turn.value), None)

        partner.turn(turn.value)

        turn = partner.lastSelfTurn()

        self.assertTrue(turn.value in TicTacPriority.SEQUENCE)

unittest.main()