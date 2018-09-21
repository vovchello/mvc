<p align="center"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS6j5t6K8IfOqI5eYqLZ1y9TwnIPWlZ0byEcK_TG-6MdEVJ37RS"></p>

## Описание

В данном проекте представлена базовая реализация паттерна MVC на примере интернет-магазина. 

## Установка

- Скопируйте либо склонируйте репозиторий.
- Для установки необходимых пакетов введите в консоли
~~~
    composer install 
~~~
- В корне проекта создайте файл .env на основе файла .env.test
- Заполните файл с указанием настроек базы данных
- Тестовая база данных расположена в папке database

## Роутинг

Router превращает URL в контроллер и экшн. Роуты необходимо добавлять в файл routes.php в папке routes.

```
    [
        'route' => 'здесь/указывается/урл',
        'params' => ['controller' => 'Имя контроллера', 'action' => 'название метода', 'namespace' => 'Если необходим']
    ],
       
    [
        'route' => 'post/index',
        'params' => ['controller' => 'Post', 'action' => 'index']
    ],
```
При необходимости, Вы можете передать любое количество параметров в экшн контроллера

~~~
    [
        'route' => 'post/{id:\d}',
        'params' => ['controller' => 'Post', 'action' => 'view']
    ],
~~~

## Контроллеры

Контроллеры распологаются в папке App/Controllers

## Представления

Представления используют шаблонизатор [Twig](https://twig.symfony.com/). Использование Twig позволяет создавать простые и переиспользуемые шабоны. Вы можете сгенерировать шаблон:

~~~
  View::renderTemplate('Home/index.html', [
      'name'    => 'Dave',
      'colours' => ['red', 'green', 'blue']
  ]);
~~~