# Correction
# Somme des nombres avec demande d'arret ou de recommencer
import os # cls sous windows, clear sous linux
stop=""
while stop!="q":
	res=os.system("cls")
	n = int(input('Entrez un entier ? : '))
	som=0
	for i in range(1, n+1):
		som=som+i
	print("La somme des ",n," premiers nombres = ",som)
	print()
	stop = input("Stop ou encore : q pour quitter")
	