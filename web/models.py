from django.db import models

from django.db.models.signals import pre_save, post_delete
from django.utils.text import slugify
from django.conf import settings
from django.dispatch import receiver


def upload_location(instance, filename, **kwargs):
    file_path = 'article/{author_id}/{title}-{filename}'.format(
        author_id=str(instance.author.id), title=str(instance.title), filename=filename
    )
    return file_path


class Article(models.Model):
    title = models.CharField(max_length=50, null=False, blank=False)
    body = models.TextField(max_length=5000, null=False, blank=False)
    image = models.ImageField(upload_to=upload_location, null=False, blank=False)
    date_published = models.DateTimeField(auto_now_add=True, verbose_name="date published")
    date_updated = models.DateTimeField(auto_now_add=True, verbose_name="date updated")
    author = models.ForeignKey(settings.AUTH_USER_MODEL, on_delete=models.CASCADE)  # if user is deleted we delete posts -> CASCADE
    slug = models.SlugField(blank=True, unique=True)  # url for the article

    def __str__(self):
        return self.title


# Delete image if post containing image is deleted to save space
@receiver(post_delete, sender=Article)
def submission_delete(sender, instance, **kwargs):
    instance.image.delete(False)


def pre_save_article_receiver(sender, instance, **kwargs):
    if not instance.slug:
        # slug should unique because username is unique, can make title unique
        instance.slug = slugify(instance.author.username + "-" + instance.title)


pre_save.connect(pre_save_article_receiver, sender=Article)
