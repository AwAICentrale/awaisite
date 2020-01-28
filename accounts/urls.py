from django.urls import path
from django.contrib.auth import views as auth_views
from . import views

app_name = 'accounts'

urlpatterns = [
    path('register/', views.registration_view, name='register'),
    path('login/', views.login_view, name='login'),
    path('logout/', views.logout_view, name='logout'),
    path('profile/', views.account_edit_view, name='profile'),
    path('profile/edit/', views.account_edit_view, name='profile_edit'),

    # # Password reset (ref:  https://github.com/django/django/blob/master/django/contrib/auth/views.py)
    # path('password_change/', auth_views.PasswordChangeView.as_view(template_name='registration/password_change.html'), name='password_change'),
    # path('password_change/done/', auth_views.PasswordChangeDoneView.as_view(template_name='registration/password_change_done.html'),
    #      name='password_change_done'),
    # path('password_reset/', auth_views.PasswordResetView.as_view(), {'email_template_name': 'registration/password_reset_email.html',
    #                                                                  'subject_template_name': 'registration/password_reset_subject.txt',
    #                                                                  'post_reset_redirect': 'accounts:password_reset_done',
    #                                                                  'from_email': 'accounts@awai.com',
    #                                                                  }, name='password_reset'),
    # path('password_reset/done/', auth_views.PasswordResetCompleteView.as_view(template_name='password_reset_done.html'),
    #      name='password_reset_done'),
    # path('reset/<uidb64>/<token>/', auth_views.PasswordResetConfirmView.as_view(), name='password_reset_confirm'),
    # path('reset/done/', auth_views.PasswordResetCompleteView.as_view(template_name='registration/password_reset_complete.html'),
    #      name='password_reset_complete'),
]
