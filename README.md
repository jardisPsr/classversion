# ClassVersion
![Build Status](https://github.com/JardisPort/classversion/actions/workflows/ci.yml/badge.svg)
[![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)](LICENSE)
[![PHP Version](https://img.shields.io/badge/php-%3E%3D8.2-blue.svg)](https://www.php.net/)
[![PHPStan Level](https://img.shields.io/badge/PHPStan-Level%208-success.svg)](phpstan.neon)
[![PSR-4](https://img.shields.io/badge/autoload-PSR--4-blue.svg)](https://www.php-fig.org/psr/psr-4/)
[![PSR-12](https://img.shields.io/badge/code%20style-PSR--12-orange.svg)](phpcs.xml)

This package provides classversion interfaces for a domain driven design approach.

## Installation

```bash
composer require jardisport/classversion
```

## Interfaces

### ClassVersionInterface

The main interface for resolving versioned class instances.

```php
interface ClassVersionInterface
{
    /**
     * @template T
     * @param class-string<T> $className
     * @param ?string $version
     * @return mixed|T
     */
    public function __invoke(string $className, ?string $version = null): mixed;
}
```

### ClassVersionConfigInterface

Interface for managing version configuration and fallback chains.

```php
interface ClassVersionConfigInterface
{
    /**
     * @param string|null $version
     * @return string|null
     */
    public function version(?string $version = null): ?string;

    /**
     * Returns the fallback chain for a given version.
     *
     * The chain includes the resolved version itself as the first entry,
     * followed by any configured fallback versions in order.
     * The base class (no version) is always the implicit last fallback
     * and is NOT included in the returned array.
     *
     * Example: For version 'v2' with fallbacks ['v2' => ['v1']],
     * returns ['v2', 'v1'].
     *
     * @return array<string>
     */
    public function fallbackChain(?string $version = null): array;
}
```

## Usage

Implement these interfaces to create a versioning system for your domain classes, allowing you to manage different versions of class implementations in your DDD architecture.

## License

MIT
