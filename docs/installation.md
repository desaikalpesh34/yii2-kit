# INSTALLATION

## TABLE OF CONTENTS
- [Before you begin](#before-you-begin)
- [Manual installation](#manual-installation)
    - [Requirements](#requirements)
    - [Setup application](#setup-application)
    - [Configure your web server](#configure-your-web-server)
    - [Single domain installtion](#single-domain-installation)

- [Docker installation](#docker-installation)
- [Vagrant installation](#vagrant-installation)
- [Demo users](#demo-users)
- [Important-notes](#important-notes)

## Before you begin
1. If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

2. Install composer-asset-plugin needed for yii assets management
```bash
composer global require "fxp/composer-asset-plugin"
```

### Get source code
#### Download sources
https://github.com/trntv/yii2-starter-kit/archive/master.zip

#### Or clone repository manually
```
git clone https://github.com/trntv/yii2-starter-kit.git
```
#### Install composer dependencies
```
composer install
```

### Get source code via Composer
You can install this application template with `composer` using the following command:

```
composer create-project --prefer-dist --stability=dev trntv/yii2-starter-kit
```

## Manual installation

### REQUIREMENTS
The minimum requirement by this application template that your Web server supports PHP 5.5.0.
Required PHP extensions:
- intl
- gd
- mcrypt



### Setup application
1. Copy `.env.dist` to `.env` in the project root.
2. Adjust settings in `.env` file
	- Set debug mode and your current environment
	```
	YII_DEBUG   = true
	YII_ENV     = dev
	```
	- Set DB configuration
	```
	DB_DSN           = mysql:host=127.0.0.1;port=3306;dbname=yii2-starter-kit
	DB_USERNAME      = user
	DB_PASSWORD      = password
	```

	- Set application canonical urls
	```
	FRONTEND_URL    = http://yii2-starter-kit.dev
	BACKEND_URL     = http://backend.yii2-starter-kit.dev
	STORAGE_URL     = http://storage.yii2-starter-kit.dev
	```

3. Run in command line
```
php console/yii app/setup
```

### Configure your web server
Copy `vhost.conf.dist` to `vhost.conf`, change it with your local settings and copy (symlink) it to nginx `sites-enabled` directory.
Or configure your web server with three different web roots:
- yii2-starter-kit.dev => /path/to/yii2-starter-kit/frontend/web
- backend.yii2-starter-kit.dev => /path/to/yii2-starter-kit/backend/web
- storage.yii2-starter-kit.dev => /path/to/yii2-starter-kit/storage/web

### Single domain installation
#### Setup application
Adjust settings in `.env` file

```
FRONTEND_URL    = /
BACKEND_URL     = /admin
STORAGE_URL     = /storage/web
```

Adjust settings in `backend/config/web.php` file
```
    ...
    'components'=>[
        ...
        'request' => [
            'baseUrl' => '/admin',
        ...
```
Adjust settings in `frontend/config/web.php` file
```
    ...
    'components'=>[
        ...
        'request' => [
            'baseUrl' => '',
        ...
```

#### Configure your web server
##### Apache
This is an example single domain config for apache
```
<VirtualHost *:80>
    ServerName yii2-starter-kit.dev

    RewriteEngine on
    # the main rewrite rule for the frontend application
    RewriteCond %{HTTP_HOST} ^yii2-starter-kit.dev$ [NC] 
    RewriteCond %{REQUEST_URI} !^/(backend/web|admin|storage/web)
    RewriteRule !^/frontend/web /frontend/web%{REQUEST_URI} [L]
    # redirect to the page without a trailing slash (uncomment if necessary)
    #RewriteCond %{REQUEST_URI} ^/admin/$
    #RewriteRule ^(/admin)/ $1 [L,R=301]
    # disable the trailing slash redirect
    RewriteCond %{REQUEST_URI} ^/admin$
    RewriteRule ^/admin /backend/web/index.php [L]
    # the main rewrite rule for the backend application
    RewriteCond %{REQUEST_URI} ^/admin
    RewriteRule ^/admin(.*) /backend/web$1 [L]

    DocumentRoot /your/path/to/yii2-starter-kit
    <Directory />
        Options FollowSymLinks
        AllowOverride None
        AddDefaultCharset utf-8
    </Directory>
    <Directory "/your/path/to/yii2-starter-kit/frontend/web">
        RewriteEngine on
        # if a directory or a file exists, use the request directly
        RewriteCond %{REQUEST_FILENAME} !-f
        RewriteCond %{REQUEST_FILENAME} !-d
        # otherwise forward the request to index.php
        RewriteRule . index.php

        Require all granted
    </Directory>
    <Directory "/your/path/to/yii2-starter-kit/backend/web">
        RewriteEngine on
        # if a directory or a file exists, use the request directly
        RewriteCond %{REQUEST_FILENAME} !-f
        RewriteCond %{REQUEST_FILENAME} !-d
        # otherwise forward the request to index.php
        RewriteRule . index.php

        Require all granted
    </Directory>
    <Directory "/your/path/to/yii2-starter-kit/storage/web">
        RewriteEngine on
        # if a directory or a file exists, use the request directly
        RewriteCond %{REQUEST_FILENAME} !-f
        RewriteCond %{REQUEST_FILENAME} !-d
        # otherwise forward the request to index.php
        RewriteRule . index.php

        Require all granted
    </Directory>
    <FilesMatch \.(htaccess|htpasswd|svn|git)>
        Require all denied
    </FilesMatch>
</VirtualHost>
```

##### Nginx
This is an example single domain config for nginx

```
server {
	listen 80;

	root /app;
	index index.php index.html;

	server_name yii2-starter-kit.dev;

	charset utf-8;

	# location ~* ^.+\.(jpg|jpeg|gif|png|ico|css|pdf|ppt|txt|bmp|rtf|js)$ {
	#	access_log off;
	#	expires max;
	# }

	location / {
		try_files $uri /frontend/web/index.php?$args;
	}

	location /backend {
		try_files  $uri /backend/web/index.php?$args;
	}

	# storage access
	location /storage {
		try_files  $uri /storage/web/index.php?$args;
	}

    client_max_body_size 32m;

	location ~ \.php$ {
		fastcgi_split_path_info ^(.+\.php)(/.+)$;
		fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
		fastcgi_pass php-fpm;
		fastcgi_index index.php;
		include fastcgi_params;

		## Cache
		# fastcgi_pass_header Cookie; # fill cookie valiables, $cookie_phpsessid for exmaple
		# fastcgi_ignore_headers Cache-Control Expires Set-Cookie; # Use it with caution because it is cause SEO problems
		# fastcgi_cache_key "$request_method|$server_addr:$server_port$request_uri|$cookie_phpsessid"; # generating unique key
		# fastcgi_cache fastcgi_cache; # use fastcgi_cache keys_zone
		# fastcgi_cache_path /tmp/nginx/ levels=1:2 keys_zone=fastcgi_cache:16m max_size=256m inactive=1d;
		# fastcgi_temp_path  /tmp/nginx/temp 1 2; # temp files folder
		# fastcgi_cache_use_stale updating error timeout invalid_header http_500; # show cached page if error (even if it is outdated)
		# fastcgi_cache_valid 200 404 10s; # cache lifetime for 200 404;
		# or fastcgi_cache_valid any 10s; # use it if you want to cache any responses
	}
}
```
## PHP-FPM Servers ##
```
upstream php-fpm {
    server fpm:9000;
}
```

## Docker installation
### Before installation
 - Read about [docker](https://www.docker.com)
 - Install it
 - If you are not working on Linux (but OSX, Windows) instead, you will need a VM to run docker. 
 If you don't intend to use Docker containers for application deployment, it might be better to 
 use the Vagrant way to install `yii2-starter-kit`.

### Installation
1. Copy `.env.docker.dist` to `.env` in the project root
2. Copy `vhost.conf.docker.dist` to `vhost.conf` in the project root
3. *Linux users can ignore this step.* Under OSX or Windows you need a VM to run docker.
    1. Install [VirtualBox](https://www.virtualbox.org/).
    2. Run `docker-machine create -d virtualbox default` to create the VM.
    3. Run `eval $(docker-machine env default)` to configure docker to use it.
4. Run `docker-compose build`
5. Run `docker-compose up -d`
6. Run locally `composer install --prefer-dist --optimize-autoloader`
7. Setup application with `docker-compose run cli console/yii app/setup`
8. That's all - your application is accessible on http://yii2-starter-kit.dev:8000

### Docker FAQ
1. How do i run yii console command?

`docker-compose run cli help`

`docker-compose run cli migrate`

`docker-compose run cli rbac-migrate`

2. How to connect to the application database with my workbench, navicat etc?
MySQL is available on `127.0.0.1`, port `33060`. User - `root`, password - `root`

## Vagrant installation
If you want, you can use bundled Vagrant instead of installing app to your local machine.

1. Install [Vagrant](https://www.vagrantup.com/)
2. Copy files from `docs/vagrant-files` to application root
3. Create GitHub [personal API token](https://github.com/blog/1509-personal-api-tokens) and add it in `vagrant.yml`
4. Run:
```
vagrant plugin install vagrant-hostmanager
vagrant up
```
That`s all. After provision application will be accessible on http://yii2-starter-kit.dev

## Demo data
### Demo Users
```
Login: webmaster
Password: webmaster

Login: manager
Password: manager

Login: user
Password: user
```

## Important notes
- There is a VirtualBox bug related to sendfile that can lead to corrupted files, if not turned-off
Uncomment this in your nginx config if you are using Vagrant:
```sendfile off;```
