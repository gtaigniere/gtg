# Permet de choisir un programme qui sera exécuté puis de laisser à l'utilisateur
# le choix d'en choisir un autre ensuite ou d'arrêter
import os # cls sous windows, clear sous linux

# Définition des fonctions
# Double d'un nombre
def double(n):
	double = 2 * n
	return double

# Calcule du prix TTC
def prixTTC(prixHT):
	prixTTC = prixHT+prixHT*tva/100
	return prixTTC

# Plus grand de 2 nombres
def plusGrandDe2Nombres(x1,x2):
	if x1>x2:
		max=x1
	else:
		max=x2
	return max

# Plus grand de 3 nombres
def plusGrandDe3Nombres(x1,x2,x3):
	if x1>x2:
		if x1>x3:
			max=x1
		else:
			max=x3
	else:
		if x2>x3:
			max=x2
		else:
			max=x3
	return max

# Inverse d'un nombre
def inverseD1Nombre(x):
	if x==0:
		ok=False
	else:
		ok=True
		invX=1/x
	if ok:
		# print("invX : ",round(invX,2))
		inv=("L'inverse de",x,"est :",invX)
	else:
		# print("0 n\'a pas d\'inverse")
		inv=("0 n\'a pas d\'inverse")
	return inv

# Permuter 2 nombres

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

# Programme
stop=""
while stop!="q":
	res=os.system("cls")
	print("			Programmes disponibles")
	print()
	print("		1) Double d'un nombre")
	print("		2) Calcul du prix TTC")
	print("		3) Plus grand de 2 nombres")
	print("		4) Plus grand de 3 nombres")
	print("		5) Inverse d'un nombre")
	print("		6) Permuter 2 nombres")
	print("		7) Calcul du prix de photocopies")
	print()
	print()
	choix = int(input("Veuillez choisir un des programmes ci-dessus (1 à 7) ?"))
	print()
	if choix==1:
		n = float(input('Entrez un entier ? : '))
		print()
		print(double(n))
	if choix==2:
		prixHT = float(input('prixHT ? : '))
		tva = float(input('TVA parmi 20%, 10%, 5.5% ou 2.1% (sans le %) ? : '))
		print()
		print("Prix TTC : ",prixTTC(prixHT))
	if choix==3:
		x1 = float(input('Entrez x1 ? : '))
		x2 = float(input('Entrez x2 ? : '))
		plusGrand = plusGrandDe2Nombres(x1,x2)
		print()
		print("Le plus grand est : ",plusGrand)
	if choix==4:
		x1 = float(input('Entrez x1 ? : '))
		x2 = float(input('Entrez x2 ? : '))
		x3 = float(input('Entrez x3 ? : '))
		plusGrand = plusGrandDe3Nombres(x1,x2,x3)
		print()
		print("Le plus grand est : ",plusGrand)
	if choix==5:
		x = float(input('Entrez un nombre ? : '))
		res = inverseD1Nombre(x)
		print()
		print(res)
	"""
	if choix==6:
	"""
	if choix==7:
		n = int(input('Combien de photocopies voulez-vous ? : '))
		prix = prixPhotocopies(n)
		print()
		print("Le prix total est de :",prix)
	print()
	stop = input("Stop ou encore : q pour quitter")
