<?php

namespace WabLab\HashedTree;

use WabLab\HashedTree\Contract\IHashedNode;
use WabLab\HashedTree\Contract\INodeTree;

class NodeTree extends Node implements INodeTree
{

    /**
     * @var INodeTree[]
     */
    protected array $children = [];

    protected int $childrenCount = 0;

    public function setChild(IHashedNode $node)
    {
        if(!isset($this->children[$node->getHash()])) {
            $this->childrenCount++;
        }
        $this->children[$node->getHash()] = $node;
    }

    public function getChild(string $hash): ?IHashedNode
    {
        return $this->children[$hash] ?? null;
    }

    public function removeChild(string $hash): bool
    {
        if(isset($this->children[$hash])) {
            unset($this->children[$hash]);
            $this->childrenCount--;
            return true;
        }
        return false;
    }

    public function rehashChild(string $oldHash, string $newHash):bool
    {
        if(isset($this->children[$oldHash])) {
            $this->children[$newHash] = $this->children[$oldHash];
            unset($this->children[$oldHash]);
            return true;
        }
        return false;
    }


    public function getChildren(): array
    {
        return array_values($this->children);
    }

    public function getChildrenCount(): int
    {
        return $this->childrenCount;
    }

    public function yieldChildren()
    {
        foreach ($this->children as $child) {
            yield $child;
        }
    }

    public function isChildExists(string $hash): bool
    {
        return isset($this->children[$hash]);
    }
}