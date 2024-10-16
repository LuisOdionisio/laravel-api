# Construindo uma aplicação MVC com Laravel 7

Projeto produzido em uma live code em parceria com a [Digital Innovation One](https://digitalinnovation.one) no dia 26/05/2020

## Descrição do projeto

Neste projeto, desenvolvemos juntos uma aplicação MVC. Onde temos uma entrada de CEP através do usuário, e logo após
fazemos a busca do CEP na API da [ViaCEP](http://viacep.com.br/) para confirmação e cadastro em banco de dados.

## Para rodar o projeto

Criar arquivo .env

``cp .env.example .env``

Subir o projeto

``make up``

Instalar dependências

``make composer``

``composer install --ignore-platform-reqs``

Adicionar permissão de escritas para o FW (NÃO FAÇA ISSO EM PROD)

``sudo chmod -R 777 storage/logs storage/framework``

Criar chave da aplicação

``make php``

``php artisan key:generate``

## Links

[PPT utilizado na Live](https://docs.google.com/presentation/d/1-ao-3echbBHzdSqRF726K4GUFMn7JoL0dhoJWyPORXY/edit?usp=sharing)

[Zip com arquivos docker](https://bit.ly/vitor-laravel-utils)

[Plataforma com cursos de Laravel](https://laracasts.com/)
