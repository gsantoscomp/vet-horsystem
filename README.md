# Horsystem API

Esta aplicação foi criada usando o Laravel Sail, que é uma solução leve para o desenvolvimento de aplicações Laravel com Docker.
O Laravel Sail inclui todos os serviços necessários para executar uma aplicação Laravel, incluindo um servidor Nginx e Redis. 

## Requisitos

- Docker
- Docker Compose

## Instalação

1. Clone o repositório:

```
git clone https://github.com/gsantoscomp/manager-horsystem.git
cd seu_repositorio
```

2. Copie o arquivo `.env.example` para criar um novo arquivo `.env`:

```
cp .env.example .env
```

3. Inicie os contêineres do Docker com o Laravel Sail:

```
docker-compose up -d
```

4. Adicione um alias para o comando Sail ao seu arquivo `~/.bashrc` (ou `~/.bash_aliases`, dependendo da sua configuração):

```
echo "alias sail='bash vendor/bin/sail'" >> ~/.bashrc
source ~/.bashrc
```

5. Instale as dependências do Composer dentro do container:

```
docker-compose exec laravel.test composer install
```

6. Gere a chave da aplicação:

```
sail artisan key:generate
```

7. Execute as migrações e seeders do banco de dados:

```
sail artisan migrate --seed
```

A aplicação agora deve estar em execução no endereço `http://localhost:8001` no seu navegador.

## Configurando o JWT

1. Publique a configuração do JWT:

```
sail artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
```

2. Gere uma chave secreta para o JWT:

```
sail artisan jwt:secret
```
Isso adicionará a chave `JWT_SECRET` ao seu arquivo `.env`.

Obs: se na API de autenticação o `JWT_SETCRET` for diferente do `JWT_SECRET` da API que compartilha o mesmo cache Redis, o token JWT não será reconhecido.

3. Atualize o arquivo `config/auth.php` para usar o `jwt` como driver de autenticação para a API, se já não estiver configurado:

```php
'guards' => [
    // ...
    'api' => [
        'driver' => 'jwt',
        'provider' => 'users',
        'hash' => false,
    ],
],
```

4. Certifique-se de que a chave `APP_NAME` e a chave `JWT_SECRET` sejam iguais para a API de autenticação e qualquer outra API que compartilhe o mesmo cache Redis.
