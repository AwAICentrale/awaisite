import copy
from src.exceptions import NotInYourSideError


class Criterion:
    """Criterion est une class qui contient des critères selon lesqueles on imite le player humain
     cette class a 2 paramètres: game et pit à jouer"""
    def __init__(self, game,pit):
        self.myGame = game
        self.myPit = pit  #pit 是0-5

    def calculate_criterion_less_grains(self):
        """cette methode est pour calculer la valeur de critère 1: donner le moins que possible de grains au
        adversire pour un game et un pit donnée. Criterion_less_grains equal 0 si on donne  27 grains, equal 1 si on donne 0 grain
        """
        is_playing=self.myGame.is_playing
        list_adversary_before = []
        list_adversary_after = []
        game_copy = copy.deepcopy(self.myGame)
        if is_playing==0:
            for i in range(6, 12):      # pit (0 1 2 3 4 5) pour fantome et ( 6 7 8 9 10 11) pour l'adversaire
                list_adversary_before.append(self.myGame.b.get_pit(i))
            if game_copy.allowed(self.myPit,game_copy.b,game_copy.is_playing):
                game_copy.play(self.myPit)
                for i in range (6,12):
                    list_adversary_after.append(game_copy.b.get_pit(i))
            else:
                return None
        if is_playing==1:
            for i in range(0, 6):        # pit (0 1 2 3 4 5) pour l'adversaire et ( 6 7 8 9 10 11) pour fantome
                list_adversary_before.append(self.myGame.b.get_pit(i))
            if game_copy.allowed(self.myPit,game_copy.b,game_copy.is_playing):
                game_copy.play(self.myPit)
                for i in range(0, 6):
                    list_adversary_after.append(game_copy.b.get_pit(i))
            else:
                return None
        nb_grains_give_to_adversary=0
        for i in range(6):
            nb_grains_give_to_adversary+=list_adversary_after[i]-list_adversary_before[i]
        criterion_less_grains=(12-nb_grains_give_to_adversary)/27
        # par analyse, on sait que dans un coup, le nombre de grains donnés au adversaire est limité entre -15 et 12
        #criterion_less_grains equal 0 si on donne  27 grains, equal 1 si on donne 0 grain
        return criterion_less_grains


    def calculate_criterion_nb_choix(self):
        """
        cette méthode est pour calculer la caleur de critère 2: après avoir joué, on a combien de cases chez nous non vide
        :return: augmentation de cases non vides/5
        criterion_nb_choix equal 0 si on a une augmentation de choix -1, equal 1 si on a une celle-ci de 5
        """
        is_playing = self.myGame.is_playing
        game_copy = copy.deepcopy(self.myGame)
        mon_list_before = []
        mon_list_after = []
        nb_choix_avant=0
        nb_choix_apres=0
        if is_playing == 0:
            for i in range(0,6):
                mon_list_before.append(self.myGame.b.get_pit(i))
                if mon_list_before[i]!=0:
                    nb_choix_avant=nb_choix_avant+1
            if game_copy.allowed(self.myPit,game_copy.b,game_copy.is_playing):
                game_copy.play(self.myPit)
                for i in range(0,6):
                    mon_list_after.append(game_copy.b.get_pit(i))
                    if mon_list_after[i]!=0:
                        nb_choix_apres=nb_choix_apres+1
            else:
                return None
        if is_playing == 1:
            for i in range(6,12):
                mon_list_before.append(self.myGame.b.get_pit(i))
                if mon_list_before[i-6]!=0:
                    nb_choix_avant=nb_choix_avant+1
            if game_copy.allowed(self.myPit,game_copy.b,game_copy.is_playing):
                game_copy.play(self.myPit)
                for i in range(6,12):
                    mon_list_after.append(game_copy.b.get_pit(i))
                    if mon_list_after[i-6]!=0:
                        nb_choix_apres=nb_choix_apres+1
            else:
                return None
        nb_choix_augmente=nb_choix_apres-nb_choix_avant
        criterion_nb_choix=(nb_choix_augmente+1)/6
        # par analyse, on sait que dans un coup, l'augmentation de nb de choix est parmi -1 0 1 2 3 4 5
        # criterion_nb_choix equal 0 si on a une augmentation de choix -1, equal 1 si on a une celle-ci de 5
        return criterion_nb_choix


    def calculate_criterion_moins_cases_voisines_petits(self):
        """
        cette méthode est pour calculer la caleur de critère 3 : après avoir joué, on a combien de cases avec 1 ou 2 grains de manière continue
        :return: nb de cases avant 1 ou 2 grains de manière continue
        ce criterion equal 0 si on a 6 cases_voisines_petits, equal 1 si on n'en a pas
        """
        is_playing=self.myGame.is_playing
        game_copy = copy.deepcopy(self.myGame)
        mon_list_after = []
        if is_playing == 0:
            if game_copy.allowed(self.myPit,game_copy.b,game_copy.is_playing):
                game_copy.play(self.myPit)
                for i in range(0,6):
                    mon_list_after.append(game_copy.b.get_pit(i))
            else:
                return None
        if is_playing == 1:
            if game_copy.allowed(self.myPit,game_copy.b,game_copy.is_playing):
                game_copy.play(self.myPit)
                for i in range(6,12):
                    mon_list_after.append(game_copy.b.get_pit(i))
            else:
                return None

        nb_cases_voisines_petits_apres=0
        nb_cases_voisines_petits_temporaire = 0
        for i in range(0,6):
            if mon_list_after[i]==1 or mon_list_after[i]==2:
                nb_cases_voisines_petits_temporaire=nb_cases_voisines_petits_temporaire+1
            else:
                if nb_cases_voisines_petits_temporaire>=nb_cases_voisines_petits_apres:
                    nb_cases_voisines_petits_apres=nb_cases_voisines_petits_temporaire
                nb_cases_voisines_petits_temporaire=0

        if nb_cases_voisines_petits_temporaire >= nb_cases_voisines_petits_apres:
            nb_cases_voisines_petits_apres = nb_cases_voisines_petits_temporaire
        criterion_moins_cases_voisines_petits=(6-nb_cases_voisines_petits_apres)/6
        #par analyse, on sait que dans un coup, nb de nb_cases_voisines_petits est parmi 0 1 2 3 4 5 6
        #ce criterion equal 0 si on a 6 cases_voisines_petits, equal 1 si on n'en a pas
        return criterion_moins_cases_voisines_petits












