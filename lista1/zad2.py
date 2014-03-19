import sys
import base64
from django.conf import settings

settings.configure()

from django.contrib.auth.hashers import MD5PasswordHasher, SHA1PasswordHasher, CryptPasswordHasher, PBKDF2PasswordHasher, PBKDF2SHA1PasswordHasher

words = open('words').read()

message = words * 10

salt = 'konstantynopolitanczykowianeczka'


def enc_md5():
    obj = MD5PasswordHasher()
    print base64.b64encode(obj.encode(message, salt))


def enc_SHA1():
    obj = SHA1PasswordHasher()
    print base64.b64encode(obj.encode(message, salt))

def enc_crypt():
    obj = CryptPasswordHasher()
    print base64.b64encode(obj.encode(message, 'aa'))


def enc_pbkdf2():
    obj = PBKDF2PasswordHasher()
    print base64.b64encode(obj.encode(message, salt))

def enc_pbkdf2sha1():
    obj = PBKDF2SHA1PasswordHasher()
    print base64.b64encode(obj.encode(message, salt))

if __name__ == '__main__':
    alg = sys.argv[1]
    if alg == 'enc_md5': enc_md5()
    if alg == 'enc_uSHA1': enc_SHA1()
    if alg == 'enc_crypt': enc_crypt()
    if alg == 'enc_pbkdf2': enc_pbkdf2()
    if alg == 'enc_pbkdf2sha1': enc_pbkdf2sha1()

