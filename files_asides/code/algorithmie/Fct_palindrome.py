# palindrome(mot) // E: Ch ,SS: Booléen : Vrai si palindrome
# Indique si un mot est un palindrome
def palindrome(mot):
	mot2=""
	for i in range(n-1,0):
		mot2=mot2+mot1[i]
	if mot1==mot2:
		return True
	else:
		return False

# Test de la fonction
mot = str(input("Taper un mot ? : "))
pal = palindrome(mot)
print()
print(pal)
