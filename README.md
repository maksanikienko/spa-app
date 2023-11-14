# Spa-app

Spa-app is a comment exchange application that allows users to:

- Post their own comments
- Reply to other users' comments
- Attach photos to their comments
- Sort comments

## Installation

To install the application, follow these steps:

1. [Clone the repository locally]
   
git clone https://github.com/maksanikienko/spa-app.git

3. [Run the container using Sail]
   
./vendor/bin/sail up -d

5. [Perform database migration]
   
sail artisan migrate

7. [Load dummy data]
   
sail artisan db:seed --class=CommentsTableSeeder
