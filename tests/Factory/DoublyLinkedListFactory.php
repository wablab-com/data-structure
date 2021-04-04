<?php

namespace WabLab\Tests\Factory;

use WabLab\DoublyLinkedList\Contract\IDLNode;
use WabLab\DoublyLinkedList\DLNode;
use WabLab\DoublyLinkedList\Helpers\LinkingNodes;


class DoublyLinkedListFactory
{
    public static function createChain(int $length = 10):IDLNode
    {
        $root = null;
        $prevNode = null;
        for($i=1; $i <= $length; $i++) {
            $node = new DLNode();
            $node->setPayload($i);
            if(!$root) {
                $root = $node;
            }
            if($prevNode) {
                LinkingNodes::process($prevNode, $node);
            }
            $prevNode = $node;
        }
        return $root;
    }

}
