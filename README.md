Votering
========

A Symfony project.

Clone
```
git clone https://github.com/SunDrop/votering.git
```

Init
```
composer update
```

Update DB
```
php bin/console doctrine:database:create
php bin/console doctrine:schema:update --force
```

Create admin user
```
php bin/console fos:user:create
> Please choose a username:admin
  Please choose an email:admin@admin.com
  Please choose a password:
  Created user admin

php bin/console fos:user:promote
> Please choose a username:admin
  Please choose a role:ROLE_ADMIN
  Role "ROLE_ADMIN" has been added to user "admin".

```

Start server
```
php bin/console server:run
```