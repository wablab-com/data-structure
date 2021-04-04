<?php

namespace WabLab\DoublyLinkedList\Helpers;

use WabLab\DoublyLinkedList\Contract\IDLNode;

class FreeingNode
{

    public static function process(IDLNode $node): void
    {
        if(!$node->isFirst()) {
            $node->getLeft()->setRight($node->getRight());
        }
        if(!$node->isLast()) {
            $node->getRight()->setLeft($node->getLeft());
        }

        $node->setLeft(null);
        $node->setRight(null);
    }

}
