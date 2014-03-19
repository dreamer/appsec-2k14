"""
Scenariusz:
- student glosuje na przedmioty i chce dostac potwierdzenie glosu, ktore moze sluzyc do reklamacji
- po oddaniu glosu system podpisuje go i wysyla stan systemu
- mija pol roku
- student nie zgadza sie ze stanem systemu
- dostarcza potwierdzenie z maila.
- jezeli: podpis lub email sie nie zgadza system powinien odrzucic potwierdzenie
- w p.p. informowac o slusznosci roszczen

- zad5.py generowanie potwierdznia
- zad5b.py weryfikacja (argumenty: email [tresc maila]
"""
from django.conf import settings

settings.configure(SECRET_KEY='konstantynopolitanczykowianeczka')

from django.core.signing import Signer


def send_mail(to, body):
    print "TO: " + str(to)
    print "BODY:" + str(sign(body, to))


def sign(text, to):
    signer = Signer(salt=to)
    return signer.sign(text)

votes = [('AISD', 3), ('JFIZO', 1)]


def process(email):
    msg = ''
    for v in votes:
        msg += str(v[0]) + ': ' + str(v[1])

    send_mail(email, msg)

if __name__ == '__main__':
    process('foo@bar.com')
