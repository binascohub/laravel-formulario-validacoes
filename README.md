Instalar aplicação

git clone 

composer install

Instalar postgree e criar banco de dados formulario_validacoes

criar arquivo .env

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=formulario_validacoes
DB_USERNAME=postgres
DB_PASSWORD=123

Rodar migration com seeder

php artisan migrate:refresh --seed
