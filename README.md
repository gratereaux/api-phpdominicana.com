# api-phpdominicana.com
:zap: API para el uso de metodos de Slack &amp; Github

## Metodos de Slack

```php
-----------------------------------------------------------------------------------------------
| Metodo                      | Descripción                                                   
| --------------------------  |---------------------------------------------------------------|
| (new Slack)->get_users()    | Obtener la lista de usuarios disponibles en todos los canales |
| (new Slack)->get_channels() | Obtener la lista de los canales disponibles                   |
| (new Slack)->send_message() | Enviar un mensaje a un canal (Recomendado: canal público)     |
-----------------------------------------------------------------------------------------------
````

## Metodos de Github

```php
----------------------------------------------------------------------------------------------------------|
| Metodo                              | Descripción                                                       |
| ----------------------------------  |-------------------------------------------------------------------|
| (new Github)->get_contributors()    | -Obtener todas las personas que contribuyen a una repo especifica |
| (new Github)->get_repos()           | -Mētodo para obtener todas las repos publicas                     |
| (new Github)->get_all() |           | -Obtener todos las repos publicas y la persona que contribuye en  |
|                                        cada una de ellas                                                |
----------------------------------------------------------------------------------------------------------
````



## License

[![CC0](http://mirrors.creativecommons.org/presskit/buttons/88x31/svg/cc-zero.svg)](https://creativecommons.org/publicdomain/zero/1.0/)

To the extent possible under law, [PHP Dominicana](http://phpdominicana.com/) has waived all copyright and related or neighboring rights to this work.
