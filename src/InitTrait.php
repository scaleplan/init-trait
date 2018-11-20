<?php

namespace Scaleplan\InitTrait;

use Scaleplan\Helpers\NameConverter;

/**
 * Трейт иницилизации объектов и классов
 *
 * Trait InitTrait
 *
 * @package Scaleplan\InitTrait
 */
trait InitTrait
{
    /**
     * Установка значений статических свойств
     *
     * @param array $settings - массив свойства в формате 'имя' => 'значение'
     *
     * @return array
     */
    public static function initStatic(array $settings): array
    {
        $settings += (array) static::$settings ?? [];
        foreach ($settings as $name => &$value) {
            $propertyName = null;
            if (property_exists(static::class, $name)) {
                $propertyName = $name;
                unset($settings[$name]);
            }

            if ($propertyName !== null
                && property_exists(static::class, NameConverter::snakeCaseToCamelCase($name))) {
                $propertyName = NameConverter::snakeCaseToCamelCase($name);
                unset($settings[$name]);
            }

            $methodName = 'set' . $propertyName;
            if (is_callable([static::class, $methodName])) {
                static::{$methodName}($value);
                continue;
            }

            if (array_key_exists($propertyName, get_class_vars(static::class))) {
                static::${$propertyName} = $value;
            }
        }

        unset($value);

        return $settings;
    }

    /**
     * Установка значений свойств в контексте объекта
     *
     * @param array $settings - массив свойства в формате 'имя' => 'значение'
     *
     * @return array
     */
    protected function initObject(array $settings): array
    {
        $settings += (array) static::$settings ?? [];
        foreach ($settings as $name => &$value) {
            $propertyName = null;
            if (property_exists($this, $name)) {
                $propertyName = $name;
                unset($settings[$name]);
            }

            if ($propertyName !== null
                && property_exists($this, NameConverter::snakeCaseToLowerCamelCase($name))) {
                $propertyName = NameConverter::snakeCaseToLowerCamelCase($name);
                unset($settings[$name]);
            }

            $methodName = 'set' . ucfirst($propertyName);
            if (is_callable([$this, $methodName])) {
                $this->{$methodName}($value);
                continue;
            }

            if (array_key_exists($propertyName, get_object_vars($this))) {
                $this->{$propertyName} = $value;
            }
        }

        unset($value);

        return $settings;
    }

    /**
     * Установить настройки класса по умолчанию
     *
     * @param array $settings - массив настроек
     */
    public static function setSettings(array $settings): void
    {
        static::$settings = $settings;
    }
}
