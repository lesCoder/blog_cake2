Para rodar este projeto:

Em caso de usar docker rodar 2 comandos:

docker-compose -f "docker-compose.yml" up -d --build
php .\cakephp\app\Console\cake.php schema create
O primeiro irá criar as configurações do ambiente, já o segundo as do banco de dados. obs: aceite a opção de fazer drop nas tabelas.