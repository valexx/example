<?php

namespace Common\Application\Hydrator\Filter\Common;

interface HydratorInterface
{
    public function hydrate(FiledsInterface $fields, DtoInterface $dtoObject, array $params): DtoInterface;
}
