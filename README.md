## Instalar pacotes Composer
```
git clone 
composer install
```

## Gerar key app e conexão com banco
Instalar postgree e criar banco de dados formulario_validacoes

Criar arquivo .env com base no .env.example

```
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=formulario_validacoes
DB_USERNAME=postgres
DB_PASSWORD=123
```

Gerar chave da API Laravel

```
php artisan key:generate
```

## Permissões
Sem uso do Docker
```
sudo chmod -R ug+rwx storage bootstrap/cache logs
```
Com uso do Docker
```
docker-compose -f docker-compose.yml exec php chmod -R ug+rwx storage bootstrap/cache logs
docker-compose -f docker-compose.yml exec php chgrp -R apache storage bootstrap/cache logs
```

## Rodar migration com seeder
```
php artisan migrate:refresh --seed
```
