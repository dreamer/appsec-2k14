from django.conf import settings
from django.conf.urls import patterns, include, url

from django.contrib import admin
admin.autodiscover()

urlpatterns = patterns('',
    # Examples:
    # url(r'^$', 'lista2.views.home', name='home'),
    # url(r'^blog/', include('blog.urls')),

    url(r'^zad2/', include('zad2.urls')),
    url(r'^zad1/', include('zad1.urls')),

    url(r'^admin/', include(admin.site.urls)),
)


if settings.DEBUG:
    import debug_toolbar
    urlpatterns += patterns('',
        url(r'^__debug__/', include(debug_toolbar.urls)),
    )
