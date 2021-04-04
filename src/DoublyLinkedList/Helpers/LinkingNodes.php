<?php

namespace WabLab\DoublyLinkedList\Helpers;

use WabLab\DoublyLinkedList\Contract\IDLNode;

class LinkingNodes
{

    public static function process(IDLNode $leftNode, IDLNode $rightNode): void
    {
        $leftNode->setRight($rightNode);
        $rightNode->setLeft($leftNode);
    }

}
