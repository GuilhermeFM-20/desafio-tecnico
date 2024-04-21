## Desafio Técnico - Busca de Municípios

Este projeto visa analisar minha capacidade técnica no uso do framework Laravel para o processo seletivo. Será utilizado o Laravel na versão 11 e o PHP na versão 8. Também será utilizada a biblioteca Livewire para renderizar o SPA do projeto. O projeto é uma API que lista as cidades do estado informado, retornando o nome e código do IBGE usando os providers fornecidos.

Providers do projeto: 
(https://brasilapi.com.br/api/ibge/municipios/v1/RS).
(https://servicodados.ibge.gov.br/api/v1/localidades/estados/rs/municipios).

## Tecnologias Usadas

- Docker
- Laravel
- Livewire
- PHPUnit
- Guzzle
- Mysql
- Bootstrap

## Instalação do Projeto

1 - Após clonar o projeto, será necessário rodar o container usando `docker compose up -d`
 Observação: Verificar se as dependências foram instaladas com sucesso, caso contrário, será necessário rodar o comando `docker compose exec -it php sh` para entrar no container e depois rodar o comando `composer install`

2 - Após levantar o container será necessário rodar as migrations do projeto, usando o comando `php artisan migrate` dentro do container

3 - Após transformar o arquivo `.env.example` em `.env`, será necessário informar qual será o provider usado.
    Seleção do provider: 
    `CITIES_API_PROVIDER=API_BRASIL`: Para usar o API Brasil
    `CITIES_API_PROVIDER=API_IBGE`: Para usar IBGE

## Rota da API

O projeto possui a rota principal que retorna os municípios do estado informado.

- `GET /api/state/{sigla-estado}`: rota da api que retorna os municípios.

O arquivo de rota da api está organizado com uma estrutura do grupo `state`, permitindo implementar outras funcionalidade para a rotas principal dos estados.

Exemplo de uso das rotas:

```php
    Route::prefix('/state')->group(function(){
        Route::get('/{uf}',CitiesByStateController::class);
        Route::get('/{uf}/{city}',[CitiesByStateController::class,'searchCity']);
        ...
    });
```

## SPA do Projeto

O SPA está exibindo uma tela criada com bootstrap. Usando também o livewire para renderizar o `Grid`, que seria o filtro de busca do estado.

<img src="https://github.com/GuilhermeFM-20/desafio-tecnico/tree/main/storage/img/SPA.png" width="400">

Para acessar a rota do SPA basta buscar a URL: `http://localhost:{porta-projeto}/`

No SPA é possível buscar o estado e visualizar os municípios na tabela.

## Testes

Para executar os testes será necessário rodar o comando:

```sh
    ./vendor/bin/phpunit
```

Para executar um teste unitário específico, precisa filtrar o método:

```sh
    ./vendor/bin/phpunit --filter testeExemplo
```