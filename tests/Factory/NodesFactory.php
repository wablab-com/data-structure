<?php

namespace WabLab\Tests\Factory;

use WabLab\HashedTree\Contract\INodeTree;
use WabLab\HashedTree\Node;
use WabLab\HashedTree\NodeTree;

class NodesFactory
{
    public static function createSimpleFilledTree(int $childrenCount):INodeTree
    {
        $root = new NodeTree('root', '');
        for($i=1; $i <= $childrenCount; $i++) {
            $root->setChild(new Node("key {$i}", "value {$i}"));
        }
        return $root;
    }

    public static function createNestedTree():INodeTree
    {
        $root = new NodeTree('root', '');
        $root->setChild(new Node("key 1", "value 1"));
        $root->setChild(new Node("key 2", "value 2"));
        $root->setChild(new Node("key 3", "value 3"));

        $childTree1 = new NodeTree('key 4', 'value 4');
        $childTree1->setChild(new Node("key 4 - key 1", "value 4 - value 1"));
        $childTree1->setChild(new Node("key 4 - key 2", "value 4 - value 2"));
        $childTree1->setChild(new Node("key 4 - key 3", "value 4 - value 3"));
        $childTree1->setChild(new Node("key 4 - key 4", "value 4 - value 4"));
        $root->setChild($childTree1);

        $root->setChild(new Node("key 5", "value 5"));
        $root->setChild(new Node("key 6", "value 6"));

        $childTree2 = new NodeTree('key 7', 'value 7');
        $childTree2->setChild(new Node("key 7 - key 1", "value 7 - value 1"));
        $childTree2->setChild(new Node("key 7 - key 2", "value 7 - value 2"));
        $childTree2->setChild(new Node("key 7 - key 3", "value 7 - value 3"));
        $childTree2->setChild(new Node("key 7 - key 4", "value 7 - value 4"));
        $root->setChild($childTree2);

        $root->setChild(new Node("key 8", "value 8"));
        $root->setChild(new Node("key 9", "value 9"));
        $root->setChild(new Node("key 10", "value 10"));

        return $root;
    }
}
