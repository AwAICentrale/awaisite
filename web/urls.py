from django.urls import path

from . import views

app_name = 'web'

urlpatterns = [
    path('', views.home_view, name='home'),
    path('game_rules/', views.game_rules_view, name='game_rules'),
    path('strategies/', views.strategies_view, name='strategies'),
    path('play_ai/', views.play_ai_view, name='play_ai'),
    path('play_local/', views.play_local_view, name='play_local'),
    path('bootstrap_test/', views.bootstrap_test_view, name='bootstrap_test'),
    path('create/', views.create_article_view, name='create'),
    path('<slug>/', views.detail_article_view, name='detail_article'),
    path('<slug>/edit', views.edit_article_view, name='edit_article'),
    # path('test/ajax_test/', views.ajax_test_view, name='ajax_test'),
    # path('jouerAlphaBeta/', views.jouerIA_AlphaBeta, name=('jouerIA_AlphaBeta')),
]
