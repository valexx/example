<?php

namespace Common\Application\Hydrator\Filter;

use Common\Application\Hydrator\Filter\Common\DtoInterface;
use Common\Application\Hydrator\Filter\Common\FiledsInterface;
use Common\Application\Hydrator\Filter\Common\HydrateField;
use Common\Application\Hydrator\Filter\Common\HydratorInterface;
use Common\Application\Hydrator\Filter\Common\FieldsHydrator;
use Common\Application\Service\CommandInterface;

abstract class FilterAwareCommand implements CommandInterface
{
    protected array $inputData = [];
    abstract protected function getAllowedFields(): FiledsInterface;
    abstract protected function getDto(): DtoInterface;

    public function getInputData(): DtoInterface
    {
        return $this->getHydrator()->execute($this->inputData);
    }

    public function getHydrator(): HydrateField
    {
        return new HydrateField($this->getDto(), $this->getAllowedFields(), new FieldsHydrator());
    }

    protected function getHydratedFields(): HydratorInterface
    {
        return new FieldsHydrator();
    }

    public function getData(): array
    {
        return $this->inputData;
    }
}
