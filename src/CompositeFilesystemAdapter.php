<?php

declare(strict_types=1);

namespace Webf\Flysystem\Composite;

use League\Flysystem\FilesystemAdapter;

/**
 * Interface for Flysystem adapters that are composed of other adapters.
 *
 * @psalm-template T of FilesystemAdapter
 */
interface CompositeFilesystemAdapter extends FilesystemAdapter
{
    /**
     * @return iterable<T>
     */
    public function getInnerAdapters(): iterable;
}
