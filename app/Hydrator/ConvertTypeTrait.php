<?php

declare(strict_types=1);

namespace Common\Application\Hydrator;

trait ConvertTypeTrait
{
    protected function toStrOrNull(array $data, string $nameField): ?string
    {
        if (isset($data[$nameField])) {
            return (string)$data[$nameField];
        }
        return null;
    }

    protected function toIntOrNull(array $data, string $nameField): ?int
    {
        if (isset($data[$nameField])) {
            return (int)$data[$nameField];
        }
        return null;
    }

    protected function toFloatOrNull(array $data, string $nameField): ?float
    {
        if (isset($data[$nameField])) {
            return (float)$data[$nameField];
        }
        return null;
    }
}
