__author__ = 'jared'

from fractions import gcd
from sys import stdin, stdout

"""
Problem:
Martha is interviewing at Subway. One of the rounds of the interview
requires her to cut a bread of size l x b into smaller identical pieces such that
each piece is a square having maximum possible side length with no left over piece of bread.

Link: https://www.hackerrank.com/challenges/restaurant
"""

line = stdin.readline()
rectangle_count = int(line.strip())
for i in range(rectangle_count):
    width, height = stdin.readline().split()
    width, height = int(width), int(height)
    factor = gcd(width, height)
    squares = width / factor * height / factor
    stdout.write(str(int(squares)))
    stdout.write("\n")
