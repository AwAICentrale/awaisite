from django.shortcuts import render
from django.http import HttpResponse, HttpResponseRedirect
from accounts.forms import AccountForm, SignInForm
from accounts.models import Account

def inscription(request):
    # if request.method == 'POST':
    form = AccountForm(request.POST or None)
    if form.is_valid():
        prenom = form.cleaned_data['prenom']
        nom = form.cleaned_data['nom']
        sexe = form.cleaned_data['sexe']
        pseudo = form.cleaned_data['pseudo']
        mail = form.cleaned_data['mail']
        nl = form.cleaned_data['nl']
        form.save()
        return HttpResponseRedirect('/core/accueil')

    else:
        form = AccountForm()
    return render(request, 'accounts/inscription.html', {'form': form})
