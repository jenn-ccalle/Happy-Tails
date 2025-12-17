Este es el repositorio para mi proyecto Happy Tails

Comandos para iniciar el proyecto

run 

ng new Happy-Client (nombre de mi proyecto Angular)

Dentro del proyecto Angular ejecutamos npm install

$ docker-compose build

$ docker-compose up -d

Hay que entrar en el contenedor php74-container con el siguiente comando

$ docker exec -it php74-container bash

E instalar symfony

$ composer create-project symfony/skeleton .

Dentro backend/app hay un archivo .env , la línea de set MySql debe estar más o menos así

DATABASE_URL="mysql://root:contrasena@mysql8-service:3306/nombreBaseDatos?serverVersion=8"

Mi URL: DATABASE_URL="mysql://root:secret@mysql8-service:3306/happytails?serverVersion=8"

El host y el puerto de .env están detenminados en el env var de docker-compose.yml

Dependencias a requerir

$ composer require doctrine

$ composer require annotations

$ composer require maker

$ composer require cors

Para la base de datos
docker-compose exec mysql8-container php bin/console doctrine:database:create
docker-compose execmysql8-container php bin/console doctrine:migrations:migrate


Para verificar que todos los contenedores funcionan
docker-compose ps


URL establecida
Localhost angular: http://localhost:8100/



Los enlaces pa
