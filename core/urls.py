from django.urls import path

from . import views

app_name = 'core'

urlpatterns = [
    path('', views.index, name=('index')),
    path('accueil', views.accueil, name=('accueil')),
    path('profil', views.profil, name=('profil')),
    path('regles_jeu', views.regles, name=('regles_jeu')),
    path('strategie', views.strategie, name=('strategie')),
    path('jouerIA', views.jouerIA, name=('jouerIA')),
]