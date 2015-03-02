
__author__ = 'jared'

from sys import stdin, stdout

"""
Problem:
You are given a tree (a simple connected graph with no cycles). You have to remove
as many edges from the tree as possible to obtain a forest with the condition that : 
Each connected component of the forest should contain an even number of vertices.

Link: https://www.hackerrank.com/challenges/even-tree
"""


class TreeGraph():

    adj_list = {}
    visited = {}

    def add_edge(self, node_1, node_2):

        if not node_1 in self.adj_list:
            self.adj_list[node_1] = set()
        self.adj_list[node_1].add(node_2)

        if not node_2 in self.adj_list:
            self.adj_list[node_2] = set()
        self.adj_list[node_2].add(node_1)

    def decompose(self):
        cuts = 0
        for node in self.adj_list:
            for edge_node in self.adj_list[node].copy():
                if (self.__number_connected_is_even(node, edge_node)
                    and self.__number_connected_is_even(edge_node, node)):
                    self.__cut(node, edge_node)
                    cuts += 1
        return cuts

    def __cut(self, node1, node2):
        self.adj_list[node1].remove(node2)
        self.adj_list[node2].remove(node1)

    def __nodes_in_subtree(self, the_node, skip_node=None):
        self.visited = { the_node: True }
        if skip_node is not None:
            self.visited[skip_node] = True
        return self.__number_connected(the_node) + 1

    def __number_connected(self, the_node):
        num_connected = 0
        for node in self.adj_list[the_node]:
            if not self.visited.get(node):
                self.visited[node] = True
                num_connected += 1 + self.__number_connected(node)
        return num_connected

    def __number_connected_is_even(self, the_node, skip_node=None):
        return self.__nodes_in_subtree(the_node, skip_node) % 2 == 0

    def __degree(self, node):
        return len(self.adj_list[node])


def read_graph():

    num_vertices, num_edges = stdin.readline().split()
    num_vertices, num_edges = int(num_vertices), int(num_edges)
    graph = TreeGraph()

    for i in range(num_edges):
        node_1, node_2 = stdin.readline().split()
        node_1, node_2 = int(node_1), int(node_2)
        graph.add_edge(node_1, node_2)

    return graph

if __name__ == "__main__":

    graph = read_graph()
    num_cuts = graph.decompose()
    print(num_cuts)
