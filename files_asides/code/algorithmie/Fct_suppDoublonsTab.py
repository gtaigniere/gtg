# suppEltTab(tab) // E-S: tab, E: Valeur à supprimer
# Fonction de suppression d'un élément d'un tableau
def suppEltTab(tab,val): # SS Booléen True si supprimé
	n=len(tab)
	for i in range(0,n):
		if tab[i]==val:
			for j in range(i+1,n):
				tab[j-1]=tab[j]
			tab.pop()
			return True
	return False

# Test de la fonction
nomTab=[2,7,14,9,11,5]
print("Tableau =",nomTab)
valeur = int(input("Entrez la valeur de l'élément à supprimer ? : "))
print()
res=suppEltTab(nomTab,valeur)
if res==True:
	print("Elément supprimé :",valeur)
else:
	print("Elément non supprimé :",valeur)
print("Tableau =",nomTab)
