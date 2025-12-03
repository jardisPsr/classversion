<?php

declare(strict_types=1);

namespace JardisPsr\ClassVersion;

interface ClassVersionConfigInterface
{
    /**
     * @param string|null $version
     * @return string|null
     */
    public function version(?string $version = null): ?string;
}
