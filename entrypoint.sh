
php composer.phar install

vendor/bin/doctrine orm:schema-tool:update --force --dump-sql

php index.php