# -*- coding: utf-8 -*-  
# python 3.5

import pandas as pd
import numpy as np
from matplotlib import pyplot as plt

from src.DataBase.criterion import Criterion
from src.engine import Game


class PlayerToImitate:
    def __init__(self,indice,database):
        '''

        :param indice: the nomber of plyaer in databese
        :param database: the file address of database
        '''
        self.criterion_less_grains=0
        self.criterion_nb_choix=0
        self.criterion_moins_cases_voisines_petits=0
        self.indice=indice
        self.df=pd.read_csv(database)
        self.df_sente_win=None
        self.df_gote_win=None
        self.df_sente_lost=None
        self.df_gote_lost=None
        self.SENTE=0 # it means that it is our player who play first in one game
        self.GOTE=1  # it means that it is the opponent of our player who play first in one game

    def traitement_data_base(self):
        '''
        this fonction divise the data base into 4 part:
        1)player played first, player won
        2)opponent played first, player won
        3)player played first, opponent won
        4)opponent played first, opponent won
        '''
        df=self.df
        df=df.drop("Unnamed: 0",axis=1)
        #df=df.drop([297])
        df_1=df[(df.player1==self.indice)]
        df_2=df[(df.player2==self.indice)]
        self.df_sente_win=df_1[df_1.seeds1>df_1.seeds2]
        self.df_gote_win=df_2[df_2.seeds1<df_2.seeds2]
        self.df_sente_lost=df_1.drop(df_1[df_1.seeds1>df_1.seeds2].index)   ####### 注意加index
        self.df_gote_lost=df_2.drop(df_2[df_2.seeds1<df_2.seeds2].index)

    def calculer_criterion_less_grains(self,df, sente_gote):
        '''
        this fonction calculate the criterion_less_grains by using df
        :param df: the data base to analyse
        :param sente_gote: indicate who play first
        :return: value of criterion_less_grains for this player
        '''
        nb_partie=df.player1.count()
        sum_criterion1_partie = 0
        n=0
        for i in range(0,nb_partie):
            game = Game()
            list_criterion1_coupe = []
            sum_criterion1_coupe=0
            move = df.iloc[[i], [2]] #iloc 读取第i行 第2列第值
            list_move = list(map(int, move.values[0][0]))
            nb_coupe=len(list_move)
            if sente_gote==self.SENTE:
                game.set_players(self.indice, "adversary")
                for coupe in range(0,nb_coupe):
                    if (coupe%2)==0:
                        criterion=Criterion(game,list_move[coupe]-1)
                        if criterion.calculate_criterion_less_grains()!=None:
                            list_criterion1_coupe.append(criterion.calculate_criterion_less_grains())
                        game.move(list_move[coupe]-1)
                    else:
                        game.move(list_move[coupe]-1)
            if sente_gote==self.GOTE:
                game.set_players("adversary",self.indice)
                for coupe in range(0,nb_coupe):
                    if (coupe%2)==0:
                        game.move(list_move[coupe]-1)
                    else:
                        criterion = Criterion(game, list_move[coupe]-1)
                        if criterion.calculate_criterion_less_grains() != None:
                            list_criterion1_coupe.append(criterion.calculate_criterion_less_grains())
                        game.move(list_move[coupe]-1)

            for j in range(len(list_criterion1_coupe)):
                if list_criterion1_coupe[j]== None:
                    print(j)
                sum_criterion1_coupe += list_criterion1_coupe[j]
            criterion1_partie=sum_criterion1_coupe/len(list_criterion1_coupe)
            sum_criterion1_partie+=criterion1_partie

        criterion1=sum_criterion1_partie/nb_partie
        return criterion1

    def calculer_criterion_nb_choix(self,df, sente_gote):
        '''
        this fonction calculate the criterion_nb_choix by using df
        :param df: the data base to analyse
        :param sente_gote: indicate who play first
        :return: value of criterion_nb_choix for this player
        '''
        nb_partie=df.player1.count()
        sum_criterion2_partie = 0
        for i in range(0,nb_partie):
            game = Game()
            list_criterion2_coupe = []
            sum_criterion2_coupe=0
            move = df.iloc[[i], [2]]
            list_move = list(map(int, move.values[0][0]))
            nb_coupe=len(list_move)
            if sente_gote==self.SENTE:
                game.set_players(self.indice, "adversary")
                for coupe in range(0,nb_coupe):
                    if (coupe%2)==0:
                        criterion=Criterion(game,list_move[coupe]-1)
                        if criterion.calculate_criterion_nb_choix()!= None:
                            list_criterion2_coupe.append(criterion.calculate_criterion_nb_choix())
                        game.move(list_move[coupe]-1)
                    else:
                        game.move(list_move[coupe]-1)
            if sente_gote==self.GOTE:
                game.set_players("adversary", self.indice)
                for coupe in range(0,nb_coupe):
                    if (coupe%2)==0:
                        game.move(list_move[coupe]-1)
                    else:
                        criterion = Criterion(game, list_move[coupe]-1)
                        if criterion.calculate_criterion_nb_choix()!= None:
                            list_criterion2_coupe.append(criterion.calculate_criterion_less_grains())
                        game.move(list_move[coupe]-1)
            for j in range(len(list_criterion2_coupe)):
                sum_criterion2_coupe += list_criterion2_coupe[j]
            criterion2_partie=sum_criterion2_coupe/len(list_criterion2_coupe)
            sum_criterion2_partie+=criterion2_partie
        criterion2=sum_criterion2_partie/nb_partie
        return criterion2

    def calculer_criterion_moins_cases_voisines_petits(self, df, sente_gote):
        '''
        this fonction calculate the criterion_moins_cases_voisines_petits by using df
        :param df: the data base to analyse
        :param sente_gote: indicate who play first
        :return: value of criterion_moins_cases_voisines_petits for this player
        '''
        nb_partie = df.player1.count()
        sum_criterion3_partie = 0
        for i in range(0, nb_partie):
            game = Game()
            list_criterion3_coupe = []
            sum_criterion3_coupe = 0
            move = df.iloc[[i], [2]]
            list_move = list(map(int, move.values[0][0]))
            nb_coupe = len(list_move)
            if sente_gote == self.SENTE:
                game.set_players(self.indice, "adversary")
                for coupe in range(0, nb_coupe):
                    if (coupe % 2) == 0:
                        criterion = Criterion(game, list_move[coupe]-1)
                        if criterion.calculate_criterion_moins_cases_voisines_petits()!=None:
                            list_criterion3_coupe.append(criterion.calculate_criterion_moins_cases_voisines_petits())
                        game.move(list_move[coupe]-1)
                    else:
                        game.move(list_move[coupe]-1)
            if sente_gote == self.GOTE:
                game.set_players("adversary", self.indice)
                for coupe in range(0, nb_coupe):
                    if (coupe % 2) == 0:
                        game.move(list_move[coupe]-1)
                    else:
                        criterion = Criterion(game, list_move[coupe]-1)
                        if criterion.calculate_criterion_moins_cases_voisines_petits()!=None:
                            list_criterion3_coupe.append(criterion.calculate_criterion_less_grains())
                        game.move(list_move[coupe]-1)
            for j in range(len(list_criterion3_coupe)):
                sum_criterion3_coupe += list_criterion3_coupe[j]
            criterion3_partie = sum_criterion3_coupe / len(list_criterion3_coupe)
            sum_criterion3_partie += criterion3_partie
        criterion3 = sum_criterion3_partie / nb_partie
        return criterion3

    def set_criterion(self):
        self.traitement_data_base()

        criterion1_sente_win=self.calculer_criterion_less_grains(self.df_sente_win,self.SENTE)
        criterion1_gote_win=self.calculer_criterion_less_grains(self.df_gote_win,self.GOTE)
        criterion1_sente_lost=self.calculer_criterion_less_grains(self.df_sente_lost,self.SENTE)
        criterion1_gote_lost=self.calculer_criterion_less_grains(self.df_gote_lost,self.GOTE)

        criterion2_sente_win = self.calculer_criterion_nb_choix(self.df_sente_win, self.SENTE)
        criterion2_gote_win = self.calculer_criterion_nb_choix(self.df_gote_win, self.GOTE)
        criterion2_sente_lost = self.calculer_criterion_nb_choix(self.df_sente_lost, self.SENTE)
        criterion2_gote_lost = self.calculer_criterion_nb_choix(self.df_gote_lost, self.GOTE)

        criterion3_sente_win = self.calculer_criterion_moins_cases_voisines_petits(self.df_sente_win, self.SENTE)
        criterion3_gote_win = self.calculer_criterion_moins_cases_voisines_petits(self.df_gote_win, self.GOTE)
        criterion3_sente_lost = self.calculer_criterion_moins_cases_voisines_petits(self.df_sente_lost, self.SENTE)
        criterion3_gote_lost = self.calculer_criterion_moins_cases_voisines_petits(self.df_gote_lost, self.GOTE)

        nb_sente_win=self.df_sente_win.player1.count()
        nb_gote_win=self.df_gote_win.player1.count()
        nb_sente_lost=self.df_sente_lost.player1.count()
        nb_gote_lost=self.df_gote_lost.player1.count()
        nb_win=nb_sente_win+nb_gote_win

        # calculate the mean value of criterion_less_grains in the 4 part
        self.criterion_less_grains=(criterion1_sente_win*nb_sente_win+criterion1_gote_win*nb_gote_win)/nb_win
        # calculate the mean value of criterion_nb_choix in the 4 part
        self.criterion_nb_choix=(criterion2_sente_win*nb_sente_win+criterion2_gote_win*nb_gote_win)/nb_win
        # calculate the mean value of criterion_moins_cases_voisines_petits in the 4 part
        self.criterion_moins_cases_voisines_petits=(criterion3_sente_win*nb_sente_win+criterion3_gote_win*nb_gote_win)/nb_win

    def get_criterion_less_grains(self):
        return self.criterion_less_grains

    def get_criterion_nb_choix(self):
        return self.criterion_nb_choix

    def get_moins_cases_voisines_petits(self):
        return self.criterion_moins_cases_voisines_petits

    def get_criterion_list(self):
        list=[]
        list.append(self.get_criterion_less_grains())
        list.append(self.get_criterion_nb_choix())
        list.append(self.get_moins_cases_voisines_petits())
        return list



if __name__ == "__main__":
    player_to_imitate = PlayerToImitate(1952,"/Users/fangzhengjie/Documents/AwAI/AwAI-master/src/DataBase/very_bad_player.csv")
    player_to_imitate.set_criterion()
    print( player_to_imitate.criterion_less_grains)
    print( player_to_imitate.criterion_nb_choix)
    print( player_to_imitate.criterion_moins_cases_voisines_petits)
    print("criterion_less_grains: %f" %player_to_imitate.criterion_less_grains)
    print("criterion_nb_choix: %f" % player_to_imitate.criterion_nb_choix)
    print("criterion_moins_cases_voisines_petits: %f" % player_to_imitate.criterion_moins_cases_voisines_petits)
    print(player_to_imitate.get_criterion_list())









