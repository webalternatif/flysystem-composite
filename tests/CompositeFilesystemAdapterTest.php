<?php

declare(strict_types=1);

namespace Tests\Webf\Flysystem\Composite;

use League\Flysystem\FilesystemAdapter;

/**
 * @internal
 *
 * @covers \Webf\Flysystem\Composite\CompositeFilesystemAdapter
 */
class CompositeFilesystemAdapterTest
{
    public function test_types(): void
    {
        $adapter = new IdentityAdapter(new NullAdapter());

        foreach ($adapter->getInnerAdapters() as $inner) {
            $this->takesNullAdapter($inner);
        }

        $adapter = new IdentityAdapter(new IdentityAdapter(new NullAdapter()));

        foreach ($adapter->getInnerAdapters() as $inner) {
            $this->takesIdentityAdapter($inner);
        }
    }

    /**
     * @template T of FilesystemAdapter
     *
     * @param IdentityAdapter<T> $adapter
     */
    public function takesIdentityAdapter(IdentityAdapter $adapter): void
    {
    }

    public function takesNullAdapter(NullAdapter $adapter): void
    {
    }
}
