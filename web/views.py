from django.shortcuts import render, get_object_or_404, redirect
from django.db.models import Q  # for search bar
from django.http import HttpResponse
from django.urls import reverse_lazy
from accounts.models import Account
from web.models import Article
from web.forms import CreateArticleForm, UpdateArticleForm
from operator import attrgetter
from django.views.decorators.csrf import csrf_exempt


def home_view(request):
    context = {}
    query = ""
    if request.GET:
        query = request.GET['q']
        context['query'] = str(query)

    articles = sorted(get_article_queryset(query), key=attrgetter('date_updated'), reverse=True)  # sort articles by latest updated
    context['articles'] = articles
    return render(request, 'web/home.html', context)


def game_rules_view(request):
    # question = get_object_or_404(Question, pk=question_id)
    return render(request, 'web/game_rules.html', )


def strategies_view(request):
    # question = get_object_or_404(Question, pk=question_id)
    return render(request, 'web/strategies.html', )


def play_ai_view(request):
    # question = get_object_or_404(Question, pk=question_id)
    return render(request, 'web/play_ai.html', )


def play_local_view(request):
    # question = get_object_or_404(Question, pk=question_id)
    return render(request, 'web/play_local.html', )


def bootstrap_test_view(request):
    return render(request, 'web/bootstrap_test.html', )


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


def detail_article_view(request, slug):
    context = {}
    article = get_object_or_404(Article, slug=slug)
    context['article'] = article
    return render(request, 'web/detail_article.html', context)


def edit_article_view(request, slug):
    context = {}
    success_url = reverse_lazy('web:detail_article')
    user = request.user
    if not user.is_authenticated:
        return redirect('accounts:must_authenticate')
    if not user.is_admin:
        return redirect('accounts:must_admin')

    article = get_object_or_404(Article, slug=slug)
    if request.POST:
        form = UpdateArticleForm(request.POST or None, request.FILES or None, instance=article)
        if form.is_valid():
            obj = form.save(commit=False)
            obj.save()
            context['success_message'] = 'updated'
            article = obj
    form = UpdateArticleForm(
        initial={
            'title': article.title,
            'body': article.body,
            'image': article.image
        }
    )
    context['form'] = form
    return render(request, 'web/edit_article.html', context)


def get_article_queryset(query=None):
    queryset = []
    queries = query.split(" ")  # for example : awai game strategy = [awai, game, strategy]
    for q in queries:
        articles = Article.objects.filter(
            Q(title__icontains=q) |
            Q(body__icontains=q)
        ).distinct()

        for article in articles:
            queryset.append(article)

    return list(set(queryset))  # make sure list is unique


@csrf_exempt
def statistics_test(request):
    print("we are in")
    if request.POST:
        if 'aiName' in request.POST:
            aiName = request.POST['aiName']
            user = request.user
            user.games_played += 1
            if aiName == "diff1_update":
                user.diff1_wins += 1
            elif aiName == "diff2_update":
                user.diff2_wins += 1
            elif aiName == "diff3_update":
                user.diff3_wins += 1
            elif aiName == "diff4_update":
                user.diff4_wins += 1
            elif aiName == "diff5_update":
                user.diff5_wins += 1
            user.save()
            return HttpResponse("success")
    return HttpResponse("fail")
