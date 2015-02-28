
__author__ = 'jared'

import json
from sys import stdin, stdout

"""
Problem:
You are given a tree (a simple connected graph with no cycles). You have to remove
as many edges from the tree as possible to obtain a forest with the condition that : 
Each connected component of the forest should contain an even number of vertices.

Link: https://www.hackerrank.com/challenges/even-tree
"""

class Graph():

    adj_list = {}

    def add_edge(self, node_1, node_2):

        if not node_1 in self.adj_list:
            self.adj_list[node_1] = set()
        self.adj_list[node_1].add(node_2)

        if not node_2 in self.adj_list:
            self.adj_list[node_2] = set()
        self.adj_list[node_2].add(node_1)

    def __str__(self):

        def set_default(obj):
            if isinstance(obj, set):
                return list(obj)
            raise TypeError

        return json.dumps(self.adj_list, default=set_default, sort_keys=True, indent=4, separators=(',', ': '))


def read_graph():

    num_vertices, num_edges = stdin.readline().split()
    num_vertices, num_edges = int(num_vertices), int(num_edges)
    graph = Graph()

    for i in range(num_edges):
        node_1, node_2 = stdin.readline().split()
        node_1, node_2 = int(node_1), int(node_2)
        graph.add_edge(node_1, node_2)

    return graph

if __name__ == "__main__":

    graph = read_graph()
    print(graph)

