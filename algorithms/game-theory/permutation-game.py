__author__ = 'jared'

"""
Alice and Bob play the following game:
    They choose a permutation of the first N numbers to begin with.
    They play alternately and Alice plays first.
    In a turn, they can remove any one remaining number from the permutation.
    The game ends when the remaining numbers form an increasing sequence. The person who played the last turn (after which the sequence becomes increasing) wins the game.
Assuming both play optimally, who wins the game? 

https://www.hackerrank.com/challenges/permutation-game
"""

def io_transform():
    num_cases = int(input())
    for i in range(num_cases):
        _ = int(input())
        list = [int(item) for item in input().split()]

if __name__ == "__main__":
    io_transform()