from django.http import HttpResponse
from django.shortcuts import render

# Create your views here.

from awaisite.forms.forms import SignInForm

def inscription(request):
    # Construire le formulaire, soit avec les données postées,
    # soit vide si l'utilisateur accède pour la première fois
    # à la page.
    form = SignInForm(request.POST or None)
    # Nous vérifions que les données envoyées sont valides
    # Cette méthode renvoie False s'il n'y a pas de données 
    # dans le formulaire ou qu'il contient des erreurs.
    if form.is_valid(): 
        # Ici nous pouvons traiter les données du formulaire
        prenom = form.cleaned_data['prenom']
        nom = form.cleaned_data['nom']
        pseudo = form.cleaned_data['pseudo']
        mail = form.cleaned_data['mail']
        nl = form.cleaned_data['']
        datenaissance = form.cleaned_data['datenaissance']
    

        # Nous pourrions ici envoyer l'e-mail grâce aux données 
        # que nous venons de récupérer
        envoi = True
    
    # Quoiqu'il arrive, on affiche la page du formulaire.
    return render(request, 'blog/inscription.html', locals())
