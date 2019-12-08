from django.shortcuts import render, get_object_or_404
from django.http import HttpResponse


def index(request):
    return HttpResponse("Bienvenue sur le site awai !")

def profil(request):
    #question = get_object_or_404(Question, pk=question_id)
    return render(request, 'awaisite/profil.html', )

def regles(request):
    #question = get_object_or_404(Question, pk=question_id)
    return render(request, 'awaisite/regles_jeu.html', )

def strategie(request):
    #question = get_object_or_404(Question, pk=question_id)
    return render(request, 'awaisite/strategie.html', )

def jouerIA(request):
    #question = get_object_or_404(Question, pk=question_id)
    return render(request, 'awaisite/jouerIA.html', )
