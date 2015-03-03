__author__ = 'jared'

"""
Jim is off to a party and is searching for a matching pair of socks.
His drawer is filled with socks, each pair of a different color.
In its worst case scenario, how many socks (x) should Jim remove from
his drawer after which he finds a matching pair?

Link: https://www.hackerrank.com/challenges/minimum-draws
"""

def io_transform(lambda_func):
    num_cases = int(input())
    for i in range(num_cases):
        number = int(input())
        print(lambda_func(number))

if __name__ == "__main__":
    io_transform(lambda x: x + 1 if x > 0 else 0)
