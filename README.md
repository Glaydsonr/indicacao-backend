# Cadastro de indicações

## Sobre o projeto

Projeto Desenvolvido para cadastro e atualização de status dos indicados

## Requisitos

[PHP](https://www.php.net/) >= 7.2.5,


[MYSQL](https://www.mysql.com/) 5.6,


[Composer](https://getcomposer.org),

[Laravel](https://laravel.com/docs/8.x) 8x

## Instalação

Execute o comando abaixo para instalar as dependências:

``` bash
# Instalar composer
composer install

# Criar o arquivo de configuração das variáveis de ambiente.
cp .env.example .env

# Execute o comando abaixo para gerar a key da aplicação
php artisan key:generate

# Certificar que os dados informados no .env estão configurados corretamente.
php artisan migrate --seed
```
