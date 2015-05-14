
class TicTacPriority(object):
    # 0 1 2
    # 3 4 5
    # 6 7 8
    SEQUENCE = (4, 1, 2, 5, 8, 7, 6, 3, 0)

class TicTacGame(object):

    COMBINATION = (
        (0, 1, 2),
        (3, 4, 5),
        (6, 7, 8),

        (0, 3, 6),
        (1, 4, 7),
        (6, 7, 8),

        (0, 4, 8),
        (2, 4, 6),
    )

    @staticmethod
    def getWinner(desc):
        for combination in TicTacGame.COMBINATION:
            if desc.get(combination[0]) == desc.get(combination[1]) == desc.get(combination[2]):
                return desc.get(combination[1])


class TicTacTurn(object):
    def __init__(self, value, winner = None):
        self.value = value
        self.winner = winner

class TicTacPlayer(object):
    CHOOSES = ('X', '0')
    __REVERSE = {
        'X': '0',
        '0': 'X',
    }
    def __init__(self, choose):
        self.choose = choose
        self.__partner = self.__REVERSE[choose]
        self.__desc = {}
        self.__start()

    def lastSelfTurn(self):
        return self.__lastSelfTurn

    def turn(self, value):
        success = value in TicTacPriority.SEQUENCE
        if (success):
            self.__desc[value] = self.__partner
        return success

    def __selfTurn(self, value):
        self.__desc[value] = self.choose

        self.__lastSelfTurn = TicTacTurn(value, TicTacGame.getWinner(self.__desc))

    def __start(self):
        if self.__beginner():
            self.__selfTurn(TicTacPriority.SEQUENCE[0])

    def __beginner(self):
        return self.choose == 'X'
