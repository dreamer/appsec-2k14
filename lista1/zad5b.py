import sys
from django.conf import settings

settings.configure(SECRET_KEY='konstantynopolitanczykowianeczka')

from django.core.signing import Signer, BadSignature


if __name__ == '__main__':
    email = sys.argv[1]
    body = " ".join(sys.argv[2:])
    signer = Signer(salt=email)
    try:
        original = signer.unsign(body)
        print original
    except BadSignature:
        print("oszust!")

