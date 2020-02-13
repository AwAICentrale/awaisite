from django.shortcuts import render, redirect
from django.http import HttpResponse, HttpResponseRedirect
# from accounts.forms import AccountForm, SignInForm
from django.contrib.auth import login, authenticate, logout
from accounts.forms import RegistrationForm, AuthenticationForm, AccountUpdateForm
from accounts.models import Account
from web.models import Article
from django.db.models import Sum, F


def registration_view(request):
    context = {}
    if request.POST:
        form = RegistrationForm(request.POST)
        if form.is_valid():
            form.save()
            email = form.cleaned_data.get('email')
            raw_password = form.cleaned_data.get('password1')
            skill_level = form.cleaned_data.get('skillLevel')
            account = authenticate(email=email, password=raw_password)
            login(request, account)
            return redirect('web:home')
        else:
            context['registration_form'] = form
    else:
        form = RegistrationForm()
        context['registration_form'] = form
    return render(request, 'accounts/register.html', context)


def logout_view(request):
    logout(request)
    return redirect('web:home')


def login_view(request):
    context = {}
    user = request.user
    if user.is_authenticated:
        return redirect('web:home')
    if request.POST:
        form = AuthenticationForm(request.POST)
        if form.is_valid():
            email = request.POST['email']
            password = request.POST['password']
            user = authenticate(email=email, password=password)
            if user:
                login(request, user)
                return redirect('web:home')
    else:
        form = AuthenticationForm()
    context['login_form'] = form
    return render(request, 'accounts/login.html', context)


def account_view(request):
    context = {}
    user = request.user
    context['user'] = user
    articles = Article.objects.filter(author=request.user)
    context['articles'] = articles
    user.wins = user.diff1_wins + user.diff2_wins + user.diff3_wins + user.diff4_wins + user.diff5_wins
    user.save()
    return render(request, 'accounts/profile.html', context)


def account_edit_view(request):
    if not request.user.is_authenticated:
        return redirect('accounts:login')
    context = {}
    if request.POST:
        form = AccountUpdateForm(request.POST, instance=request.user)
        if form.is_valid():
            form.initial = {
                "email": request.POST['email'],
                "username": request.POST['username'],
            }
            form.save()
    else:
        form = AccountUpdateForm(
            initial={
                "email": request.user.email,
                "username": request.user.username,
            }
        )
    context['account_form'] = form
    return render(request, 'accounts/profile_edit.html', context)


def must_authenticate(request):
    return render(request, 'accounts/must_authenticate.html', )


def must_admin(request):
    return render(request, 'accounts/must_admin.html', )
