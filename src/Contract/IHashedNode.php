<?php

namespace WabLab\HashedTree\Contract;


interface IHashedNode
{
    public function getHash():string;
    public function setHash(string $hash):void;

    public function getPayload();
    public function setPayload($payload);
}
