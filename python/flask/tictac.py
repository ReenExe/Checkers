
class TicTacPriority(object):
    # 0 1 2
    # 3 4 5
    # 6 7 8
    MAP = (4, 1, 2, 5, 8, 7, 6, 3, 0)

class TicTacTurn(object):
    def __init__(self, value, win = None):
        self.value = value
        self.win = win

class TicTacGame(object):
    CHOOSES = ('X', '0')
    __REVERSE = {
        'X': '0',
        '0': 'X',
    }
    def __init__(self, choose):
        self.choose = choose
        self.partner = self.__REVERSE[choose]
        self.desc = {}
        self.__start()

    def lastSelfTurn(self):
        return self.__lastSelfTurn

    def turn(self, value):
        success = value in TicTacPriority.MAP
        if (success):
            self.desc[value] = self.partner
        return success

    def __selfTurn(self, value):
        self.desc[value] = self.choose

        self.__lastSelfTurn = TicTacTurn(value)

    def __start(self):
        if (self.__beginner()):
            self.__selfTurn(TicTacPriority.MAP[0])

    def __beginner(self):
        return self.choose == 'X'
