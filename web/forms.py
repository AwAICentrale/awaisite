from django import forms
from web.models import Article


class CreateArticleForm(forms.ModelForm):
    class Meta:
        model = Article
        fields = ['title', 'body', 'image']
