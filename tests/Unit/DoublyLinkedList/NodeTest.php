<?php

namespace WabLab\Tests\Unit\DoublyLinkedList;

use WabLab\DoublyLinkedList\Helpers\FreeingNode;
use WabLab\DoublyLinkedList\Helpers\SettingNodeAfter;
use WabLab\DoublyLinkedList\Helpers\SettingNodeBefore;
use WabLab\HashedTree\Node;
use WabLab\Tests\AbstractTestCase;
use WabLab\Tests\Factory\DoublyLinkedListFactory;

class NodeTest extends AbstractTestCase
{
    public function testFreeingFirstNode()
    {
        $rootNode = DoublyLinkedListFactory::createChain(10);
        $expectedFirstNode = $rootNode->getRight();

        FreeingNode::process($rootNode);
        $this->assertNull($rootNode->getRight());
        $this->assertNull($rootNode->getLeft());

        $this->assertTrue($expectedFirstNode->isFirst());
        $this->assertNull($expectedFirstNode->getLeft());
        $this->assertNotNull($expectedFirstNode->getRight());

    }

    public function testFreeingLastNode()
    {
        $rootNode = DoublyLinkedListFactory::createChain(2);
        FreeingNode::process($rootNode->getRight());
        $this->assertNull($rootNode->getRight());
        $this->assertNull($rootNode->getLeft());

    }

    public function testSetNodeAfter()
    {
        $rootNode = DoublyLinkedListFactory::createChain(2);
        $expectedFirstNode = $rootNode->getRight();
        SettingNodeAfter::process($expectedFirstNode, $rootNode);
        $this->assertTrue($expectedFirstNode->isFirst());
        $this->assertFalse($expectedFirstNode->isLast());
        $this->assertFalse($rootNode->isFirst());
        $this->assertTrue($rootNode->isLast());
    }


    public function testSetNodeBefore()
    {
        $rootNode = DoublyLinkedListFactory::createChain(2);
        $expectedFirstNode = $rootNode->getRight();
        SettingNodeBefore::process($expectedFirstNode, $rootNode);
        $this->assertTrue($expectedFirstNode->isFirst());
        $this->assertFalse($expectedFirstNode->isLast());
        $this->assertFalse($rootNode->isFirst());
        $this->assertTrue($rootNode->isLast());
    }


    public function testIteration()
    {
        $rootNode = DoublyLinkedListFactory::createChain(10);

        $counter = 0;
        $currentNode = $rootNode;
        while($currentNode) {
            $counter++;
            $this->assertEquals($counter, $currentNode->getPayload());
            $currentNode = $currentNode->getRight();
        }
        $this->assertEquals(10, $counter);
    }

    public function testIsFirstAndLast() {
        $rootNode = DoublyLinkedListFactory::createChain(1);
        $this->assertTrue($rootNode->isFirst());
        $this->assertTrue($rootNode->isLast());

        $rootNode = DoublyLinkedListFactory::createChain(2);
        $this->assertTrue($rootNode->isFirst());
        $this->assertFalse($rootNode->isLast());
        $this->assertTrue($rootNode->getRight()->isLast());
        $this->assertFalse($rootNode->getRight()->isFirst());

    }
}
