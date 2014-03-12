from django.conf.urls import patterns, url

from blog import views

urlpatterns = patterns('',
    url(r'create', views.create, name='create'),
    url(r'^$', views.index, name='index')
)