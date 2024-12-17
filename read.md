docker build -t my-php-app .


docker run -d -p 9001:80 --name php-container my-php-app
