import unittest
from tictac import TicTacGame, TicTacPriority

class TicTacTest(unittest.TestCase):

    def test(self):
        self.assertTrue(True)

    def testGame(self):
        players = {
            'first':  TicTacGame(TicTacGame.CHOOSES[0]),
            'second': TicTacGame(TicTacGame.CHOOSES[1]),
        }

        self.assertEqual(players['first'].choose, 'X')
        self.assertEqual(players['second'].choose, '0')

    def testStep(self):
        player = TicTacGame('X')
        step = player.start()
        self.assertTrue(step in TicTacPriority.MAP)

unittest.main()