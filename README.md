# Spa-app

Spa-app is a comment exchange application that allows users to:

- Post their own comments
- Reply to other users' comments
- Attach photos to their comments
- Sort comments

## Installation

To install the application, follow these steps:

### Clone the repository locally
git clone [https://github.com/maksanikienko/spa-app.git](https://github.com/maksanikienko/spa-app.git)

cd spa-app

cp .env.example .env

chmod 775 .env

chmod -R 777 storage 

chmod -R 777 public

### Run the container using Sail
composer install

./vendor/bin/sail up -d

./vendor/bin/sail artisan key:generate

./vendor/bin/sail artisan storage:link

### Load dummy data
sail artisan db:seed --class=CommentsTableSeeder

### Open

localhost:80

