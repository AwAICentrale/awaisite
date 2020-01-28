from django.shortcuts import render, get_object_or_404, redirect
from django.http import HttpResponse
from accounts.models import Account
from web.models import Article
from web.forms import CreateArticleForm
from operator import attrgetter


def index(request):
    return render(request, 'base_generic.html', )


def accueil(request):
    context = {}
    articles = sorted(Article.objects.all(), key=attrgetter('date_updated'), reverse=True)  # sort articles by latest updated
    context['articles'] = articles
    return render(request, 'web/accueil.html', context)


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
    context = {}
    user = request.user
    if not user.is_authenticated:
        return redirect('accounts:must_authenticate')
    if not user.is_admin:
        return redirect('accounts:must_admin')
    form = CreateArticleForm(request.POST or None, request.FILES or None)
    if form.is_valid():
        obj = form.save(commit=False)
        author = Account.objects.filter(email=user.email).first()  # returns query set by default so must call .first()
        obj.author = author
        obj.save()
        form = CreateArticleForm()  # reset form to default

    context['form'] = form
    return render(request, 'web/create_article.html', context)

