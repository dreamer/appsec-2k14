from django.shortcuts import render
from django.http import HttpResponse, HttpResponseRedirect
from blog.models import Post
from django.db import connection

def index(request):
  return render(request, 'blog.html', {'posts': Post.objects.all()})

def create(request):
  print(request.POST['title'])
  p = Post(title=request.POST['title'], content=request.POST['content'])
  p.save()
  print(connection.queries[-1])
  return HttpResponseRedirect('/blog')