from django.urls import path

from . import views

app_name = 'web'

urlpatterns = [
    path('', views.accueil, name=('accueil')),
    path('regles_jeu/', views.regles, name=('regles_jeu')),
    path('strategie/', views.strategie, name=('strategie')),
    path('jouerIA/', views.jouerIA, name=('jouerIA')),
    path('create/', views.create_article_view, name='create')
]