from django.shortcuts import render, get_object_or_404
from django.http import HttpResponse
from accounts.models import Account
from web.models import Article


def index(request):
    return render(request, 'base_generic.html', )


def accueil(request):
    return render(request, 'web/accueil.html', )


def regles(request):
    # question = get_object_or_404(Question, pk=question_id)
    return render(request, 'web/regles_jeu.html', )


def strategie(request):
    # question = get_object_or_404(Question, pk=question_id)
    return render(request, 'web/strategie.html', )


def jouerIA(request):
    # question = get_object_or_404(Question, pk=question_id)
    return render(request, 'web/jouerIA.html', )

def create_article_view(request):
    return render('web/create_article.html', {})