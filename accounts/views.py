from django.shortcuts import render, redirect
from django.http import HttpResponse, HttpResponseRedirect
# from accounts.forms import AccountForm, SignInForm
from django.contrib.auth import login, authenticate, logout
from accounts.forms import RegistrationForm, AuthenticationForm, AccountUpdateForm
from accounts.models import Account


def registration_view(request):
    context = {}
    if request.POST:
        form = RegistrationForm(request.POST)
        if form.is_valid():
            form.save()
            email = form.cleaned_data.get('email')
            raw_password = form.cleaned_data.get('password1')
            account = authenticate(email=email, password=raw_password)
            login(request, account)
            return redirect('web:accueil')
        else:
            context['registration_form'] = form
    else:
        form = RegistrationForm()
        context['registration_form'] = form
    return render(request, 'accounts/register.html', context)


def logout_view(request):
    logout(request)
    return redirect('web:accueil')


def login_view(request):
    context = {}
    user = request.user
    if user.is_authenticated:
        return redirect('web:accueil')
    if request.POST:
        form = AuthenticationForm(request.POST)
        if form.is_valid():
            email = request.POST['email']
            password = request.POST['password']
            user = authenticate(email=email, password=password)
            if user:
                login(request, user)
                return redirect('web:accueil')
    else:
        form = AuthenticationForm()
    context['login_form'] = form
    return render(request, 'accounts/login.html', context)


def account_view(request):
    # user = Account.objects.get(email=email)
    context = {}
    return render(request, 'accounts/profile.html', context)


def account_edit_view(request):
    if not request.user.is_authenticated:
        return redirect('accounts:login')
    context = {}
    if request.POST:
        form = AccountUpdateForm(request.POST)
        if form.is_valid():
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
