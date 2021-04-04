<?php

namespace WabLab\HashedTree\Contract;

use Generator;

interface INodeTree
{
    public function setChild(IHashedNode $node);
    public function getChild(string $hash):?IHashedNode;
    public function removeChild(string $hash):bool;
    public function rehashChild(string $oldHash, string $newHash):bool;
    public function isChildExists(string $hash):bool;

    /**
     * @return IHashedNode[]
     */
    public function getChildren():array;

    public function getChildrenCount():int;

    /**
     * @return Generator|IHashedNode[]
     */
    public function yieldChildren();
}
