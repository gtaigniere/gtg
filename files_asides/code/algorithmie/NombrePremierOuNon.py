# Correction
# Nombre Premier ou non ?
premier=True
n = int(input('Entrez un entier ? : '))
for i in range(2, n-1):
	print(i)
	if n%i==0:
		premier = False
		break
print(premier)

#1202843
premier=True
n = int(input('Entrez un entier ? : '))
if n%2==0:
	premier = False
else:
	i=3
	while i*i<n:
		print(i)
		if n%i==0:
			premier = False
			break
			i=i+2
print(premier)
