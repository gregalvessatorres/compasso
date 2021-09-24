## Sobre o Projeto
Projeto de estudos. Foi construido usando o artisan cli com o comando serve;

## Passo a Passo executar
Após fazer o clone do projeto:
 - navegar até a pasta do projeto no seu terminal
 - executar o comando : 
   - composer install 
 - criar um arquivo .env com o comando
   - cp .env.example .env
 - executar o comando: 
   - php artisan key:generate
   
Será criar um banco local com o nome "mysql_compasso" ou ajustar o .env conforme necessário nos parametros:DB_DATABASE, DB_USERNAME e DB_PASSWORD 
 - executar o comando:
    - php artisan migrate
 - executar o comando:
    - php artisan serve
 