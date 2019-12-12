<<<<<<< HEAD
from django.http import HttpResponse
from django.shortcuts import render
from django.http import HttpResponseRedirect
from django.core.mail import send_mail

#

from awaisite.forms import SignInForm
from awaisite.forms import AccountForm
from awaisite.models import Account

def inscription(request):
    # Construire le formulaire, soit avec les données postées,
    # soit vide si l'utilisateur accède pour la première fois
    # à la page.
    form = SignInForm(request.POST or None)
    # Nous vérifions que les données envoyées sont valides
    #Cette méthode renvoie False s'il n'y a pas de données 
    # dans le formulaire ou qu'il contient des erreurs. #
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
    return render(request, 'awaisite/inscription.html', locals())
    
def inscription2(request):
    #if request.method == 'POST':
        form = AccountForm(request.POST or None)
        if form.is_valid():
            prenom = form.cleaned_data['prenom']
            nom = form.cleaned_data['nom']
            sexe = form.cleaned_data['sexe']
            pseudo = form.cleaned_data['pseudo']
            mail = form.cleaned_data['mail']
            nl = form.cleaned_data['nl']
            
            """
            adresse = ['julien.chapuy@centrale.centralelille.fr']
            
            if nl:
                adresse.append(mail)
                
            send_mail(prenom, nom, mail, adresse)"""  
                
            #Account.objects.create(prenom = form['prenom'], nom = form['nom'], sexe = form['sexe'], pseudo = form['pseudo'], mail = form['mail'], nl = form['nl']))
            
            form.save()
            
            return HttpResponseRedirect('/thanks/')
        
        
        else:
            form = AccountForm()
    
        return render(request, 'awaisite/inscription.html', 
                            {'form' : form})
    
def thanks(request):
    return render(request, 'awaisite/inscription.html', locals())
        
    
=======
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
>>>>>>> 1b7825ff394568b2056148336500337ec2be3f5a
