Instruções para instalação:

Após a clonagem do repositório, fazer a instalação do composer na raíz do projeto:

composer install

Fazer a configuração do arquivo .env copiando o arquivo .env.example:

cp .env.example .env

Após a configuração do banco de dados em .env, executar as migrations:

php artisan migrate:fresh

Após a criação das tabelas, executar as seeds para teste:

php artisan db:seed

Para geração das chaves de uso do passport:

php artisan passport:install
