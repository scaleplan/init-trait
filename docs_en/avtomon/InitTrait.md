<small> avtomon </small>

InitTrait
=========

The initialization of objects and classes

Description
-----------

Trait InitTrait

Signature
---------

- **class**.

Methods
-------

Class methods class:

  - [`initStatic()`](#initStatic) &mdash; Setting Static Property Values
  - [`initObject()`](#initObject) &mdash; Setting Property Values ​​in the Object Context
  - [`setSettings()`](#setSettings) &mdash; Set default class settings

### `initStatic()`<a name="initStatic"> </a>

Setting Static Property Values

#### Signature

- **public static** method.
- It can take the following parameter (s):
  - `$settings`(`array`) - array of the property in the format 'name' = & gt; 'value'
Returns the `array`value.
- Throws one of the following exceptions:
  - [`ReflectionException`](http://php.net/class.ReflectionException)

### `initObject()`<a name="initObject"> </a>

Setting Property Values ​​in the Object Context

#### Signature

- **protected** method.
- It can take the following parameter (s):
  - `$settings`(`array`) - array of the property in the format 'name' = & gt; 'value'
Returns the `array`value.
- Throws one of the following exceptions:
  - [`ReflectionException`](http://php.net/class.ReflectionException)

### `setSettings()`<a name="setSettings"> </a>

Set default class settings

#### Signature

- **public static** method.
- It can take the following parameter (s):
  - `$settings`(`array`) - array of settings
- Returns nothing.

