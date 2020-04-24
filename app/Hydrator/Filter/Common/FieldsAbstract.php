<?php

namespace Common\Application\Hydrator\Filter\Common;

abstract class FieldsAbstract implements FiledsInterface
{
    protected array $fields;

    public function getFileds(): array
    {
        return $this->fields;
    }
}
