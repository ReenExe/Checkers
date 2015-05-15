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

        self.assertEqual(beginner.turn(beginner.lastSelfTurn().value), None)

        for i in range(0, 8):
            if beginner.lastSelfTurn() == True: break
            partner.turn(beginner.lastSelfTurn().value)
            self.assertTrue(beginner.lastSelfTurn().value in TicTacPriority.SEQUENCE)

            if partner.lastSelfTurn() == True: break
            beginner.turn(partner.lastSelfTurn().value)
            self.assertTrue(partner.lastSelfTurn().value in TicTacPriority.SEQUENCE)

        self.assertEqual(beginner.lastSelfTurn().winner, partner.lastSelfTurn().winner)


unittest.main()