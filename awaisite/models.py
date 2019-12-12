from django.db import models

# Create your models here.

class Account(models.Model):
    prenom = models.CharField(max_length = 50)
    nom = models.CharField(max_length = 50)
    sexe = models.CharField(max_length = 10)
    date_naissance = models.DateField()
    pseudo = models.CharField(max_length = 50)
    mail = models.EmailField()
    nl = models.BooleanField()
    statut = models.CharField(max_length = 5)
    