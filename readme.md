# Tutorial Desenvolvendo com Docker

## Instalação ##

https://docs.docker.com/desktop/install/windows-install/

## Hub
https://hub.docker.com/

## Tutorial WSL Install
https://learn.microsoft.com/en-us/windows/wsl/install-manual#step-4---download-the-linux-kernel-update-package

* Executar os Steps do documento 1 ate 6

* Choose Ubuntu 20.04.5 LTS

* Enter user name: dev and password: dev


## Como criar uma Imagem/Container no Docker ##
    
    1.Idea criar uma aplicação com apache + mysql ou mariaDB + php8.0

    2.Criar o DockerFile
        * Como escrever o dockerfile
                https://docs.docker.com/engine/reference/builder/#from

        * Criar o arquivo compose.yml

            https://raw.githubusercontent.com/compose-spec/compose-spec/master/schema/compose-spec.json
        
    3. Entrar no terminal do container e criar um usuario externo para o BD

        docker-compose  -f docker/local/compose.yml exec mysql bash
        # mysql -u root -p

        > use mysql;
        > GRANT ALL PRIVILEGES ON *.* TO 'teste'@'%' IDENTIFIED BY 'teste' WITH GRANT OPTION;
        > flush privileges;

        > CREATE TABLE `test`.`users` (
          `id` INT NOT NULL,
        `name` VARCHAR(255) NULL);

        >ALTER TABLE `test`.`users` 
        ADD PRIMARY KEY (`id`)
       
        >ALTER TABLE `test`.`users` 
        CHANGE COLUMN `id` `id` INT(11) NOT NULL AUTO_INCREMENT ;


    4. Rodar uma aplicação fazendo os acesso ao banco de dados e criar um index.html 
        fazendo uma chamada Ajax para o BackEnd php.
    
    5. Entrar no terminal da aplicação  

        docker-compose  -f docker/local/compose.yml exec php bash 



## Referencias ##

    https://www.w3schools.com/php/default.asp



