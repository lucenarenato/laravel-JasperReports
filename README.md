# Relatórios em PHP(Laravel) com JasperReports 

## Ubuntu 20.04 and Laravel 6

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

- composer create-project --prefer-dist laravel/laravel laravel-jasper "6.*"
- composer require laravel/ui "^1.0" --dev
- composer require lavela/phpjasper

- php artisan ui vue --auth

- php artisan db:seed --class=CustomerFakerSeeder

## If you intend to use Vue, React, or Bootstrap, the UI package provides the following command:
```
php artisan ui --help
```
## Here are a few examples:
```
php artisan ui vue
php artisan ui react
```
## If you want to generate the auth scaffolding at the same time:
```
php artisan ui vue --auth
php artisan ui react --auth
```

## The ui:auth Command
Besides the new ui command, the laravel/ui package comes with another command for generating the auth scaffolding:
```
php artisan ui:auth
```
## If you run the ui:auth command, it will generate the auth routes, a HomeController, auth views, and a app.blade.php layout file.

## You can also generate the views only with:
```
php artisan ui:auth --views
```
## Baixe e instale o Jaspersoft® Studio
- http://community.jaspersoft.com/project/jaspersoft-studio

## Selecione o Adapter criado, faça a query e clique em Read Fields que o jasper irá automaticamente mapear os campos do relatório
`select name, address, city, phone, since from customers`

## Install Java 8 on Ubuntu 20.04/18.04/16.04
```
$ sudo apt install openjdk-8-jdk
$ java -version
```

## select version java
`sudo update-alternatives --config java`

> Usei conector do mariadb por alguns problemas de ssl
`mariadb-java-client-2.7.2.jar`
> Adicionei no caminho da vendor: `/vendor/lavela/phpjasper/bin/jasperstarter/jdbc`

Fontes:
- https://laravel-news.com/running-make-auth-in-laravel-6
- https://medium.com/@eltonantunes_85873/relat%C3%B3rios-em-php-laravel-com-jasperreports-parte-1-9a37917846a1
- https://linuxize.com/post/install-java-on-ubuntu-18-04/
- https://computingforgeeks.com/how-to-install-java-8-on-ubuntu/

> PS: Se estiver usando o linux talvez tenha problemas de permissão, 
> veja no repositório https://github.com/lavela/phpjasper/ , lá tem algumas dicas de como resolver.

<p align="center"><a href="https://laravel.com" target="_blank"><img src="laravel-news__logo.png" width="400"></a></p>
<p align="center"><a href="http://community.jaspersoft.com/project/jaspersoft-studio" target="_blank"><img src="jasperReports.png" width="400"></a></p>
<br>
<p align="center"><a href="http://blog.renatolucena.net/" target="_blank"><img src="Captura de Tela_Área de Seleção_20210304233712.png" width="400"></a></p>

## Renato Lucena 2021