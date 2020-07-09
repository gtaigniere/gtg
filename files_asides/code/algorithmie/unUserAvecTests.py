# Fonctions pour un User

def newUser(nom, mail, motDePasse, anneeNaissance):
	unUser={}; # forcément remettre à vide
	unUser['nom']=nom;
	unUser['mail']=mail;
	unUser['motDePasse']=motDePasse;
	unUser['anneeNaissance']=anneeNaissance;
	return unUser;

def printUnUserV0(unUser):
	print("printUnUserV0(unUser): ",
	unUser['nom'],'-',
	unUser['mail'], '-' ,
	unUser['motDePasse'], '-' ,
	unUser['anneeNaissance']);

print('\nCréation d\'un utilisateur')
unUser=newUser('toto','toto@gmail.com','azerty', 1995)

print("print('unUser') : ",unUser)
printUnUserV0(unUser)

def calculerAge(anneeNaissance):
	from datetime import date
	year=date.today().year
	age=year-anneeNaissance;
	return age;

def printUnUser(unUser):
	print("printUnUser(unUser): ",
	unUser['nom'],'-',
	unUser['mail'], '-' ,
	unUser['motDePasse'], '-' ,
	calculerAge(unUser['anneeNaissance']));

printUnUser(unUser)