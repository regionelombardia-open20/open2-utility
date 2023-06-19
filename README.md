Amos Utility
------------
Thi plugin has many usefull pages and functions

### Installation
The only things you need is to require thhis package and enable the module in your config

***bash***
```bash
composer require "open20/amos-utility:^1.0"
```

***[PLATFORM]/common/config/main.php***
```php
return [
  ...
  'modules' => array_merge(require(__DIR__ . '/modules.php'), [
    ...
    'utility' => [
      'class' => 'open20\amos\utility\Module'
    ]
    ...
```

***[PLATFORM]/console/config/main.php***
```php
return [
    ...
    'controllerMap' => [
        'migrate' => [
            ...
            'migrationLookup' => array_merge(require(__DIR__ . '/migrations.php'), [                       
                ...
                '@vendor/open20/amos-utility/src/migrations',
                ...
        ])
        ...
```

---

### Packages
The packages page is a list with all the currently installed packages based on **composer.json** and **compose.lock** data

**URL**
http://[PLATFORM]/utility/packages
