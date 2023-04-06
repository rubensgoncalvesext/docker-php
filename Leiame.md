# Tutorial Desenvolvendo com Docker#

## Instalação ##

https://docs.docker.com/desktop/install/windows-install/

## Hub
https://hub.docker.com/

## Tutorial WSL Install
https://learn.microsoft.com/en-us/windows/wsl/install-manual#step-4---download-the-linux-kernel-update-package

* Executar os Steps do documento 1 ate 6

* Choose Ubuntu 20.04.5 LTS

* Enter user name: dev and password: dev


## Como criar uma Imagem/Container ##
    
    1.idea criar uma aplicação com apache + mysql ou mariaDB + php8.0

    2.criar o DockerFile
        * Como escrever o dockerfile
                https://docs.docker.com/engine/reference/builder/#from

        * Criar o compose
            como escrever o compose.yml
            https://raw.githubusercontent.com/compose-spec/compose-spec/master/schema/compose-spec.json
        
        * Rodar aplicação fazendo os acesso a base e criar um index.html

    3. entrar no terminal do container e criar um usuario externo para o BD

        docker-compose  -f docker/local/compose.yml exec mysql bash
        # mysql -u root -p

        > use mysql;
        > GRANT ALL PRIVILEGES ON *.* TO 'teste'@'%' IDENTIFIED BY 'teste' WITH GRANT OPTION;
        > flush privileges;

    4. entrar no terminal da aplicação  

        docker-compose  -f docker/local/compose.yml exec php bash 

