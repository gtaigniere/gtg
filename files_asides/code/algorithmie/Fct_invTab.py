# invTab(tab) // E-S: tab
# Fonction d'inversion d'un tableau
def invTab(tab): # SS Rien, pas de return
	n=len(tab)
	for i in range(0,(n-1)//2):
		tmp=tab[i]
		tab[i]=tab[n-1-i]
		tab[n-1-i]=tmp

# Test de la fonction
nomTab=[2,7,14,9,11,5]
print("Tableau =",nomTab)
invTab(nomTab)
print("Tableau inversé =",nomTab)
