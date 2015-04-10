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

    /** @var array the adjacency map */
    private $_adjList = array();

    /** @var array the visited map */
    private $_visited = array();

    /** decompose the Graph */
    public function decompose() {
        $cuts = 0;
        foreach (array_keys($this->_adjList) as $node) {
            foreach ($this->_adjList[$node] as $edgeNode => $value) {
                if ($this->_nodesInSubtreeIsEven($node, $edgeNode)
                    && $this->_nodesInSubtreeIsEven($edgeNode, $node)) {
                    $this->_cut($node, $edgeNode);
                    $cuts += 1;
                }
            }
        }
        return $cuts;
    }

    /**
     * Add an edge to the graph
     * @param integer $node1 a node
     * @param integer $node2 a node
     */
    public function addEdge($node1, $node2) {

        $this->_addEdgeNode($node1, $node2);
        $this->_addEdgeNode($node2, $node1);
    }

    /**
     * Add an edge to the graph
     * @param integer $mainNode adjacency node
     * @param integer $adjacentNode connected node
     */
    private function _addEdgeNode($mainNode, $adjacentNode) {

        if (!isset($this->_adjList[$mainNode])) {
            $this->_adjList[$mainNode] = array();
        }
        $this->_adjList[$mainNode][$adjacentNode] = true;
    }

    /**
     * Cut an edge on the graph
     * @param integer $node1 a node
     * @param integer $node2 a node
     */
    private function _cut($node1, $node2) {
        unset($this->_adjList[$node1][$node2]);
        unset($this->_adjList[$node2][$node1]);
    }

    /**
     * Is the number of nodes in the subtree even?
     * @param integer $theNode node to start counting from
     * @param integer $skipNode adjecent nodes to skip
     * @return boolean
     */
    private function _nodesInSubtreeIsEven($theNode, $skipNode=null) {
        $this->_visited = array($theNode => true);
        if ($skipNode !== null) {
            $this->_visited[$skipNode] = true;
        }
        return ($this->_numberConnected($theNode) + 1) % 2 == 0;
    }

    /**
     * Number connected to the node
     * @param integer $theNode node to start counting from
     * @return integer
     */
    private function _numberConnected($theNode) {
        $num_connected = 0;
        foreach ($this->_adjList[$theNode] as $node => $value) {
            
            if (!isset($this->_visited[$node])) {
                $this->_visited[$node] = true;
                $num_connected += $this->_numberConnected($node) + 1;
            }
        }
        return $num_connected;
    }
}

/**
 * Read the graph from Stdin
 * @return TreeGraph
 */
function readGraph() {

    list($num_vertices, $num_edges) = explode(" ", trim(fgets(STDIN)));
    $num_vertices = (int) $num_vertices;
    $num_edges = (int) $num_edges;
    $graph = new TreeGraph();

    for ($i = 0; $i < $num_edges; $i++) {
        list($node1, $node2) = explode(" ", trim(fgets(STDIN)));
        $node1 = (int) $node1;
        $node2 = (int) $node2;
        $graph->addEdge($node1, $node2);
    }
    return $graph;
}

    $graph = readGraph();
    $num_cuts = $graph->decompose();
    echo $num_cuts;
