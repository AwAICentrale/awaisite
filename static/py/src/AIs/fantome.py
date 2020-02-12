from copy import deepcopy
from random import randrange,random

from src.DataBase.criterion import Criterion

class Fantome:
    def __init__(self, game,depth,value_criteron_imitate):
        self.game=game
        self.depth = depth
        self.myValueCriterionImitate1 = value_criteron_imitate[0]
        self.myValueCriterionImitate2 = value_criteron_imitate[1]
        self.myValueCriterionImitate3 = value_criteron_imitate[2]
        self.flag = "END"
    '''
    def play(self):
        list_move = [0, 1, 2, 3, 4, 5]
        while list_move:
            move = list_move.pop(randrange(0, len(list_move)))
            result = self.game.allowed(move)
            if result:
                break
        if self.game.TEST and random() < 0.05:
            return move
        else:
            evaluation, move = self.play_rec(self.depth, float("-inf"), float("inf"),   # depth== 4 or 2
                                             self.game, self.game.is_playing,
                                             self.game.player0.loft, self.game.player1.loft)
        return move
    '''

    def play(self):
        evaluation, move = self.play_rec(self.depth, float("-inf"), float("inf"),  # depth == 0,2,4,6,8
                                         self.game, self.game.is_playing,
                                         self.game.player0.loft, self.game.player1.loft)
        return move

    def play_rec(self, depth, alpha, beta, game, is_playing, loft0, loft1):
        best_move= self.flag   #equal to "END" in the beginning
        # we stop the simulation if this part of the simulation give us a winner or if depth == 0
        if (depth == 0) or (loft0 > 24) or (loft1 > 24):
            max_eval_last = -float('inf')
            # _we declare attribute that will be used fo the gains
            self.gain_board = game.b
            self.gain_loft0 = loft0
            self.gain_loft1 = loft1
            criterion_total=0
            for move in range(6):
                game_copy = deepcopy(game)
                end_flag = game.allowed(move, game_copy.b, is_playing)
                if end_flag=="END":
                    return max_eval_last, best_move
                if game.allowed(move,game_copy.b,is_playing):
                    seeds_eaten = game_copy.move(move)
                    if is_playing == 0:
                        loft0 += seeds_eaten
                    else:
                        loft1 += seeds_eaten
                    g1=self.gain1()
                    g2=self.gain2()
                    myCriterion = Criterion(game, move)
                    criterion1=myCriterion.calculate_criterion_less_grains()
                    criterion2=myCriterion.calculate_criterion_nb_choix()
                    criterion3 = myCriterion.calculate_criterion_moins_cases_voisines_petits()
                    #We calcule the criterion_total for this coup
                    criterion_total = self.myValueCriterionImitate1* criterion1+\
                                      self.myValueCriterionImitate2* criterion2+\
                                      self.myValueCriterionImitate3* criterion3+ \
                                      0.676061829383705*g1+\
                                      -0.4604896125458653*g2
                    if criterion_total > max_eval_last:
                        max_eval_last = criterion_total
                        best_move = move
                    alpha = max(alpha, criterion_total)
                    if beta <= alpha:
                        break
            return max_eval_last, best_move

        if is_playing == self.game.is_playing:
            max_eval = -float('inf')
            end_flag = 0
            for move in range(6):
                game_copy = deepcopy(game)
                end_flag=game.allowed(move, game_copy.b, is_playing)
                #if we are already in the situation that all the coup will starve the opponent, we return "END" directly
                if end_flag=="END":
                    return max_eval, best_move
                if game.allowed(move, game_copy.b, is_playing):
                    seeds_eaten = game_copy.move(move)
                    if is_playing == 0:
                        loft0 += seeds_eaten
                    else:
                        loft1 += seeds_eaten
                    eval, m = self.play_rec(depth - 1, alpha, beta, game_copy, 1 - is_playing, loft0, loft1)
                    if eval > max_eval:
                        best_move = move
                        if eval != float('inf'):
                            max_eval = eval
                    alpha = max(alpha, eval)
                    if beta <= alpha:
                        break
            return max_eval, best_move

        else:
            min_eval = float('inf')
            for move in range(6):
                game_copy = deepcopy(game)
                end_flag=game.allowed(move, game_copy.b, is_playing)
                if end_flag == "END":
                    return min_eval, best_move
                if game.allowed(move, game_copy.b, is_playing):
                    seeds_eaten = game_copy.move(move)
                    if is_playing == 0:
                        loft0 += seeds_eaten
                    else:
                        loft1 += seeds_eaten
                    eval, m = self.play_rec(depth - 1, alpha, beta, game_copy, 1 - is_playing, loft0, loft1)
                    if eval < min_eval:
                        best_move = move
                        # if eval == -float('inf'), it means that in the depth==0, we have no pit to play,
                        # but we can still play in depth==2.
                        # In order to do not return "END", we should not make min_eval== -float('inf')
                        if eval!= -float('inf'):
                            min_eval = eval
                    beta = min(beta, eval)
                    if beta <= alpha:
                        break
            return min_eval, best_move


    def gain1(self):
        # return our wined seeds
        return (self.gain_loft0 * (1 - self.game.is_playing) + self.gain_loft1 * self.game.is_playing) / 24

    def gain2(self):  # return our loosed seeds
        return (self.gain_loft0 * self.game.is_playing + self.gain_loft1 * (1 - self.game.is_playing)) / 24

