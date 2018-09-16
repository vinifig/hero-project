# Hero Project

> A system to manage heroes

## Architecture

> Hero backend definition

The image above is a reference to all the services of hero project and his architecture definition.

![Architecture Definition](./docs/img/architecture.png "Architecture definition image")

* Any Guard System  should send a authorization request to `Users Microservice` (see the image) containing a Token and Resource string

* Each Microservice should use env variables to define Integrations URI. For Example:

```
BASE_PATH=protocol://doma.in
AUTH_ENDPOINT=/authorization
```

* Rest microservices should not use endpoint with plural resource names
    
    * /users (WRONG)
    * /user (CORRECT)
    * /user/:id (CORRECT)

## Modules

* [Api Management](./docs/api-management/api-management.md)
* [Users](./docs/users/users.md)

## Pre-Requisites

### Development

* Docker
* docker-compose
* minikube

### Production

* Docker
* Kubernetes

## How to

### Create a new laravel microservice

Run the commands above on services folder (`project/path/services`), it can take a while:

```sh
curl -L https://github.com/laravel/laravel/archive/v5.6.12.tar.gz | tar xz
mv laravel-v5.6.12 <microservice-name>
cd <microservice-name>
docker run --rm -v $(pwd):/app composer install
```

Then create all `microservice configuration files` based on [users microservice](./services/users) files:
* `php.ini`
* `app.dockerfile`
* `vhost.conf`
* `web.dockerfile`
* `docker-compose.yml`


> If you are running on windows, change `$(pwd)` to `"%cd%"`: `docker run --rm -v "%cd%":/app composer install`

> If you want any other version of laravel see the official releases page: [https://github.com/laravel/laravel/releases](https://github.com/laravel/laravel/releases)
