import sys
from Crypto.Cipher import AES
import base64


key = 'This is a key123'
iv  = 'This is an IV456'

def padding(msg):
	return ' ' * (16 - len(msg) % 16)

words = open('words').read()
message = (words + padding(words)) * 10


def enc_aes():
	obj = AES.new(key, AES.MODE_CBC, iv)
	print base64.b64encode(obj.encrypt(message))

def dec_aes():
	ciphertext = open('ciphertext.aes', 'rb').read()
	obj = AES.new(key, AES.MODE_CBC, iv)
	print obj.decrypt(base64.b64decode(ciphertext))


if __name__ == '__main__':
	alg = sys.argv[1]
	if alg == 'enc_aes': enc_aes()
	if alg == 'dec_aes': dec_aes()
