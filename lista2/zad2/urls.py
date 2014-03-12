from django.conf.urls import patterns, include, url

from django.contrib import admin
admin.autodiscover()

urlpatterns = patterns('',
    # Examples:
    # url(r'^$', 'lista2.views.home', name='home'),
    # url(r'^blog/', include('blog.urls')),

    url(r'^1', 'zad2.views.z1', name='z1'),
    url(r'^2', 'zad2.views.z2', name='z2'),
    url(r'^3', 'zad2.views.z3', name='z3'),
    url(r'^4', 'zad2.views.q1', name='q1'),
    url(r'^5', 'zad2.views.q2', name='q2'),
    url(r'^6', 'zad2.views.q3', name='q3'),
    url(r'^7', 'zad2.views.q4', name='q4'),
)

