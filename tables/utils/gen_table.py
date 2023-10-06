
print("{\n\t[{")

for i in range (1, 100):
	print('\t\t{{\n\t\t\t"id": {},\n\t\t\t"en_EN": "",\n\t\t\t"es_ES": ""\n\t\t}},'.format(i))


print("\t}]\n}")
