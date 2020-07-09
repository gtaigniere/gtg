# nbJoursDansMois(mois)
# SS: Entier, Indique le nombre de jour dans d un mois dans une annee
def NbJoursDansMois(mois,annee):
	if mois<1:return 0
	if mois>12:return 0
	switch(mois): # Pas de switch en python
		1,3,5,7,8,10,12:return 31
		4,6,9,11:return 30
		2:
			if annee%400==0:return 29
			if annee%100==0:return 28
			if annee%4==0:return 29
			return 28

# Test de la fonction
mois = int(input("Entrez un entier pour au mois (1 à 12) ? : "))
annee = int(input("Entrez un entier pour l'année ? : "))
resultat = nbJoursDansMois(mois,annee)
print(resultat)
