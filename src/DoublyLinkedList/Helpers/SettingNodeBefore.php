<?php

namespace WabLab\DoublyLinkedList\Helpers;

use WabLab\DoublyLinkedList\Contract\IDLNode;

class SettingNodeBefore
{

    public static function process(IDLNode $nodeToSet, IDLNode $beforeNode): void
    {
        if($beforeNode !== $nodeToSet) {
            FreeingNode::process($nodeToSet);
            $nodeToSet->setLeft($beforeNode->getLeft());
            $nodeToSet->setRight($beforeNode);
            $beforeNode->setLeft($nodeToSet);
        }
    }

}
