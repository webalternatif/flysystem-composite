# Flysystem Composite

[![Source code](https://img.shields.io/badge/source-GitHub-blue)](https://github.com/webalternatif/flysystem-composite)
[![Software license](https://img.shields.io/github/license/webalternatif/flysystem-composite)](https://github.com/webalternatif/flysystem-composite/blob/master/LICENSE)
[![GitHub issues](https://img.shields.io/github/issues/webalternatif/flysystem-composite)](https://github.com/webalternatif/flysystem-composite/issues)
[![Test status](https://img.shields.io/github/actions/workflow/status/webalternatif/flysystem-composite/tests.yml?branch=master&label=tests)](https://github.com/webalternatif/flysystem-composite/actions/workflows/test.yml)
[![Psalm coverage](https://shepherd.dev/github/webalternatif/flysystem-composite/coverage.svg)](https://psalm.dev)
[![Psalm level](https://shepherd.dev/github/webalternatif/flysystem-composite/level.svg)](https://psalm.dev)

A simple interface for composite [Flysystem][1] adapters.

## Installation

```bash
$ composer require webalternatif/flysystem-composite
```

## Usage

```php
use Webf\Flysystem\Composite\CompositeFilesystemAdapter;

/**
 * @template T of FilesystemAdapter
 * @template-implements CompositeFilesystemAdapter<T>
 */
class MyWrapperAdapter implements CompositeFilesystemAdapter
{
    /**
     * @param T $innerAdapter
     */
    public function __construct(private FilesystemAdapter $innerAdapter)
    {
    }

    public function getInnerAdapters() : iterable
    {
        return [$this->innerAdapter];
    }
    
    // ... (implementation of FilesystemAdapter's methods)
}
```

## Tests

To run all tests, execute the command:

```bash
$ composer test
```

This will run [Psalm][2] and a [PHP-CS-Fixer][3] check, but you can run them
individually like this:

```bash
$ composer psalm
$ composer cs-check
```

[1]: https://flysystem.thephpleague.com
[2]: https://psalm.dev
[3]: https://cs.symfony.com/
