<h1>O que foi pedido</h1>
 Tarefas:
- [x] Criação do Banco de Dados (Usuários, Alunos, Professores, Aulas).
- [ ](Apenas criado as permissões e designado para cada user) Criação do sistema de permissão dos usuários para cada ação do sistema.
- [x] Criação de CRUD para Usuários, Alunos, Professores, Aulas.
- [x] Criar sistema de Login para Usuários administradores, Alunos e 
Professores.
- [x] O Aluno pode solicitar participação em uma aula, essa participação 
deverá ser exibida como notificação para o professor responsável, e o 
mesmo deve aceitar ou recusar esse aluno na aula.
- [x] Criação dos recursos de API Rest que possibilitem utilizar o sistema
através de um aplicativo externo.
- [ ] Utilizar Docker ou Sail (Laravel 8).
- [ ] Hospedar o projeto em serviço de sua preferência (AWS, DigitalOcean,
Heroku, etc).
- [x] Utilizar Git para gerenciar o projeto.
- [x] Deve ser utilizado o Composer para gerenciar as dependências da 
aplicação.
- [x] Crie um README com orientações para a instalação.
Informações a considerar:
- [ ] No sistema de permissão, o usuário administrador deve conseguir editar 
a permissão para cada ação do sistema, para determinados níveis de 
usuário(Professor, Aluno).
- [x] O sistema de login, deve possibilitar o login e cadastro para todos os 
níveis de usuário (Administrador, Aluno, Professor).
- [x] Para o CRUD deve ser possível Criar, Listar, Editar e Visualizar esses 
recursos através de um painel, de acordo com as respectivas permissões.
- [x] O Painel de gerenciamento pode ser criado utilizando a tecnologia que 
desejar para o Front-End. 
- [x] O Aluno pode: Visualizar as aulas e suas informações(Professor, matéria, 
data, hora), se inscrever em uma aula, cancelar a participação em uma 
aula.
- [x] O Professor pode: Visualizar as aulas (Alunos, matéria, data, hora), 
aceitar/rejeitar solicitação de novos alunos.
- [x] O Administrador pode: Criar, editar, visualizar, excluir todos os recursos 
(aulas, alunos, professores), alterar permissões.
- [x] Caso o Aluno seja aceito em uma aula, deverá enviar uma notificação no 
painel do mesmo para informar. 
- [x] Caso o Aluno seja recusado em uma aula, enviar notificação para o 
mesmo informando o motivo da recusa. 
- [x] Para os recursos de API Rest, deverá ser desenvolvida seguindo o modelo
de autenticação padrão utilizando Passport. 
Observações: 

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
