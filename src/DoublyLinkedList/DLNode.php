<?php

namespace WabLab\DoublyLinkedList;


use WabLab\DoublyLinkedList\Contract\IDLNode;

class DLNode implements IDLNode
{

    protected ?IDLNode $left = null;
    protected ?IDLNode $right = null;
    protected $payload = null;

    public function setLeft(?IDLNode $node = null): void
    {
        $this->left = $node;
    }

    public function getLeft(): ?IDLNode
    {
        return $this->left;
    }

    public function setRight(?IDLNode $node = null): void
    {
        $this->right = $node;
    }

    public function getRight(): ?IDLNode
    {
        return $this->right;
    }

    public function getPayload()
    {
        return $this->payload;
    }

    public function setPayload($payload)
    {
        $this->payload = $payload;
    }

    public function isFirst(): bool
    {
        if(!$this->left) {
            return true;
        }
        return false;
    }

    public function isLast(): bool
    {
        if(!$this->right) {
            return true;
        }
        return false;
    }
}
