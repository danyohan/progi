### System Requirements

1. Docker
2. Node js

### Installation Steps

- Clone this repository
- Go to cloned repository folder
- Run npm install
- Run composer install
- Rename .env.example file to .env
- Run ./vendor/bin/sail up command from powershell terminal
- Run ./vendor/bin/sail artisan migrate:fresh --seed or php artisan migrate:fresh --seed
- Open app in local: `http://localhost`

### Tech Stack

- Laravel 10
- PHP 8
- MySQL
- NPM
- Vue js
- Tailwind CSS