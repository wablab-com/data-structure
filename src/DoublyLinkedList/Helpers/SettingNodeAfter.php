<?php

namespace WabLab\DoublyLinkedList\Helpers;

use WabLab\DoublyLinkedList\Contract\IDLNode;

class SettingNodeAfter
{

    public static function process(IDLNode $afterNode, IDLNode $nodeToSet): void
    {
        if($afterNode !== $nodeToSet) {
            FreeingNode::process($nodeToSet);
            $nodeToSet->setLeft($afterNode);
            $nodeToSet->setRight($afterNode->getRight());
            $afterNode->setRight($nodeToSet);
        }
    }

}
