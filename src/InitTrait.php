<?php

namespace avtomon;

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
        $settings += static::$settings ?? [];
        foreach ($settings as $name => &$value) {
            if (property_exists(static::class, $name)) {
                $methodName = 'set' . ucfirst($name);
                if (method_exists(static::class, $methodName) && (new \ReflectionMethod(static::class, $methodName))->isStatic()) {
                    self::$methodName($value);
                } else {
                    self::$$name = $value;
                }

                unset($settings[$name]);
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
        $settings += static::$settings ?? [];
        foreach ($settings as $name => &$value) {
            if (property_exists($this, $name)) {
                $methodName = 'set' . ucfirst($name);
                if (method_exists($this, $methodName) && !(new \ReflectionMethod(static::class, $methodName))->isStatic()) {
                    $this->$methodName($value);
                } else {
                    $this->$name = $value;
                }

                unset($settings[$name]);
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
