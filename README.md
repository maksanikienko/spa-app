# Spa-app

Spa-app is a comment exchange application that allows users to:

- Post their own comments
- Reply to other users' comments
- Attach photos to their comments
- Sort comments

## Installation

To install the application, follow these steps:

Clone the repository locally

[https://github.com/maksanikienko/spa-app.git](https://github.com/maksanikienko/spa-app.git)

Run the container using Sail

./vendor/bin/sail up -d

Perform database migration

sail artisan migrate

Load dummy data

sail artisan db:seed --class=CommentsTableSeeder

Open

localhost:80

