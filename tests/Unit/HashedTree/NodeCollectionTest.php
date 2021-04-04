<?php

namespace WabLab\Tests\Unit\HashedTree;

use WabLab\HashedTree\Contract\INodeTree;
use WabLab\Tests\AbstractTestCase;
use WabLab\Tests\Factory\NodesFactory;

class NodeCollectionTest extends AbstractTestCase
{

    public function testTreeCount()
    {
        $nodeCollection = NodesFactory::createSimpleFilledTree(10);
        $this->assertEquals(10, $nodeCollection->getChildrenCount());
    }

    public function testGetChild()
    {
        $nodeCollection = NodesFactory::createSimpleFilledTree(10);
        $this->assertEquals('value 5', $nodeCollection->getChild('key 5')->getPayload());
    }

    public function testRemoveChild()
    {
        $nodeCollection = NodesFactory::createSimpleFilledTree(10);
        $this->assertTrue($nodeCollection->removeChild('key 5'));
        $this->assertNull($nodeCollection->getChild('key 5'));
        $this->assertEquals(9, $nodeCollection->getChildrenCount());
    }

    public function testRemoveInvalidChild()
    {
        $nodeCollection = NodesFactory::createSimpleFilledTree(10);
        $this->assertFalse($nodeCollection->removeChild('invalid key'));
        $this->assertEquals(10, $nodeCollection->getChildrenCount());
    }

    public function testChildRehash()
    {
        $nodeCollection = NodesFactory::createSimpleFilledTree(10);
        $this->assertTrue($nodeCollection->rehashChild('key 5', 'key 5 new'));
        $this->assertNull($nodeCollection->getChild('key 5'));
        $this->assertNotNull($nodeCollection->getChild('key 5 new'));
        $this->assertFalse($nodeCollection->isChildExists('key 5'));
        $this->assertTrue($nodeCollection->isChildExists('key 5 new'));
    }

    public function testInvalidChildRehash()
    {
        $nodeCollection = NodesFactory::createSimpleFilledTree(10);
        $this->assertFalse($nodeCollection->rehashChild('invalid key', 'key 5 new'));
    }

    public function testGetChildren()
    {
        $nodeCollection = NodesFactory::createSimpleFilledTree(10);
        $children = $nodeCollection->getChildren();
        $this->assertEquals($nodeCollection->getChildrenCount(), count($children));
    }

    public function testYieldChildren()
    {
        $nodeCollection = NodesFactory::createSimpleFilledTree(10);
        $counter = 0;
        foreach($nodeCollection->yieldChildren() as $child) {
            $counter++;
            $this->assertEquals("key {$counter}", $child->getHash());
        }
    }

    public function testNestedTree()
    {
        $rootTree = NodesFactory::createNestedTree();
        $counter1 = 0;
        foreach($rootTree->getChildren() as $child) {
            $counter1++;
            $this->assertEquals("key {$counter1}", $child->getHash());

            if($child instanceof INodeTree) {
                $counter2 = 0;
                foreach($child->getChildren() as $child2) {
                    $counter2++;
                    $this->assertEquals("key {$counter1} - key {$counter2}", $child2->getHash());
                }
            }
        }
    }

}
