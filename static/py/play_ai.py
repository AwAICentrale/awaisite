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


class AI(Player):
    """docstring for player."""

    def __init__(self, algo, game, data=None):
        super().__init__(game)
        self.algo = algo

        if self.algo == "alea":
            self.algo = Alea(self.game)
        elif self.algo == "aleaalphabeta":
            if data is None:
                data = "begin"
            self.algo = AleaAlphaBeta(self.game, data)
        elif self.algo == "minimax":
            if data is None:
                data = [1, -1]
            self.algo = Minimax(self.game, data)
        elif self.algo == "alphabeta":
            if data is None:
                data = [0.676061829383705, -0.4604896125458653, 0.7408590076155085, 0.3691310747575154]
            self.algo = AlphaBeta(self.game, 2, data)  # data is listecoeffgain
        elif self.algo == "alphabetabegin":
            if data is None:
                data = [0.676061829383705, -0.4604896125458653, 0.7408590076155085, 0.3691310747575154]
            self.algo = AlphaBetaBegin(self.game, 2, data)
        elif self.algo == "alphabetamidgame":
            if data is None:
                data = [0.676061829383705, -0.4604896125458653, 0.7408590076155085, 0.3691310747575154]
            self.algo = AlphaBetaMidgame(self.game, 2, data)
        elif self.algo == "mcts":
            self.algo = MCTSPlayer(self.game)

    def play(self):
        return self.algo.play()


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


# IAs classes

class Alea:
    def __init__(self, game):
        self.game = game

    def play(self):
        list_move = [0, 1, 2, 3, 4, 5]
        while list_move:
            move_test = list_move.pop(randrange(0, len(list_move)))
            result = self.game.allowed(move_test)
            if result:  # it is a valid move
                # print(self.game.b)
                return move_test
            if result == "END":
                return "END"
        return "END"


class Minimax:
    def __init__(self, game, list_coeff_gain):
        self.game = game
        self.list_coeff_gain = list_coeff_gain

    def play(self):
        best_move = "END"
        h_gain = float("-inf")
        for move_a in range(6):  # we try every move possible
            gain_move_a = float("inf")
            if self.game.allowed(move_a):
                b1 = deepcopy(self.game.b)
                seeds_eaten_a = self.game.move(move_a, board=b1, is_playing=self.game.is_playing)
                for move_b in range(6):
                    gain_move_a_b = float("inf")
                    if self.game.allowed(move_b, board=b1, is_playing=1 - self.game.is_playing):
                        # move_a and move_b are licit
                        seeds_eaten_b = self.game.move(move_a, board=b1, is_playing=1 - self.game.is_playing)
                        gain_move_a_b = self.gain(b1, self.game.is_playing, seeds_eaten_a, seeds_eaten_b)
                    if gain_move_a_b < gain_move_a:
                        gain_move_a = gain_move_a_b
            if gain_move_a != float("inf"):
                if gain_move_a > h_gain:
                    h_gain = gain_move_a
                    best_move = move_a
        return best_move

    def gain(self, board, player, seeds_eaten_a, seeds_eaten_b):
        """_this function takes the board we want to evaluate and the
        player for whom we want to evaluate the move."""
        g = self.list_coeff_gain[0] * self.gain_a(seeds_eaten_a) + \
            self.list_coeff_gain[1] * self.gain_a(seeds_eaten_b)
        return g

    def gain_a(self, seeds_eaten_a):
        return seeds_eaten_a

    def gain_b(self, seeds_eaten_b):
        return -seeds_eaten_b


class AlphaBeta:
    def __init__(self, game, depth, list_coeff_gain):
        self.game = game
        self.list_coeff_gain = list_coeff_gain
        self.depth = depth
        self.flag = "END"

    def play(self):
        evaluation, move = self.play_rec(self.depth, float("-inf"), float("inf"),
                                         self.game.b, self.game.is_playing,
                                         self.game.player0.loft, self.game.player1.loft)
        return move

    def play_rec(self, depth, alpha, beta, board, is_playing, loft0, loft1):
        # we stop the simulation if this part of the simulation give us a winner.
        if (depth == 0) or (loft0 > 24) or (loft1 > 24):
            # _we declare attribute that will be used fo the gains
            self.gain_board = board
            self.gain_loft0 = loft0
            self.gain_loft1 = loft1
            return self.gain(), -1

        best_move = self.flag

        if is_playing == self.game.is_playing:
            max_eval = -float('inf')
            for move in range(6):
                if self.game.allowed(move, board=board, is_playing=is_playing):
                    b1 = deepcopy(board)
                    seeds_eaten = self.game.move(move, board=b1, is_playing=is_playing)
                    if is_playing == 0:
                        loft0 += seeds_eaten
                    else:
                        loft1 += seeds_eaten
                    eval, m = self.play_rec(depth - 1, alpha, beta, b1, 1 - is_playing, loft0, loft1)
                    if eval > max_eval:
                        max_eval = eval
                        best_move = move
                    alpha = max(alpha, eval)
                    if beta <= alpha:
                        break
            return max_eval, best_move

        else:
            min_eval = float('inf')
            for move in range(6):
                if self.game.allowed(move, board=board, is_playing=is_playing):
                    b1 = deepcopy(board)
                    seeds_eaten = self.game.move(move, board=b1, is_playing=is_playing)
                    if is_playing == 0:
                        loft0 += seeds_eaten
                    else:
                        loft1 += seeds_eaten
                    eval, m = self.play_rec(depth - 1, alpha, beta, b1, 1 - is_playing, loft0, loft1)
                    if eval < min_eval:
                        min_eval = eval
                        best_move = move
                    beta = min(beta, eval)
                    if beta <= alpha:
                        break
            return min_eval, best_move

    def gain(self):
        a, b, c, d = self.list_coeff_gain
        gain = self.gain0() + \
               a * self.gain1() + \
               b * self.gain2() + \
               c * self.gain3() + \
               d * self.gain4()
        return gain

    def gain0(self):
        """_this gain updates the value of gain_m_a_b to inf if we won and to -inf
        if we lost"""
        if (self.game.is_playing == 0 and self.gain_loft0 > 24) or \
                (self.game.is_playing == 1 and self.gain_loft1 > 24):
            return 1000
        elif (self.game.is_playing == 1 and self.gain_loft0 > 24) or \
                (self.game.is_playing == 0 and self.gain_loft1 > 24):
            return -1000
        else:
            return 0

    def gain1(self):
        # return our wined seeds
        return (self.gain_loft0 * (1 - self.game.is_playing) + self.gain_loft1 * self.game.is_playing) / 24

    def gain2(self):  # return our loosed seeds
        return (self.gain_loft0 * self.game.is_playing + self.gain_loft1 * (1 - self.game.is_playing)) / 24

    def gain3(self):
        """_this gain returns a bad score if you have many pits
        with 1 or 2 seeds in a row and a great score if the oppoenent has many pits
        with 1 or 2 seeds in a row"""
        GAIN_MAX = 504  # 504 max score {12*[(2*1)+(2*2)+...+(2*6)]}
        gain = 0
        successive = 1  # count the number of 1 or 2 seeds in a row
        opponent = 1 - self.game.is_playing
        for pit in range(6 * self.game.is_playing, 6 + 6 * self.game.is_playing):
            sbp = self.game.b.get_pit(pit)
            if (sbp == 1) or (sbp == 2):
                gain -= 12 * sbp * successive
                successive += 1
            else:
                successive = 1
        for pit in range(6 * opponent, 6 + 6 * opponent):
            sbp = self.game.b.get_pit(pit)
            if (sbp == 1) or (sbp == 2):
                gain += 8 * sbp * successive  # opponent plays first
                successive += 1
            else:
                successive = 1
        return gain / GAIN_MAX

    def gain4(self):
        """_this gain returns a bad score if you don't have a lot of possible moves"""
        GAIN_MAX = 5
        gain = 0
        opponent = 1 - self.game.is_playing
        for pit in range(6 * self.game.is_playing, 6 + 6 * self.game.is_playing):
            if self.game.b.get_pit(pit) > 0:
                gain += 1
        for pit in range(6 * opponent, 6 + 6 * opponent):
            if self.game.b.get_pit(pit) > 0:
                gain -= 1
        return gain / GAIN_MAX  # 5 max score {+6 -1}


class AlphaBetaBegin(AlphaBeta):
    def __init__(self, game, depth, list_coeff_gain):
        super().__init__(game, depth, list_coeff_gain)
        self.nb_seeds_begin = 5
        self.flag = "STOP"

    def play(self):
        if (self.game.player0.loft >= self.nb_seeds_begin) or \
                (self.game.player1.loft >= self.nb_seeds_begin):
            return "STOP"
        return super().play()


class AlphaBetaMidgame(AlphaBeta):
    def __init__(self, game, depth, list_coeff_gain):
        super().__init__(game, depth, list_coeff_gain)
        self.nb_seeds_midgame = 19
        self.flag = "STOP"

    def play(self):
        if (self.game.player0.loft >= self.nb_seeds_midgame) or \
                (self.game.player1.loft >= self.nb_seeds_midgame):
            return "STOP"

        return super().play()


#
#
# GUI
#
#

# Variables for GUI
idCases = ['p11', 'p10', 'p9', 'p8', 'p7', 'p6', 'p0', 'p1', 'p2', 'p3', 'p4', 'p5', ]
conversion = [11, 10, 9, 8, 7, 6, 0, 1, 2, 3, 4, 5]
idQuantity = ['d11', 'd10', 'd9', 'd8', 'd7', 'd6', 'd0', 'd1', 'd2', 'd3', 'd4', 'd5']
timeAi = 1000  # temps de réponse IA
aiFirst = False
aiName = ""


# launch game
def play_ai(ev):
    global t
    global aiFirst
    bind_click(aiFirst)
    if aiFirst == False:
        create_turn_indicator(aiFirst)
        t = Test("human", aiName, 1)
        t.run()
        updateBoard()
    else:
        create_turn_indicator(aiFirst)
        t = Test(aiName, "human", 1)
        t.run()
        runAi()
        updateBoard()


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


# faire jouer l'IA
def runAi():  # L'IA fait son coup
    aiTurn = False
    create_turn_indicator(aiTurn)
    rslt = t.game.run_game(0)  # le nombre n'est pas pris en compte par l'IA
    print("ai result" + str(rslt))
    if rslt == True:
        updateBoard()
    elif rslt == False:
        return 1
    else:
        create_end_message(rslt)


# faire jouer le joueur selon la case choisie
def playCase(ev):
    idText = int(ev.target.id[1:])

    if idText > 5:
        var = idText - 6
    else:
        var = idText
    print("var : " + str(var))
    aiTurn = True
    create_turn_indicator(aiTurn)
    rslt = t.game.run_game(var)
    print("user result" + str(rslt))
    if rslt == True:
        updateBoard()
        timer.set_timeout(runAi, timeAi)
    elif rslt == False:
        create_error_message()
        return 1
    else:
        create_end_message(rslt)


# faire apparaître msg de victoire ou défaite
def create_end_message(rslt):  # div pour montrer qui a gagné
    gui = document["main-display"]
    endMessage = html.DIV(id="end-message", Class="alert alert-danger alert-dismissible")
    if isinstance(rslt, Human):
        endMessage.text = "Vous avez gagné !   " + "IA : " + str(t.game.player1.loft) + "  Vous: " + str(t.game.player0.loft)
    elif isinstance(rslt, AI):
        endMessage.text = "L'ordinateur gagne !   " + "IA : " + str(t.game.player1.loft) + "  Vous: " + str(t.game.player0.loft)
    closeBtn = html.BUTTON(Class="close", data_dismiss="alert", aria_label="close")
    span = html.SPAN(aria_hidden="true")
    x = html.I(Class="fa fa-times")
    newGameBtn = html.BUTTON(Class="btn ml-3 mr-auto", id="newgame", onclick="showSettings()", data_dismiss="alert")
    newGameBtn.text = "Nouvelle partie"
    span <= x
    closeBtn <= span
    endMessage <= closeBtn
    endMessage <= newGameBtn
    gui <= endMessage



def create_error_message():
    gui = document["main-display"]
    errorMessage = html.DIV(id="error-message", Class="alert alert-warning alert-dismissible")
    errorMessage.text = "Case vide ou votre coup affame l'adversaire, choisissez une autre case."
    closeBtn = html.BUTTON(Class="close", data_dismiss="alert", aria_label="close")
    span = html.SPAN(aria_hidden="true")
    x = html.I(Class="fa fa-times")
    span <= x
    closeBtn <= span
    errorMessage <= closeBtn
    gui <= errorMessage


# def update_statistics(rslt):
#     if isinstance(rslt, Human):
#
#     elif isinstance(rslt, AI):
#         endMessage.text = "L'ordinateur gagne !   " + "IA : " + str(t.game.player1.loft) + "  Vous: " + str(t.game.player0.loft)

def create_turn_indicator(aiTurn):
    if document["turn-indicator"]:
        del document["turn-indicator"]
    gui = document["results"]
    turnIndicator = html.DIV(id="turn-indicator", Class="alert alert-info")
    if aiTurn == True:
        turnIndicator.text = "L'IA réfléchit..."
    else:
        turnIndicator.text = "A vous de jouer !"
    gui <= turnIndicator


def change_first(ev):
    change_firstplayer_button_style(ev)
    global aiFirst
    if ev.target.id == "aiFirst":
        aiFirst = True
    elif ev.target.id == "humanFirst":
        aiFirst = False


def change_ai(ev):
    global aiName
    aiName = ev.target.id
    change_difficulty_button_style(ev)
    difficulty = document["difficulty-label"]
    difficulty.text = ev.target.text

def change_difficulty_button_style(ev):
    btns = document["difficulty-select"].select('a')
    for btn in btns:
        btn.style = {"background-color": "#cacac9", }
    ev.target.style = {"background-color": "#666463", }


def change_firstplayer_button_style(ev):
    btns = document["play-buttons"].select('a')
    for btn in btns:
        btn.style = {"background-color": "#cacac9", }
    ev.target.style = {"background-color": "#666463", }


# click listeners
def bind_click(aiFirst):
    unbind_click()
    if aiFirst == False:
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
    else:
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


def unbind_click():
    case1 = data = document["a0"]
    case2 = data = document["a1"]
    case3 = data = document["a2"]
    case4 = data = document["a3"]
    case5 = data = document["a4"]
    case6 = data = document["a5"]
    case7 = data = document["a6"]
    case8 = data = document["a7"]
    case9 = data = document["a8"]
    case10 = data = document["a9"]
    case11 = data = document["a10"]
    case12 = data = document["a11"]
    case1.unbind("click", playCase)
    case2.unbind("click", playCase)
    case3.unbind("click", playCase)
    case4.unbind("click", playCase)
    case5.unbind("click", playCase)
    case6.unbind("click", playCase)
    case7.unbind("click", playCase)
    case8.unbind("click", playCase)
    case9.unbind("click", playCase)
    case10.unbind("click", playCase)
    case11.unbind("click", playCase)
    case12.unbind("click", playCase)


def init_page():
    global t
    aiName = "alea"
    t = Test("human", aiName, 1)  # Essayez t=Test("human","alea",1) et t=Test("human","alphabeta",1)
    t.run()
    bind_click(aiFirst)


init_page()


# new game
def new_game(ev):
    global t
    t = Test("human", aiName, 1)
    t.run()
    updateBoard()
    return 1


run_alea = data = document["alea"]
run_alea.bind("click", change_ai)

run_minimax = data = document["minimax"]
run_minimax.bind("click", change_ai)

run_alphabeta2 = data = document["alphabeta2"]
run_alphabeta2.bind("click", change_ai)

run_alphabeta4 = data = document["alphabeta4"]
run_alphabeta4.bind("click", change_ai)

run_alphabeta8 = data = document["alphabeta8"]
run_alphabeta8.bind("click", change_ai)

is_aiFirst = data = document["aiFirst"]
is_aiFirst.bind("click", change_first)
is_humanFirst = data = document["humanFirst"]
is_humanFirst.bind("click", change_first)

newgame = data = document["newgame"]
newgame.bind("click", new_game)

start = data = document["settings-save"]
start.bind("click", play_ai)


diff1_wins = data = document["diff2_update"]