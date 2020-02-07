# Captura de artigos

Projeto criado para efetuar capturas de artigos no blog https://www.uplexis.com.br

## Instalação

Após efetuar o clone do projeto em sua maquina, acesse a pasta "aplicacao" pelo seu terminal e execute o comando


```
composer update
```

Ao finalizar a atualização dos pacotes, ainda na pasta 'aplicacao' execute o comando abaixo no seu terminal 

```
cp .env.example .env
```

Esse comando criará uma cópia do arquivo .env.example para um novo arquivo .env que iremos usar para colocar as configuraçoes do banco de dados

execute o comando abaixo para gerar uma key para a aplicação no laravel


```
php artisan key:generate 
```

No seu phpmyadmin crie um novo banco de dados para receber as tabelas da aplicação

abra o arquivo .env no seu editor e insira as informações conforme a configuração do seu servidor ou maquina local 

DB_CONNECTION=mysql
DB_HOST= (localhost ou servidor)
DB_DATABASE= (o nome do seu banco de dados no phpmyadmin)
DB_USERNAME= (o usuario do seu banco de dados)
DB_PASSWORD= (a senha do seu banco de dados, caso não tenha senha, deixe em branco)

Conluindo o preenchimento do arquivo .env execute os comandos abaixo

```
php artisan migrate

php artisan db:seed
```

Utilize do usuario

usuario - admin
senha - admin

### Utilização

Ao efetuar o Login na aplicação você pode digitar qualquer frase para buscar artigos no blog https://www.uplexis.com.br e automaticamente salvar no banco de dados da aplicação


### Prerequisitos


```
PHP 5.5.9+
Mysql
```

## Built With

* [Laravel](https://www.laravel.com/docs/5.1) - Framework


