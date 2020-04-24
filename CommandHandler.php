<?php

declare(strict_types=1);

namespace Common\Application\Service;

use  Common\Application\Service\CommandInterface;

/**
 * Class CommandHandler
 *
 * @package Common\Application\Service
 */
abstract class CommandHandler
{
    /**
     * @param CommandInterface $command
     *
     * @return mixed|void
     */
    abstract public function handle(CommandInterface $command);
}
