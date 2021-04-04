<?php

namespace WabLab\DoublyLinkedList\Contract;


interface IDLNode
{
    public function setLeft(?IDLNode $node = null):void;
    public function getLeft():?IDLNode;

    public function setRight(?IDLNode $node = null):void;
    public function getRight():?IDLNode;

    public function getPayload();
    public function setPayload($payload);

    public function isFirst():bool;
    public function isLast():bool;
}
