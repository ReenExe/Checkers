
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
            if combination[0] in desc and combination[1] in desc and combination[2] in desc:
                if desc[combination[0]] == desc[combination[1]] == desc[combination[2]]:
                    return desc.get(combination[1])

class TicTacLogic(object):
    def __init__(self, desc):
        self.desc = desc

    def getNextTurn(self):
        return

class TicTacSequenceLogic(TicTacLogic):
    def getNextTurn(self):
        possible = set(TicTacPriority.SEQUENCE).difference(self.desc.keys())
        if (len(possible)):
            return list(possible)[0]

class TicTacInterceptLogic(TicTacLogic):
    def getNextTurn(self):
        return

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
        self.__logic = TicTacSequenceLogic(self.__desc)

    def lastSelfTurn(self):
        return self.__lastSelfTurn

    def turn(self, value):
        if (self.__possible(value)):
            self.__desc[value] = self.__partner

            if TicTacGame.getWinner(self.__desc):
                return True

            self.__selfTurn(self.__logic.getNextTurn())

    def __possible(self, value):
        return value in TicTacPriority.SEQUENCE and value not in self.__desc

    def __selfTurn(self, value):
        self.__desc[value] = self.choose

        self.__lastSelfTurn = TicTacTurn(value, TicTacGame.getWinner(self.__desc))

    def __start(self):
        if self.__beginner():
            self.__selfTurn(TicTacPriority.SEQUENCE[0])

    def __beginner(self):
        return self.choose == 'X'
