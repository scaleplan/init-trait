<?php

namespace avtomon;

trait InitTrait
{
    protected static $settings = [];

    /**
     * Установка значений статических свойств
     *
     * @param array $settings - массив свойства в формате 'имя' => 'значение'
     */
    public static function initStatic(array $settings)
    {
        foreach ($settings as $name => &$value) {
            if (property_exists(self::class, $name)) {
                $methodName = 'set' . ucfirst($name);
                if (method_exists(self::class, $methodName)) {
                    self::$$methodName($value);
                } else {
                    self::$$name = $value;
                }

                unset($value);
            }
        }
    }

    /**
     * Установка значений свойств в контексте объекта
     *
     * @param array $settings - массив свойства в формате 'имя' => 'значение'
     */
    protected function initObject(array $settings)
    {
        foreach ($settings as $name => &$value) {
            if (property_exists($this, $name)) {
                $methodName = 'set' . ucfirst($name);
                if (method_exists($this, $methodName)) {
                    $this->$methodName($value);
                } else {
                    $this->$name = $value;
                }

                unset($value);
            }
        }
    }

    public static function setSettings(array $settings): void
    {
        self::$settings = $settings;
    }
}
