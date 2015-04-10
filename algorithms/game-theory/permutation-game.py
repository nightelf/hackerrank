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

class InversionGraph():
    adjacency = {}
    def __init__(self, perm_list):
        for key, value in enumerate(perm_list):
            for i in enumerate(perm_list[key:]:

                # _add_edge(node_1, node_2)

    def _add_edge(self, node_1, node_2):
        _add_edge_node(self, node_1, node_2)
        _add_edge_node(self, node_2, node_1)

    def _add_edge_node(self, node_1, node_2)
        if self.adjacency.has_key(node_1):
            self.adjacency[node_1].append(node_2):
        else:
            self.adjacency[node_1] = [node_2]

def get_input():
    num_cases = int(input())
    for i in range(num_cases):
        _ = int(input())
        list = [int(item) for item in input().split()]
    return InversionGraph(list)

if __name__ == "__main__":
    graph = get_input()