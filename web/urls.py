from django.urls import path

from . import views

app_name = 'web'

urlpatterns = [
    path('', views.home_view, name=('home')),
    path('game_rules/', views.game_rules_view, name=('game_rules')),
    path('strategies/', views.strategies_view, name=('strategies')),
    path('play_ai/', views.play_ai_view, name=('play_ai')),
    path('create/', views.create_article_view, name='create'),
    path('<slug>/', views.detail_article_view, name='detail_article'),
    path('<slug>/edit', views.edit_article_view, name='edit_article'),
    path('test/ajax_test/', views.ajax_test_view, name='ajax_test'),
    path('', views.accueil, name=('accueil')),
    path('regles_jeu/', views.regles, name=('regles_jeu')),
    path('strategie/', views.strategie, name=('strategie')),
    path('jouerIA/', views.jouerIA_ALea, name=('jouerIA')),
    path('jouerMiniMax/', views.jouerIA_MiniMax, name=('jouerIA_MiniMax')),
    path('jouerAlphaBeta/', views.jouerIA_AlphaBeta, name=('jouerIA_AlphaBeta')),
    path('create/', views.create_article_view, name='create')
]