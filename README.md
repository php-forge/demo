<p align="center">
    <a href="https://github.com/php-forge/demo" target="_blank">
        <img src="https://avatars.githubusercontent.com/u/103309199?s=400&u=ca3561c692f53ed7eb290d3bb226a2828741606f&v=4" height="100px">
    </a>
    <h1 align="center">Demo para Yii3.</h1>
    <br>
</p>

[![codeception](https://github.com/php-forge/demo/actions/workflows/codeception.yml/badge.svg)](https://github.com/php-forge/demo/actions/workflows/codeception.yml)
[![codecov](https://codecov.io/gh/php-forge/demo/branch/main/graph/badge.svg?token=KB6T5KMGED)](https://codecov.io/gh/php-forge/demo)
[![static analysis](https://github.com/php-forge/demo/workflows/static%20analysis/badge.svg)](https://github.com/php-forge/demo/actions?query=workflow%3A%22static+analysis%22)
[![type-coverage](https://shepherd.dev/github/php-forge/demo/coverage.svg)](https://shepherd.dev/github/php-forge/demo)

## Instalación

```shell
composer create-project --prefer-dist forge/demo <your project>
```
## Como usar este demo

### Aplicando migraciones

```shell
./yii migrate/up --no-interaction
```

### Uso del servidor php incorporado

```shell
php -S 127.0.0.1:8080 -t public
```

### Espere hasta que esté listo, luego abra la siguiente URL en su navegador

```shell
http://localhost:8080
```

## Análisis estático

El código se analiza estáticamente con [Psalm](https://psalm.dev/docs). Para ejecutarlo:

```shell
./vendor/bin/psalm
```

## Pruebas unitarias

Las pruebas unitarias se comprueban con [PHPUnit](https://phpunit.de/). Para ejecutarlo:

```shell
./vendor/bin/phpunit
```

## Calidad y estilo de código

[![Codacy Badge](https://app.codacy.com/project/badge/Grade/c4bdab17970b4426ac28b0bbb4d5e698)](https://www.codacy.com/gh/php-forge/demo/dashboard?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=php-forge/demo&amp;utm_campaign=Badge_Grade)
[![StyleCI](https://github.styleci.io/repos/518743233/shield?branch=main)](https://github.styleci.io/repos/518743233?branch=main)

## Licencia

El paquete `php-forge/demo` es software libre. Se publica bajo los términos de la Licencia BSD.
Consulte [`LICENSE`](./LICENSE.md) para obtener más información.

Mantenido por [Terabytesoftw](https://github.com/terabytesoftw).

## Nuestras redes sociales

[![Twitter](https://img.shields.io/badge/twitter-follow-1DA1F2?logo=twitter&logoColor=1DA1F2&labelColor=555555?style=flat)](https://twitter.com/PhpForge)
