<?php

namespace avtomon;

trait InitTrait
{
    /**
     * Установка значений статических свойств
     *
     * @param array $settings - массив свойства в формате 'имя' => 'значение'
     */
    public static function initStatic(array $settings)
    {
        foreach ($settings as $name => $value) {
            if (isset(self::$$name)) {
                self::$$name = $value;
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
        foreach ($settings as $name => $value) {
            if (isset($this->$name)) {
                $this->$name = $value;
            }
        }
    }
}
