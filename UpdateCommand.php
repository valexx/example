<?php

declare(strict_types=1);

namespace Company\Application\Service;

use Common\Application\Hydrator\Filter\FilterAwareCommand;
use  Company\Application\Hydrator\Filter\UpdateFieldAllow;
use Common\Application\Hydrator\Filter\Common\FiledsInterface;
use Common\Application\Hydrator\Filter\Common\DtoInterface;
use Company\Application\Hydrator\Dto;

class UpdateCommand extends FilterAwareCommand
{
    protected array $inputData;
    private string $cashId;
    private string $shopId;

    public function __construct(string $shopId, string $cashId, array $inputData)
    {
        $this->cashId    = $cashId;
        $this->shopId    = $shopId;
        $this->inputData = $inputData;
    }

    /**
     * @return string
     */
    public function getCashId(): string
    {
        return $this->cashId;
    }

    /**
     * @return string
     */
    public function getShopId(): string
    {
        return $this->shopId;
    }


    public function getAction(): Action
    {
        return Action::create('company.cashbox.update');
    }

    protected function getAllowedFields(): FiledsInterface
    {
        return new UpdateFieldAllow();
    }

    protected function getDto(): DtoInterface
    {
        return new Dto();
    }
}
