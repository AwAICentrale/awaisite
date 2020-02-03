from django.urls import path

from . import views

app_name = 'web'

urlpatterns = [
    path('', views.accueil, name=('accueil')),
    path('regles_jeu/', views.regles, name=('regles_jeu')),
    path('strategie/', views.strategie, name=('strategie')),
    path('jouerIA/', views.jouerIA_ALea, name=('jouerIA')),
    path('jouerMiniMax/', views.jouerIA_MiniMax, name=('jouerIA_MiniMax')),
    path('jouerAlphaBeta/', views.jouerIA_AlphaBeta, name=('jouerIA_AlphaBeta')),
    path('create/', views.create_article_view, name='create')
]
