from django.urls import path

from . import views

app_name = 'awaisite'

urlpatterns = [
    path('', views.index, name=('index')),
    path('profil', views.profil, name=('profil')),
    path('regles_jeu', views.regles, name=('regles_jeu')),
    path('strategie', views.strategie, name=('strategie')),
    path('jouerIA', views.jouerIA, name=('jouerIA')),
]