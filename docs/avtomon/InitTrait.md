<small>avtomon</small>

InitTrait
=========

Трейт иницилизации объектов и классов

Описание
-----------

Trait InitTrait

Сигнатура
---------

- **class**.

Методы
-------

Методы класса class:

- [`initStatic()`](#initStatic) &mdash; Установка значений статических свойств
- [`initObject()`](#initObject) &mdash; Установка значений свойств в контексте объекта
- [`setSettings()`](#setSettings) &mdash; Установить настройки класса по умолчанию

### `initStatic()` <a name="initStatic"></a>

Установка значений статических свойств

#### Сигнатура

- **public static** method.
- Может принимать следующий параметр(ы):
    - `$settings` (`array`) &mdash; - массив свойства в формате &#039;имя&#039; =&gt; &#039;значение&#039;
- Возвращает `array` value.
- Выбрасывает одно из следующих исключений:
    - [`ReflectionException`](http://php.net/class.ReflectionException)

### `initObject()` <a name="initObject"></a>

Установка значений свойств в контексте объекта

#### Сигнатура

- **protected** method.
- Может принимать следующий параметр(ы):
    - `$settings` (`array`) &mdash; - массив свойства в формате &#039;имя&#039; =&gt; &#039;значение&#039;
- Возвращает `array` value.
- Выбрасывает одно из следующих исключений:
    - [`ReflectionException`](http://php.net/class.ReflectionException)

### `setSettings()` <a name="setSettings"></a>

Установить настройки класса по умолчанию

#### Сигнатура

- **public static** method.
- Может принимать следующий параметр(ы):
    - `$settings` (`array`) &mdash; - массив настроек
- Ничего не возвращает.

