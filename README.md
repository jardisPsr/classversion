# Jardis ClassVersion Port

![Build Status](https://github.com/jardisPort/classversion/actions/workflows/ci.yml/badge.svg)
[![License: PolyForm Shield](https://img.shields.io/badge/License-PolyForm%20Shield-blue.svg)](LICENSE.md)
[![PHP Version](https://img.shields.io/badge/PHP-%3E%3D8.2-777BB4.svg)](https://www.php.net/)
[![PHPStan Level](https://img.shields.io/badge/PHPStan-Level%208-brightgreen.svg)](phpstan.neon)
[![PSR-12](https://img.shields.io/badge/Code%20Style-PSR--12-blue.svg)](phpcs.xml)

> Part of the **[Jardis Business Platform](https://jardis.io)** — Enterprise-grade PHP components for Domain-Driven Design

Class versioning contracts for runtime implementation resolution. Two interfaces — one configures version groups and fallback chains, the other resolves the correct class by version label. Keep your domain code independent of the versioning mechanism.

---

## Interfaces

All interfaces live in the `JardisPort\ClassVersion` namespace.

### ClassVersionConfigInterface

Configures version groups and defines fallback chains for version resolution.

| Method | Signature | Description |
|--------|-----------|-------------|
| `version` | `version(?string $version = null): ?string` | Returns the canonical version label for a given input |
| `fallbackChain` | `fallbackChain(?string $version = null): array` | Returns the ordered fallback chain for a version label |

### ClassVersionInterface

Resolves the correct class implementation by name and optional version label.

| Method | Signature | Description |
|--------|-----------|-------------|
| `__invoke` | `__invoke(string $className, ?string $version = null): mixed` | Resolves and returns the versioned class instance |

---

## Installation

```bash
composer require jardisport/classversion
```

## Usage

```php
use JardisPort\ClassVersion\ClassVersionInterface;

class MyService
{
    public function __construct(
        private readonly ClassVersionInterface $classVersion,
    ) {}

    public function resolve(string $className, ?string $version = null): mixed
    {
        return ($this->classVersion)($className, $version);
    }
}
```

## Implemented by

- **[jardissupport/classversion](https://github.com/jardisSupport/classversion)** — Versioned class resolution via namespace injection with configurable fallback chains

## Documentation

Full documentation, guides, and API reference:

**[jardis.io/docs/port/classversion](https://jardis.io/docs/port/classversion)**

## License

This package is licensed under the [PolyForm Shield License 1.0.0](LICENSE.md). Free for all use except building competing frameworks or developer tooling.

---

**[Jardis](https://jardis.io)** · [Documentation](https://jardis.io/docs) · [Headgent](https://headgent.com)
