from django.shortcuts import render

# Create your views here.
from django.template.response import TemplateResponse
from BeautifulSoup import BeautifulSoup

def z1(request):
    q = request.GET.get('q', '')
    return TemplateResponse(request, 'zad1/z1.html', locals())


def z2(request):
    q = request.GET.get('q', '')
    return TemplateResponse(request, 'zad1/z2.html', locals())

def z3(request):
    q = request.GET.get('q', '')
    return TemplateResponse(request, 'zad1/z3.html', locals())


def q1(request):
    text = request.POST.get('text', '')
    return TemplateResponse(request, 'zad1/q1.html', locals())

def q2(request):
    text = request.POST.get('text', '')
    return TemplateResponse(request, 'zad1/q2.html', locals())

def q3(request):
    text = request.POST.get('text', '')
    return TemplateResponse(request, 'zad1/q3.html', locals())





acceptable_elements = ['a', 'abbr', 'acronym', 'address', 'area', 'b', 'big',
      'blockquote', 'br', 'button', 'caption', 'center', 'cite', 'code', 'col',
      'colgroup', 'dd', 'del', 'dfn', 'dir', 'div', 'dl', 'dt', 'em',
      'font', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'hr', 'i', 'img',
      'ins', 'kbd', 'label', 'legend', 'li', 'map', 'menu', 'ol',
      'p', 'pre', 'q', 's', 'samp', 'small', 'span', 'strike',
      'strong', 'sub', 'sup', 'table', 'tbody', 'td', 'tfoot', 'th',
      'thead', 'tr', 'tt', 'u', 'ul', 'var']

acceptable_attributes = ['abbr', 'accept', 'accept-charset', 'accesskey',
  'action', 'align', 'alt', 'axis', 'border', 'cellpadding', 'cellspacing',
  'char', 'charoff', 'charset', 'checked', 'cite', 'clear', 'cols',
  'colspan', 'color', 'compact', 'coords', 'datetime', 'dir',
  'enctype', 'for', 'headers', 'height', 'href', 'hreflang', 'hspace',
  'id', 'ismap', 'label', 'lang', 'longdesc', 'maxlength', 'method',
  'multiple', 'name', 'nohref', 'noshade', 'nowrap', 'prompt',
  'rel', 'rev', 'rows', 'rowspan', 'rules', 'scope', 'shape', 'size',
  'span', 'src', 'start', 'summary', 'tabindex', 'target', 'title', 'type',
  'usemap', 'valign', 'value', 'vspace', 'width']


def clean_html( fragment ):
    while True:
        soup = BeautifulSoup( fragment )
        removed = False
        for tag in soup.findAll(True):
            if tag.name not in acceptable_elements:
                tag.extract()
                removed = True
            else:
                for attr in tag._getAttrMap().keys():
                    if attr not in acceptable_attributes:
                        del tag[attr]

        fragment = unicode(soup)

        if removed:
            continue

        return fragment



def q4(request):
    text = clean_html(request.POST.get('text', ''))
    return TemplateResponse(request, 'zad1/q2.html', locals())