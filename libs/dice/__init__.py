import random

def _roll(facets, n = 1, added = False):
        rolls=[]
        for i in range(0,n):
                rolls.append(random.randrange(facets))

        if added:
                return sum(rolls)
        else:
                for i in rolls:
                        return i


def d4(n = 1, added = False):
	return _roll(4, n, added)

def d6(n = 1, added = False):
	return _roll(6, n, added)

def d8(n = 1, added = False):
	return _roll(8, n, added)

def d10(n = 1, added = False):
	return _roll(10, n, added)

def d12(n = 1, added = False):
	return _roll(12, n, added)

def d20(n = 1, added = False):
	return _roll(20, n, added)



print(d10(1,True))

