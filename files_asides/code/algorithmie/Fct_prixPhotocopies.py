# Calcul le prix d’un nombre de photocopies en appliquant le tarif suivant :
# les 10 premières coûtent 0,50 F pièce, les 20 suivantes 0,30 F pièce
# et toutes les autres 0,20 F pièce // SS: Prix
def prixPhotocopies(n):
	if n<=10:
		prix=n*10
	elif n<=30:
		prix=10*10 + (n-10)*8
	else:
		prix=10*10 + (20)*8 + (n-30)*7
	prix=prix/100 # pour l'avoir en euros
	return prix

# Test de la fonction
n = int(input('Entrez un entier ? : '))
resultat = prixPhotocopies(n)
print(resultat)
