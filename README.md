## Api SOAP demo by Hemerson
This is a simple proof of concept about how consume and process a SOAP web service in PHP with laravel

## System requirements
- Docker Desktop

## Installation

Clone the repo locally:

```sh
git clone https://github.com/hemersonvarela/api_quote_demo.git
cd api_quote_demo/
```

Install PHP dependencies (composer install)
```sh
docker run --rm --interactive --tty --volume $PWD:/app composer:2.3 install
```

Setup app configuration
```sh
cp .env.example .env
```

Set a bash alias for sail
```sh
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
```

Start sail services
```sh
sail up -d
```

Generate application key
```sh
sail artisan key:generate
```

Run database migrations
```sh
sail artisan migrate
```

Run database seeders
```sh
sail artisan db:seed
```

Install NPM dependencies
```sh
sail npm install
```

Build assets:

```sh
sail npm run dev
```

Open URL in your browser
```sh
http://laravel.test.localhost/
```
