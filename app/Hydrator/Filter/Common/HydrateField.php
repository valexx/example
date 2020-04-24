<?php

declare(strict_types=1);

namespace Common\Application\Hydrator\Filter\Common;

class HydrateField
{
    private DtoInterface $dtoObject;
    private FiledsInterface $field;
    private HydratorInterface $hydrator;

    public function __construct(DtoInterface $dtoObject, FiledsInterface $field, HydratorInterface $hydrator)
    {
        $this->dtoObject = $dtoObject;
        $this->field = $field;
        $this->hydrator = $hydrator;
    }

    public function execute(array $params): DtoInterface
    {
        return $this->hydrator->hydrate($this->field, $this->dtoObject, $params);
    }
}
