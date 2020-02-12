import time
from abc import ABC, abstractmethod
from browser import document, bind, timer, alert, html
from copy import deepcopy
from random import randrange


class Test:
    """This class is meant to be the class that provides the tests between the IAs
    You shall provide the name of the two algorithms you want to get stats on"""

    def __init__(self, algo0, algo1, nb_games, data0=None, data1=None):
        self.nb_games = nb_games
        self.stat = [0, 0, 0]
        self.algo0 = algo0
        self.algo1 = algo1
        self.data0 = data0
        self.data1 = data1

    def run(self):
        # for _ in range(self.nb_games):
        self.game = Game()
        self.game.set_players(self.algo0, self.algo1, self.data0, self.data1)


class Game:
    def __init__(self, nb_seeds_end=0, GUI=False):
        self.b = Board()
        # _below this number of seeds the game stops
        self.nb_seeds_end = nb_seeds_end
        self.algos_available = ["alea", "alphabeta", "minimax", "aleaalphabeta", "alphabetabegin", "alphabetamidgame",
                                "mcts"]
        self.is_playing = 0
        self.nb_seeds_eaten = 0
        self.GUI = GUI

    def set_players(self, player0, player1, data0=None, data1=None):
        """you have to call this function to create the type of the players
        before the game starts"""
        if player0 in self.algos_available:
            self.player0 = AI(player0, self, data=data0)
        else:
            if self.GUI:
                self.player0 = HumanGUI(self)
            else:
                self.player0 = Human(self)

        if player1 in self.algos_available:
            self.player1 = AI(player1, self, data=data1)
        else:
            if self.GUI:
                self.player1 = HumanGUI(self)
            else:
                self.player1 = Human(self)

    def run_game(self, i):
        """the main function that runs the game. _we stop the loop if
        the loft of a player is 24 or more or if the number of seeds on the
        board is below nb_seeds_end."""
        if (self.nb_seeds_eaten < 48 - self.nb_seeds_end) \
                and max(self.player0.loft, self.player1.loft) <= 24 \
                and not (self.nb_seeds_eaten == 46 and self.end_game_is_blocked()):
            # time.sleep(1)

            if isinstance(self.who_is_playing(), Human):
                pit = self.who_is_playing().play(i)

                rslt_move = self.play(pit)
            else:
                pit = self.who_is_playing().play()
                rslt_move = self.play(pit)

            # if rslt_move==False:
            if (self.nb_seeds_eaten > 48 - self.nb_seeds_end) or max(self.player0.loft, self.player1.loft) > 24 or (
                    self.nb_seeds_eaten == 46 and self.end_game_is_blocked()):
                updateBoard()
                return self.end_of_game()
            if rslt_move == "END":
                self.who_is_playing().add_to_loft(48 - self.nb_seeds_eaten)
                return self.end_of_game()
            # the game stopped, the staying seeds arent touched
            elif rslt_move == "STOP":
                return self.end_of_game()
            elif rslt_move:
                return rslt_move
            elif rslt_move == False:
                return False

        return self.end_of_game()

    def allowed(self, pit, board=None, is_playing=None):

        if board is None:
            board = self.b

        else:
            print(" ")
        if is_playing is None:
            is_playing = self.is_playing
        try:
            if pit not in range(6):
                raise NotInYourSideError()  # _pit not included in [1,6]

            if board.get_pit(pit + 6 * is_playing) == 0:
                return False
                # pit wanted is empty

            b1 = deepcopy(board)
            self.move(pit, board=b1, is_playing=is_playing)
            # if opponents side is not empty
            if not (b1.empty_side(1 - is_playing)):
                return True

            for move_simulated in range(6):
                # we don't want to change the original board, just to know if it's allowed
                b2 = deepcopy(board)
                #   you must have a seed in the pit you could play
                if board.get_pit(move_simulated + 6 * is_playing) != 0:
                    self.move(move_simulated, board=b2, is_playing=is_playing)

                    if not (b2.empty_side(1 - is_playing)):
                        raise StarvationError()  # so the move is not licit

            # it means the move has to be played but it ends the game
            return "END"
        except NotInYourSideError as e:
            print(e)
            return False
        except EmptyPitError as e:
            print(e)
            return False
        except StarvationError as e:
            print(e)
            return False

    def play(self, pit):
        """function to use in order to play a move on the _board
        it takes one argument : number of the pit wanted to be played"""
        if pit == "END":
            return "END"
        if pit == "STOP":
            return "STOP"
        if pit == None and self.who_is_playing() == self.player0:
            return False;
        else:
            self.move(pit)
            return True

    def move(self, pit, board=None, is_playing=None):
        """function moving the seeds on the board and
        it takes one argument : number of the last pit visited
        returns number of seeds captured"""

        if board is None:
            board = self.b
        if is_playing is None:
            is_playing = self.is_playing

        pit += 6 * is_playing
        nb_seeds = board.get_pit(pit)  # saving the number of seeds to sow
        board.set_pit(pit, 0)
        p = pit
        while nb_seeds > 0:
            p = (p + 1) % 12
            if p != pit:  # _we dont put any seeds in the starting pit
                board.add_pit(p, 1)
                nb_seeds -= 1

        # last seeds is indeed in opponents side and there is 2 or 3 seeds in the pit
        seeds_eaten = 0
        while (6 * (1 - is_playing) <= p <= 5 + 6 * (1 - is_playing)) and (2 <= board.get_pit(p) <= 3):
            seeds_eaten += board.get_pit(p)
            board.set_pit(p, 0)
            p -= 1

        # we only update the loft and the player if its a play on the real board
        # we shouldnt move the seed on the board if we force the player
        if board == self.b and is_playing == self.is_playing:
            self.who_is_playing().add_to_loft(seeds_eaten)
            self.is_playing = 1 - self.is_playing

        return seeds_eaten

    def who_is_playing(self):
        if self.is_playing == 0:
            return self.player0
        else:
            return self.player1

    def end_of_game(self):

        if self.player0.loft > self.player1.loft:  # return nb of the inner
            return self.player0
        elif self.player0.loft < self.player1.loft:
            return self.player1
        else:
            return None

    def end_game_is_blocked(self):
        if self.b.board == [1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0]:
            self.player0.add_to_loft(1)
            self.player1.add_to_loft(1)
            self.b = [0] * 12
            return True
        return False


class Board:
    def __init__(self):
        self.board = [4 for i in range(12)]

    def __repr__(self):
        s = "  ====================j1=================\n"
        s += "  ||"
        for k in range(11, 5, -1):  # higher part
            if self.board[k] // 10 == 0:
                s += " " + str(self.board[k]) + "  | "
            else:  # if nb_seeds >= 10
                s += " " + str(self.board[k]) + " | "
        s += "|\n"
        s += "  =======================================\n"
        s += "  ||"
        for k in range(6):  # the lower part
            if self.board[k] // 10 == 0:
                s += " " + str(self.board[k]) + "  | "
            else:  # if nb_seeds >= 10
                s += " " + str(self.board[k]) + " | "
        s += "|\n  ====================j0================="
        return s

    def get_pit(self, k):
        return self.board[k]

    def set_pit(self, k, val):
        self.board[k] = val

    def add_pit(self, k, val):
        self.board[k] += val

    def empty_side(self, player):
        """_function looking if the side which first pit is ps is empty
        it takes one argument : ps"""
        for k in range(6 * player, 6 * player + 6):
            if self.get_pit(k) != 0:
                return False
        return True


class NotInYourSideError(Exception):
    def __init__(self):
        self.message = "You tried to play a pit that's not your side of the board !"

    def __str__(self):
        return self.message


class EmptyPitError(Exception):
    def __init__(self):
        self.message = "You tried to play an empty pit"

    def __str__(self):
        return self.message


class StarvationError(Exception):
    def __init__(self):
        self.message = "You mustn't starve your opponent"

    def __str__(self):
        return self.message


class Player(ABC):
    """Player is an abstract class which fathers IA and Human"""

    def __init__(self, game):
        self.game = game
        self.loft = 0

    @abstractmethod
    def play(self):
        pass

    def add_to_loft(self, nb):
        self.game.nb_seeds_eaten += nb
        self.loft += nb


class Human(Player):
    """The CLI version of the Human player class that asks the input to the player"""

    def __init__(self, game):
        super().__init__(game)

    def play(self, i):
        pit = i
        result = self.game.allowed(pit)

        if result:
            return pit
        else:
            print("This move is not allowed")
            return None


#
#
# GUI
#
#

# Variables for GUI
idCases = ['p11', 'p10', 'p9', 'p8', 'p7', 'p6', 'p0', 'p1', 'p2', 'p3', 'p4', 'p5', ]
conversion = [11, 10, 9, 8, 7, 6, 0, 1, 2, 3, 4, 5]
idQuantity = ['d11', 'd10', 'd9', 'd8', 'd7', 'd6', 'd0', 'd1', 'd2', 'd3', 'd4', 'd5']
t = Test("human", "human", 1)  # Essayez t=Test("human","alea",1) et t=Test("human","alphabeta",1)
t.run()
timeAi = 100  # temps de réponse IA


# launch game
def play_ai(ev):
    alert(ev.target.id)
    global t
    t = Test("human", ev.target.id, 1)
    t.run()
    updateBoard()
    return 1


# mettre à jour la gui
def updateBoard():
    for i in range(12):
        if t.game.b.board[conversion[i]] < 10:
            document[idCases[i]].src = "../../static/images/gui_graine" + str(t.game.b.board[conversion[i]]) + ".png"
            document[idQuantity[i]].text = str(t.game.b.board[conversion[i]])
        else:
            document[idCases[i]].src = "../../static/images/gui_graine10.png"
            document[idQuantity[i]].text = str(t.game.b.board[conversion[i]])
    print("Board", t.game.b)
    document["score-ai"].text = str(t.game.player1.loft)
    document["score-user"].text = str(t.game.player0.loft)


# faire jouer le joueur selon la case choisie
def playCase(ev):
    idText = int(ev.target.id[1:])

    if idText > 5:
        var = idText - 6
    else:
        var = idText

    rslt = t.game.run_game(var)
    print("user result" + str(rslt))
    if rslt == True:
        updateBoard()
    elif rslt == False:
        create_error_message()
        return 1
    else:
        create_end_message(rslt)


# faire apparaître msg de victoire ou défaite
def create_end_message(rslt):  # div pour montrer qui a gagné
    gui = document["main-display"]
    endMessage = html.DIV(id="end-message", Class="alert")
    endMessage.text = document["end-message"].text = "Fin de la partie !   " + "Joueur A : " + str(t.game.player1.loft) + "  Joueur B : " + str(
        t.game.player0.loft)
    gui <= endMessage


def create_error_message():
    gui = document["main-display"]
    errorMessage = html.DIV(id="error-message", Class="alert alert-warning alert-dismissible")
    closeButton = html.BUTTON(Class="close", data_dismiss="alert")
    errorMessage <= closeButton
    errorMessage.text = "Case vide ou votre coup affame l'adversaire, choisissez une autre case."
    gui <= errorMessage


# click listeners
case1 = data = document["a0"]
case1.bind("click", playCase)
case2 = data = document["a1"]
case2.bind("click", playCase)
case3 = data = document["a2"]
case3.bind("click", playCase)
case4 = data = document["a3"]
case4.bind("click", playCase)
case5 = data = document["a4"]
case5.bind("click", playCase)
case6 = data = document["a5"]
case6.bind("click", playCase)

case7 = data = document["a6"]
case7.bind("click", playCase)
case8 = data = document["a7"]
case8.bind("click", playCase)
case9 = data = document["a8"]
case9.bind("click", playCase)
case10 = data = document["a9"]
case10.bind("click", playCase)
case11 = data = document["a10"]
case11.bind("click", playCase)
case12 = data = document["a11"]
case12.bind("click", playCase)
