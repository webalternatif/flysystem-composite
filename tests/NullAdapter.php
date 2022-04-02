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

class NullAdapter implements FilesystemAdapter
{
    public function fileExists(string $path): bool
    {
        return false;
    }

    public function directoryExists(string $path): bool
    {
        return false;
    }

    public function write(string $path, string $contents, Config $config): void
    {
    }

    public function writeStream(string $path, $contents, Config $config): void
    {
    }

    public function read(string $path): string
    {
        throw UnableToReadFile::fromLocation($path);
    }

    public function readStream(string $path)
    {
        throw UnableToReadFile::fromLocation($path);
    }

    public function delete(string $path): void
    {
    }

    public function deleteDirectory(string $path): void
    {
    }

    public function createDirectory(string $path, Config $config): void
    {
        throw new UnableToCreateDirectory($path);
    }

    public function setVisibility(string $path, string $visibility): void
    {
        throw UnableToSetVisibility::atLocation($path);
    }

    public function visibility(string $path): FileAttributes
    {
        throw UnableToRetrieveMetadata::visibility($path);
    }

    public function mimeType(string $path): FileAttributes
    {
        throw UnableToRetrieveMetadata::mimeType($path);
    }

    public function lastModified(string $path): FileAttributes
    {
        throw UnableToRetrieveMetadata::lastModified($path);
    }

    public function fileSize(string $path): FileAttributes
    {
        throw UnableToRetrieveMetadata::fileSize($path);
    }

    public function listContents(string $path, bool $deep): iterable
    {
        return [];
    }

    public function move(string $source, string $destination, Config $config): void
    {
        throw UnableToMoveFile::fromLocationTo($source, $destination);
    }

    public function copy(string $source, string $destination, Config $config): void
    {
        throw UnableToCopyFile::fromLocationTo($source, $destination);
    }
}
