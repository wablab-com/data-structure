<?php

namespace WabLab\HashedTree;


use WabLab\DoublyLinkedList\DLNode;
use WabLab\HashedTree\Contract\IHashedNode;

class Node extends DLNode implements IHashedNode
{
    private string $hash;

    public function __construct(string $hash, $payload)
    {
        $this->hash = $hash;
        $this->payload = $payload;
    }

    public function getHash(): string
    {
        return $this->hash;
    }

    public function setHash(string $hash): void
    {
        $this->hash = $hash;
    }

}
