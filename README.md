<h1>Tecnologias utilizadas</h1>
<ul>
    <li>PHP</li>
    <li>Laravel</li>
        <ol> 
            <li>Laratrust(Roles, Permissions)</li>
            <li>Laravel Passport(API OAuth 2.0)</li>
            <li>Laravel Notifications(Notificações)</li>
        </ol>
<li>Javascript</li>
    <ol>
        <li>Jquery</li>
     </ol>  
<li>Css</li>
    <ol>
        <li>Bootstrap</li>
        <li>AdminLTE(layout)</li>
     </ol>  
<li>HTML</li>
</ul>

<h1>Esquema do banco de dados</h1>

![image](https://user-images.githubusercontent.com/71338619/130551502-670e9f9e-0d94-4d0d-bb72-164b754c689d.png)



<h1>Instruções para instalação:</h1>

Após a clonagem do repositório, fazer a instalação do composer na raíz do projeto:
```
composer install
```
Fazer a configuração do arquivo .env copiando o arquivo .env.example:
```
cp .env.example .env
```
Após a configuração do banco de dados em .env, executar as migrations:
```
php artisan migrate:fresh
```
Após a criação das tabelas, executar as seeds para teste:
```
php artisan db:seed
```
Para geração das chaves de uso do passport:
```
php artisan passport:install
```
