<?php
/**
 * @author Jared
 */

/**
 * Problem:
 * You are given a tree (a simple connected graph with no cycles). You have to remove
 * as many edges from the tree as possible to obtain a forest with the condition that : 
 * Each connected component of the forest should contain an even number of vertices.
 *
 * See full problem: https://www.hackerrank.com/challenges/even-tree
 */


class TreeGraph {

    private $_adj_list = array();
    private $_visited = array();

    public function decompose() {
        $cuts = 0;
        foreach (array_keys($this->_adj_list) as $node) {
            foreach ($this->_adj_list[$node] as $edge_node => $value) {
                if ($this->_nodes_in_subtree_is_even($node, $edge_node)
                    && $this->_nodes_in_subtree_is_even($edge_node, $node)) {
                    $this->_cut($node, $edge_node);
                    $cuts += 1;
                }
            }
        }
        return $cuts;
    }

    public function add_edge($node_1, $node_2) {

        $this->_add_edge_node($node_1, $node_2);
        $this->_add_edge_node($node_2, $node_1);
    }

    private function _add_edge_node($node_1, $node_2) {

        if (!isset($this->_adj_list[$node_1])) {
            $this->_adj_list[$node_1] = array();
        }
        $this->_adj_list[$node_1][$node_2] = true;
    }

    private function _cut($node1, $node2) {
        unset($this->_adj_list[$node1][$node2]);
        unset($this->_adj_list[$node2][$node1]);
    }

    private function _nodes_in_subtree_is_even($the_node, $skip_node=null) {
        $this->_visited = array($the_node => true);
        if ($skip_node !== null) {
            $this->_visited[$skip_node] = true;
        }
        return ($this->_number_connected($the_node) + 1) % 2 == 0;
    }

    private function _number_connected($the_node) {
        $num_connected = 0;
        foreach ($this->_adj_list[$the_node] as $node => $value) {
            
            if (!isset($this->_visited[$node])) {
                $this->_visited[$node] = true;
                $num_connected += $this->_number_connected($node) + 1;
            }
        }
        return $num_connected;
    }

    private function _degree($node) {
        return count($this->_adj_list[$node]);
    }
}

function readGraph() {

    list($num_vertices, $num_edges) = explode(" ", trim(fgets(STDIN)));
    $num_vertices = (int) $num_vertices;
    $num_edges = (int) $num_edges;
    $graph = new TreeGraph();

    for ($i = 0; $i < $num_edges; $i++) {
        list($node_1, $node_2) = explode(" ", trim(fgets(STDIN)));
        $node_1 = (int) $node_1;
        $node_2 = (int) $node_2;
        var_dump($node_1, $node_2);
        $graph->add_edge($node_1, $node_2);
    }
    return $graph;
}

    $graph = readGraph();
    $num_cuts = $graph->decompose();
    echo $num_cuts;
