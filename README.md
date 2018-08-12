votering
========

A Symfony project.

Update DB
```
php bin/console doctrine:schema:update --force
```

Create admin user
```
php bin/console fos:user:create
php bin/console fos:user:promote
```

