## package-php-react-ami

A clearvox PHP lib with asterisk AMI

### How to update

1. make (code) changes

2. regenerate composer.lock file

```
# https://getcomposer.org/doc/00-intro.md#docker-image
docker pull composer/composer
docker run --rm -it -v "$(pwd):/src" composer/composer install
```