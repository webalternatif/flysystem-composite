<?php

declare(strict_types=1);

namespace Tests\Webf\Flysystem\Composite;

use League\Flysystem\Config;
use League\Flysystem\FileAttributes;
use League\Flysystem\FilesystemAdapter;
use League\Flysystem\UnableToCopyFile;
use League\Flysystem\UnableToCreateDirectory;
use League\Flysystem\UnableToMoveFile;
use League\Flysystem\UnableToReadFile;
use League\Flysystem\UnableToRetrieveMetadata;
use League\Flysystem\UnableToSetVisibility;

final class NullAdapter implements FilesystemAdapter
{
    #[\Override]
    public function fileExists(string $path): bool
    {
        return false;
    }

    #[\Override]
    public function directoryExists(string $path): bool
    {
        return false;
    }

    #[\Override]
    public function write(string $path, string $contents, Config $config): void
    {
    }

    #[\Override]
    public function writeStream(string $path, $contents, Config $config): void
    {
    }

    #[\Override]
    public function read(string $path): string
    {
        throw UnableToReadFile::fromLocation($path);
    }

    #[\Override]
    public function readStream(string $path)
    {
        throw UnableToReadFile::fromLocation($path);
    }

    #[\Override]
    public function delete(string $path): void
    {
    }

    #[\Override]
    public function deleteDirectory(string $path): void
    {
    }

    #[\Override]
    public function createDirectory(string $path, Config $config): void
    {
        throw new UnableToCreateDirectory($path);
    }

    #[\Override]
    public function setVisibility(string $path, string $visibility): void
    {
        throw UnableToSetVisibility::atLocation($path);
    }

    #[\Override]
    public function visibility(string $path): FileAttributes
    {
        throw UnableToRetrieveMetadata::visibility($path);
    }

    #[\Override]
    public function mimeType(string $path): FileAttributes
    {
        throw UnableToRetrieveMetadata::mimeType($path);
    }

    #[\Override]
    public function lastModified(string $path): FileAttributes
    {
        throw UnableToRetrieveMetadata::lastModified($path);
    }

    #[\Override]
    public function fileSize(string $path): FileAttributes
    {
        throw UnableToRetrieveMetadata::fileSize($path);
    }

    #[\Override]
    public function listContents(string $path, bool $deep): iterable
    {
        return [];
    }

    #[\Override]
    public function move(string $source, string $destination, Config $config): void
    {
        throw UnableToMoveFile::fromLocationTo($source, $destination);
    }

    #[\Override]
    public function copy(string $source, string $destination, Config $config): void
    {
        throw UnableToCopyFile::fromLocationTo($source, $destination);
    }
}
