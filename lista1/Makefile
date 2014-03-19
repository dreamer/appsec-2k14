ciphertext.aes:
	python zad1.py enc_aes > $@

decrypted.aes:
	python zad1.py dec_aes > $@

ciphertext.des3:
	python zad1.py enc_des3 > $@

decrypted.des3:
	python zad1.py dec_des3 > $@

ciphertext.blowfish:
	python zad1.py enc_blowfish > $@

decrypted.blowfish:
	python zad1.py dec_blowfish > $@

clean:
	rm *.{aes,des3,blowfish}

.PHONY: clean *.aes *.des3 *.blowfish
