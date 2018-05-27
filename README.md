# Yii 2 Kit

This is Yii2 start application template.

### DEMO

Frontend:
http://kalpeshdesai.in/yii/kit/frontend/web

Backend:
http://kalpeshdesai.in/yii/kit/backend/web
admin/admin123

Local instalation
Frontend:
http://localhost/yii2/starter/frontend/web/

Backend:
http://localhost/yii2/starter/backend/web/

`administrator` role account
```
Login: admin
Password: admin123
```

`sub-admin` role account
```
Login: sub_admin
Password: admin123
```

`user` role account
```
Login: user
Password: admin123
```

`vendor` role account
```
Login: vendor
Password: admin123
```
### Api
Ready-to-go RESTful API App pre configrable
 - Api BaseUrl
	 ```
	   http://kalpeshdesai.in/yii/kit/api/web/v1
	 ```
 - How to use
	 ```
	 	  http://kalpeshdesai.in/yii/kit/api/web/v1/user
	 ```


### RBAC

pre configured yii-admin module for rbac manager.
All the controller and action is managed from backend.
here you can manage role and permission.
http://kalpeshdesai.in/yii/kit/backend/web/admin
for more detail visit (https://github.com/mdmsoft/yii2-admin/blob/master/docs/guide/configuration.md)

### Installation

**1.** If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

**2.** Install composer-asset-plugin needed for yii assets management
```bash
composer global require "fxp/composer-asset-plugin"
```
**3.** Download sources or Clone Repository
```
https://github.com/desaikalpesh34/yii2-kit/archive/master.zip
OR
git clone https://github.com/desaikalpesh34/yii2-kit.git
```

**4.** Install composer dependencies
```
composer install
```

**5.** Setup application

   - Copy `.env.dist` to `.env` in the project root.
   - Adjust settings in `.env` file
	- Set debug mode and your current environment
	```
	YII_DEBUG   = true
	YII_ENV     = dev
	```
	- Set DB configuration
	```
	LOCAL_DB_DSN           = mysql:host=127.0.0.1;port=3306;dbname=yii2-starter-kit
	LOCAL_DB_USERNAME      = user
	LOCAL_DB_PASSWORD      = password
	```

	- Set application canonical urls
	```
	LOCAL_FRONTEND_URL    = http://yii2-starter-kit.dev
	LOCAL_BACKEND_URL     = http://yii2-starter-kit.dev/admin
	```
**6.** Run in command line

```
php console/yii app/setup
```
**7.** Here you go you can test url on browser like

```
http://yii2-starter-kit.dev
http://yii2-starter-kit.dev/admin

```

### Donations

pay with [paypal](https://www.paypal.me/KalpeshDesai)


### have-any-questions

reach @desaikalpesh34@gmail.com

Good luck & Happy codding!!