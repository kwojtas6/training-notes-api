<?php

namespace App\Tests\Entity;

use App\Entity\Entry;
use PHPUnit\Framework\TestCase;

class EntryTest extends TestCase
{
    /** @test */
    public function itIsInstantiable(): void
    {
        $instance = new Entry();

        $this->assertInstanceOf(Entry::class, $instance);
    }
}
