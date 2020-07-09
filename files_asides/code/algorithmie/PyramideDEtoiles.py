# Correction
# Pyramide d'etoiles
# E: n(entier)
n = int(input('Entrez un entier ? : '))
for i in range(0,n):
	# Afficher n-i " "
	for j in range(0,n-i):
		print(" ",end='')
	# Afficher des *: 1/3/5/7
	# En fonction de i: N°ligne
	for k in range(0,i*2-1):
		print("*",end='')
	print()
