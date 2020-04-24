<?php

namespace Company\Application\Hydrator\Filter;

use Common\Application\Hydrator\Filter\Common\FieldsAbstract;

class UpdateFieldAllow extends FieldsAbstract
{
    protected array $fields =  [
        'name' => null,
        'type_id' => null,
        'mviza_id' => null,
        'mviza_name' => null,
        'mviza_category_id' => null,
        'mviza_terminal_id' => null
    ];
}
