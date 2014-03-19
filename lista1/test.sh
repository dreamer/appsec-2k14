#!/bin/sh
time make ciphertext.aes
time make decrypted.aes
time make ciphertext.des3
time make decrypted.des3
make clean
