from src.AIs.genetique import Amelioration
from src.tests import Test
from src.DataBase.dataBase import PlayerToImitate
import time
from src.engine import Game

# ----- TEST OF GENETIC ALGO
# a = Amelioration(8, 8, 4).amelioration()
# print(a)

# ---- TEST ON ONE CORE -----
#t = Test("alea","alphabeta8",200)
#t.run()
#print(t.game.player0.loft, t.game.player1.loft)
#print(list(t.stat))

# ----- TEST ON ALL CORES -----
# t = Test("alea", "alphabeta", 1000)
# t.run_on_all_cores()
# print(t.game.player0.loft, t.game.player1.loft)
# print(list(t.stat))

# ---- TEST vs Fantôme -----
player_to_imitate=PlayerToImitate(5061,"/Users/fangzhengjie/Documents/AwAI/AwAI-master/src/DataBase/best_player.csv") # put the indice et file address of database here
player_to_imitate.set_criterion()
criterion_list=player_to_imitate.get_criterion_list()
t = Test("fantome8","alea",1,criterion_list,None)
t.run()
print(t.game.player0.loft, t.game.player1.loft)
print(list(t.stat))

# ----- TEST vs HUMAN --------
# game = Game()
# game.set_players("alphabeta", "human")
# game.run_game()
