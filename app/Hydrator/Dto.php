<?php

namespace Company\Application\Hydrator;

use Common\Application\Hydrator\Filter\Common\DtoInterface;

class Dto implements DtoInterface
{
    public $name;
    public $type_id;
    public $mviza_id;
    public $mviza_name;
    public $mviza_category_id;
    public $mviza_terminal_id;
}
