from django.shortcuts import render, get_object_or_404
from django.http import HttpResponse


def index(request):
    return render(request, '../templates/base_generic.html', )

def accueil(request):
    return render(request, 'core/accueil.html',)

def profil(request):
    #question = get_object_or_404(Question, pk=question_id)
    return render(request, 'core/../templates/accounts/profil.html', )

def regles(request):
    #question = get_object_or_404(Question, pk=question_id)
    return render(request, 'core/regles_jeu.html', )

def strategie(request):
    #question = get_object_or_404(Question, pk=question_id)
    return render(request, 'core/strategie.html', )

def jouerIA(request):
    #question = get_object_or_404(Question, pk=question_id)
    return render(request, 'core/jouerIA.html', )
