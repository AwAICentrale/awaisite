"""awai URL Configuration

The `urlpatterns` list routes URLs to views. For more information please see:
    https://docs.djangoproject.com/en/2.2/topics/http/urls/
Examples:
Function views
    1. Add an import:  from my_app import views
    2. Add a URL to urlpatterns:  path('', views.home, name='home')
Class-based views
    1. Add an import:  from other_app.views import Home
    2. Add a URL to urlpatterns:  path('', Home.as_view(), name='home')
Including another URLconf
    1. Import the include() function: from django.urls import include, path
    2. Add a URL to urlpatterns:  path('blog/', include('blog.urls'))
"""
from django.contrib import admin
<<<<<<< HEAD
from django.urls import path
from awaisite import views

urlpatterns = [
    path('admin/', admin.site.urls),
	path('inscription/', views.inscription),
	path('inscription2/', views.inscription2),
	path('thanks/', views.thanks),
=======
from django.urls import include, path

urlpatterns = [
    path('admin/', admin.site.urls),
    path('awaisite/', include('awaisite.urls')),
>>>>>>> 1b7825ff394568b2056148336500337ec2be3f5a
]
