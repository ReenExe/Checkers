import unittest
from tictac import TicTacGame

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

unittest.main()