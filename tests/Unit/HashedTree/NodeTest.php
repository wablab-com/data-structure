<?php

namespace WabLab\Tests\Unit\HashedTree;

use WabLab\HashedTree\Node;
use WabLab\Tests\AbstractTestCase;

class NodeTest extends AbstractTestCase
{
    public function testSettersAndGetters()
    {
        $node = new Node('test_hash', 'test_payload');
        $this->assertEquals('test_hash', $node->getHash());
        $this->assertEquals('test_payload', $node->getPayload());

        $node->setHash('test_hash2');
        $node->setPayload('test_payload2');
        $this->assertEquals('test_hash2', $node->getHash());
        $this->assertEquals('test_payload2', $node->getPayload());
    }
}
