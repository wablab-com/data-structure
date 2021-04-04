<?php

namespace WabLab\HashedTree;


use WabLab\HashedTree\Contract\IHashedNode;

class Node implements IHashedNode
{
    private string $hash;
    private $payload;

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

    public function getPayload()
    {
        return $this->payload;
    }

    public function setPayload($payload)
    {
        $this->payload = $payload;
    }
}
