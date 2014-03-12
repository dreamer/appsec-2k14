from django.db import connection
from django.shortcuts import render

# Create your views here.
from django.template.response import TemplateResponse
from .models import Post


def z1(request):
    id = request.GET.get('id')
    if id:
        Post.objects.get(id=id)
    title = request.GET.get('title', '')
    if title:
        sql2 = Post.objects.filter(title=title).query
        print str(Post.objects.filter(title=title).query)

    sql = connection.queries
    return TemplateResponse(request, 'zad1/z1.html', locals())


def z2(request):
    return TemplateResponse(request, 'zad1/z2.html', locals())