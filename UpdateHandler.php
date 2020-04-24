<?php

declare(strict_types=1);

namespace  Common\Application\Service;;


class UpdateHandler extends CommandHandler
{

    protected CashRepository $repository;
    protected Emitter $emitter;
    protected Cashbox $cashbox;
    protected object $data;

    public function __construct(CashRepository $repository, Emitter $emitter)
    {
        $this->repository = $repository;
        $this->emitter = $emitter;
    }


    public function handle(CommandInterface $command): void
    {
        $this->getCashBoxById($command);

        $this->data = $command->getInputData();
        $this->cashbox->changeName(Name::fromString($this->data->name));

        if (
            ($this->cashbox->hasActiveOperday() === false) &&
            $type = $this->repository->getCashType((string)$this->data->type_id)
        ) {
            $this->cashbox->changeType($type);
        }
        $this->updateMeta();
        $this->repository->store($this->cashbox);
        $this->emitter->emitGeneratedEvents($this->cashbox);
    }

    protected function updateMeta(): void
    {
        $mviza = $this->cashbox->getMeta()->getMviza();

        if (isset($this->data->mviza_id)) {
            $mviza->setId($this->data->mviza_id);
        }

        if (isset($this->data->mviza_name)) {
            $mviza->setName($this->data->mviza_name);
        }
        if (isset($this->data->mviza_category_id)) {
            $mviza->setTerminalId($this->data->mviza_category_id);
        }
        if (isset($this->data->mviza_terminal_id)) {
            $mviza->setCategoryId($this->data->mviza_terminal_id);
        }

        $this->cashbox->changeMeta($this->cashbox->getMeta());
    }

    protected function getCashBoxById(CommandInterface $command): void
    {
        try {
            $this->cashbox = $this->repository->get(Id::create($command->getCashId()));
        } catch (CashException $exception) {
            throw CashException::notFound($command->getId());
        }
    }

}
