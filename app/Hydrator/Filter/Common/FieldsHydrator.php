<?php

namespace Common\Application\Hydrator\Filter\Common;

class FieldsHydrator implements HydratorInterface
{
    private const  SETTINGS_FIELD = 'settings';

    public function hydrate(FiledsInterface $fields, DtoInterface $dtoObject, array $params): DtoInterface
    {
        $fieldsArray = $fields->getFileds();
        $setting = $params[self::SETTINGS_FIELD] ?? [];
        $params = array_merge($setting, $params);
        foreach ($params as $key => $value) {
            if (property_exists($dtoObject, $key) && array_key_exists($key, $fieldsArray)) {
                $dtoObject->$key = $value ?? '';
            }
        }
        return $dtoObject;
    }
}
