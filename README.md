# Yii 2 Kit

This is Yii2 start application template.

## TABLE OF CONTENTS
- [Demo](#demo)
- [Features](#https://github.com/trntv/yii2-starter-kit#features)
- [Api](#API)
- [RBAC](#RBAC)
- Command Bus(#Command Bus)
- [Installation](docs/installation.md)
    - [Manual installation](docs/installation.md#manual-installation)
    - [Docker installation](docs/installation.md#docker-installation)
    - [Vagrant installation](docs/installation.md#vagrant-installation)
- [Application components](#application-components)
- [Console commands](docs/console.md)
- [Testing](docs/testing.md)
- [FAQ](docs/faq.md)
- [How to contribute?](#how-to-contribute)
- [Donations](#donations)
- [Have any questions](#have-any-questions)

##DEMO
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
##API
Frontend:
http://kalpeshdesai.in/yii/kit/api/web/v1
Ready-to-go RESTful API App pre configrable

here is demo api for user listing
http://kalpeshdesai.in/yii/kit/api/web/v1/user

##RBAC
pre configured yii-admin module for rbac manager.
All the controller and action is managed from backend.
here you can manage role and permission.
http://kalpeshdesai.in/yii/kit/backend/web/admin
for more detail visit (https://github.com/mdmsoft/yii2-admin/blob/master/docs/guide/configuration.md)

### Command Bus
- [What is command bus?](http://shawnmc.cool/command-bus)

In Starter Kit Command Bus pattern is implemented with [tactician](https://github.com/thephpleague/tactician) package and 
it's yii2 connector - [yii2-tactician](https://github.com/trntv/yii2-tactician)

Command are stored in ``common/commands/command`` directory, handlers in ``common/commands/handler``

To execute command run
```php
$sendEmailCommand = new SendEmailCommand(['to' => 'user@example.org', 'body' => 'Hello User!']);
Yii::$app->commandBus->handle($sendEmailCommand);
```
Good luck & Happy codding!!