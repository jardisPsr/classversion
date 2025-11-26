# ClassVersion
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
[![PHP Version](https://img.shields.io/badge/PHP-%3E%3D8.2-blue.svg)](https://www.php.net/)

This package provides classversion interfaces for a domain driven design approach.

## Installation

```bash
composer require jrs/class-version
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

Interface for managing version configuration.

```php
interface ClassVersionConfigInterface
{
    /**
     * @param string|null $version
     * @return string|null
     */
    public function version(?string $version = null): ?string;
}
```

## Usage

Implement these interfaces to create a versioning system for your domain classes, allowing you to manage different versions of class implementations in your DDD architecture.

## License

MIT
