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

        step = player.start()
        self.assertTrue(step in TicTacPriority.MAP)

        stepCopy = player.start()
        self.assertEqual(stepCopy, step)
    #
    # def testPartnerStep(self):
    #     beginner = TicTacGame('X')
    #     partner = TicTacGame('0')

unittest.main()