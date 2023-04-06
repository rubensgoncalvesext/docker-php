FROM ubuntu/apache2:2.4-22.04_beta
ENV ACCEPT_EULA=Y

# Time Zone
ENV TZ=America/Sao_Paulo
RUN ln -snf /usr/share/zoneinfo/${TZ} /etc/localtime && echo ${TZ} > /etc/timezone

ENV uid=1000

# base system utilities
RUN apt-get update &&  \
apt-get install -y software-properties-common  && \
rm -rf /var/lib/apt/lists/*  && \
add-apt-repository ppa:ondrej/php 

# Instalação das Bibliotecas: 
RUN apt-get update -y && apt-get install -y php7.4 \
    libapache2-mod-php7.4 \ 
    php7.4-mcrypt \
    php7.4-mysql \ 
    php \
    libapache2-mod-php \
    php7.4-curl \
    cron \
    php7.4-zip \
    php7.4-imap \
    php7.4-simplexml \
    unzip \
    curl \
    vim 

RUN apt-get install -y mariadb-client
 
# Instalação e configuração do XDebug
RUN apt-get install php7.4-xdebug \
    && echo "zend_extension=xdebug.so" > /etc/php/7.4/mods-available/xdebug.ini \
    && echo "xdebug.mode=develop,debug" >> /etc/php/7.4/mods-available/xdebug.ini \
    && echo "xdebug.start_with_request=yes" >>  /etc/php/7.4/mods-available/xdebug.ini \
    && echo "xdebug.client_host=host.docker.internal" >>  /etc/php/7.4/mods-available/xdebug.ini \    
    && echo "xdebug.client_port=9003" >> /etc/php/7.4/mods-available/xdebug.ini \
    && echo "xdebug.idekey=docker" >> /etc/php/7.4/mods-available/xdebug.ini \
    && echo "xdebug.log=/var/log/xdebug.log" >> /etc/php/7.4/mods-available/xdebug.ini 

# Configurando SSL
RUN apt-get install -y apache2 openssl

#Configurando APP Home
ENV APP_HOME=/var/www/html/tutorial
RUN mkdir $APP_HOME

ADD https://github.com/ufoscout/docker-compose-wait/releases/download/2.9.0/wait /wait
RUN chmod +x /wait

WORKDIR $APP_HOME

#Configurando o servidor Apache
ADD ./apache2.conf /etc/apache2/apache2.conf
ADD ./000-default.conf /etc/apache2/sites-enabled/000-default.conf
# ADD ./.htaccess $APP_HOME/.htaccess
# ADD ./index.php $APP_HOME/index.php
# RUN mkdir /etc/apache2/certificate
# ADD ./certificate /etc/apache2/certificate

#Configurando o php.ini
# ADD ./php.ini /etc/php/7.4/apache2/php.ini

#Configurando o Backup
# RUN mkdir /backup
# ADD ./backup.sh /backup/backup.sh

# RUN ["chmod", "+x","-R", "$APP_HOME/api/application/documents/in/"]
# RUN ["chmod", "+x","-R", "$APP_HOME/api/application/documents/out/"]
# RUN ["chmod", "+x","-R", "$APP_HOME/api/application/template/"]
# RUN chmod +x $APP_HOME/fotos
# RUN ["chmod", "+x", "-R", "$APP_HOME/report/"]

# Adicionar o usuario Admin ao grupo www-data 
RUN chown -R www-data:www-data $APP_HOME

# Ativando o modo overwrite e SSL
# RUN a2enmod rewrite
# RUN a2enmod ssl

# Copiando o arquivo de cron para o contenier
# ADD ./crontabs /etc/cron.d/sgtruck-crontabs

# Permissão ao arquivo de cron
# RUN chmod 0644 /etc/cron.d/tutorial-crontabs

# Create the log file to be able to run tail
# RUN touch /var/log/cron.log

# Executando crontab
# RUN crontab /etc/cron.d/tutorial-crontabs

# Criando ponto de entrada para o cron
# ENTRYPOINT ["cron", "-f"]
 