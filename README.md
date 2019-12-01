# FAQ

This project I've made to learn a few about Laravel Framework. It consists of an application to make questions and answers like an FAQ.

## Install

Currently, this project runs only in localhost. To configure in your computer follow the steps below.

a) Up the Docker containers
```bash 
$ make build && make up
```

b) Verify the containers
```bash
$ docker ps

CONTAINER ID        IMAGE            ...       NAMES
c3c8f2b79414        mysql:5.7        ...       mysql
9fbc21228417        faq_php          ...       php
58261143feff        faq_nginx        ...       nginx
```
c) Install dependencies
```bash
$ docker-compose exec php /bin/bash
root@docker_php:/app$ composer install
```

d) Configure `.env` file

```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=faq
DB_USERNAME=root
DB_PASSWORD=root
``` 

e) Run migrations
```bash
$ docker-compose php php artisan migration
```

f) You can populate the database with Seeders
```bash
$ docker-compose php php artisan db:seed
```

If you ran the Seeders, there is a user to test.

**E-mail**: demo@test.com \
**Password**: 123456



# The MIT License

MIT License

Copyright (c) 2019 Fernando Mariano

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.