
class TicTacPriority(object):
    # 0 1 2
    # 3 4 5
    # 6 7 8
    MAP = (4, 1, 2, 5, 8, 7, 6, 3, 0)

class TicTacGame(object):
    CHOOSES = ('X', '0')
    def __init__(self, choose):
        self.choose = choose
        self.history = []
        self.__start()
    def start(self):
        if (self.__beginner()):
            return self.history[0]

    def __start(self):
        if (self.__beginner()):
            self.history.append(TicTacPriority.MAP[0])

    def __beginner(self):
        return self.choose == 'X'
