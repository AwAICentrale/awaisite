from django import forms
from .models import Account
from django.contrib.auth.forms import UserCreationForm
from django.contrib.auth import authenticate

from accounts.models import Account

class RegistrationForm(UserCreationForm):
    # S'inscire
    email = forms.EmailField(max_length=60, help_text='Obligatoire. Veuillez renseigner une adresse mail valide.')

    class Meta:
        model = Account
        fields = ('email', 'username', 'password1', 'password2')

class AuthenticationForm(forms.ModelForm):
    # Se connecter
    password = forms.CharField(label='Password', widget=forms.PasswordInput)

    class Meta:
        model = Account
        fields = ('email', 'password')

    def clean(self):
        if self.is_valid():
            email = self.cleaned_data['email']
            password = self.cleaned_data['password']
            if not authenticate(email=email, password=password):
                raise forms.ValidationError("Invalid login")

class AccountUpdateForm(forms.ModelForm):
    class Meta:
        model = Account
        fields = ('email', 'username')

    def clean_email(self):
        if self.is_valid():
            email = self.cleaned_data['email']
            # email must be unique
            try:
                account = Account.objects.exclude(pk=self.instance.pk).get(email=email)
            except Account.DoesNotExist:
                return email
            raise forms.ValidationError('L\'adresse mail "%s" est déjà utilisée.' % account.email)

    def clean_username(self):
        if self.is_valid():
            username = self.cleaned_data['username']
            # username must be unique
            try:
                account = Account.objects.exclude(pk=self.instance.pk).get(email=email)
            except Account.DoesNotExist:
                return username
            raise forms.ValidationError('Ce nom d\'utilisateur "%s" est déjà utilisé.' % account.username)


# class SignInForm(forms.Form):
#     prenom = forms.CharField(max_length=20, label = "Prénom :")
#     nom = forms.CharField(max_length = 20, label = "Nom :")
#     pseudo = forms.CharField(max_length = 20, label = "Votre pseudo :")
#     mail = forms.EmailField(label = "Votre adresse mail :")
#     datenaissance = forms.DateField(label = "Date de naissance :", input_formats = ['%d/%m/%Y'])
#     nl = forms.BooleanField(label = "", help_text="Souhaitez-vous recevoir régulièrement notre Newsletter ?", required=False)
#
# class AccountForm(forms.ModelForm):
#     class Meta:
#         model = Account
#         exclude = ('ident', 'statut')
