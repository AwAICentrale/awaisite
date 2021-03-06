from django.db import models
from django.contrib.auth.models import AbstractBaseUser, BaseUserManager

from django.db import models
from django.contrib.auth.models import AbstractBaseUser, BaseUserManager


class MyAccountManager(BaseUserManager):
    def create_user(self, email, username, password=None):
        if not email:
            raise ValueError('Veuillez renseigner une adresse mail')
        if not username:
            raise ValueError('Veuillez renseigner un nom d\'utilisateur')

        user = self.model(
            email=self.normalize_email(email),
            username=username,
        )
        user.set_password(password)
        user.save(using=self._db)
        return user

    def create_superuser(self, email, username, password):
        user = self.create_user(
            email=self.normalize_email(email),
            password=password,
            username=username,
        )
        user.is_admin = True
        user.is_staff = True
        user.is_superuser = True
        user.save(using=self._db)
        return user


class Account(AbstractBaseUser):
    email = models.EmailField(verbose_name="email", max_length=60, unique=True)
    username = models.CharField(max_length=30, unique=True)
    SKILL_LEVEL_CHOICES = [
        ('NEW', 'Nouveau à l\'awalé'),
        ('BEGINNER', 'Débutant'),
        ('INTERMEDIATE', 'Intermédiaire'),
        ('ADVANCED', 'Avancé'),
        ('EXPERT', 'Expert'),
    ]
    skill_level = models.CharField(max_length=20, choices=SKILL_LEVEL_CHOICES, default='NEW')
    date_joined = models.DateTimeField(verbose_name='date joined', auto_now_add=True)
    last_login = models.DateTimeField(verbose_name='last login', auto_now=True)
    is_admin = models.BooleanField(default=False)
    is_active = models.BooleanField(default=True)
    is_staff = models.BooleanField(default=False)
    is_superuser = models.BooleanField(default=False)

    #  statistics
    games_played = models.PositiveIntegerField(default=0)
    diff1_wins = models.PositiveIntegerField(default=0)
    diff2_wins = models.PositiveIntegerField(default=0)
    diff3_wins = models.PositiveIntegerField(default=0)
    diff4_wins = models.PositiveIntegerField(default=0)
    diff5_wins = models.PositiveIntegerField(default=0)
    wins = models.PositiveIntegerField(default=0)  # losses = games_played - wins

    USERNAME_FIELD = 'email'
    REQUIRED_FIELDS = ['username', 'password']

    objects = MyAccountManager()

    def __str__(self):
        return self.email

    # For checking permissions. to keep it simple all admin have ALL permissons
    def has_perm(self, perm, obj=None):
        return self.is_admin

    # Does this user have permission to view this app? (ALWAYS YES FOR SIMPLICITY)
    def has_module_perms(self, app_label):
        return True
