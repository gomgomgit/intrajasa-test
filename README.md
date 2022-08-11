# How to Deploy with nginx

## 1. Instal dan Konfigurasi PHP 7. 4
```
sudo apt install libapache2-mod-php php php-common php-xml php-gd php-opcache php-mbstring php-tokenizer php-json php-bcmath php-zip unzip
cd /etc/php/7.4/
vim apache2/php.ini
```

## 2. Buat Database
```
sudo mysql -u root -p
CREATE DATABASE intrajasa_test DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
CREATE USER 'admin_test'@'localhost' IDENTIFIED BY 'strong_password';
GRANT ALL ON admin_test.* TO 'intrajasa_test'@'localhost' IDENTIFIED BY 'strong_password';
FLUSH PRIVILEGES;
exit
```

## 3. Setup Laravel App
clone project
```
cd /var/www 
sudo mkdir test-project
sudo chown user:www-data test-project
cd test-project

git clone https://github.com/gomgomgit/intrajasa-test.git
```

buat dan set env file
'sesuaikan dengan database yang telah dibuat'
```
touch mkdir .env 
```

install dan migrate database
```
composer install

php artisan migrate 
php artisan db:seed
```

## 4. Setting VirtualHost
```
sudo nano /etc/nginx/site-available/test-project
```

configurasi :
```
server {
    listen 80 default_server;
    listen [::]:80 default_server;

    server_name server_domain_or_IP;    
    root /var/www/test-project/public_html;

    add_header X-XSS-Protection "1; mode=block" always;
    add_header X-Content-Type-Options nosniff always;
    add_header X-Frame-Options "DENY" always;
    add_header Referrer-Policy no-referrer-when-downgrade always;    

    index index.html index.htm index.php;    
    more_set_headers "Server: My Server";  // Optional
    server_tokens off;
    charset utf-8;    location = /favicon.ico 

    { 
        access_log off; log_not_found off; 
    }    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

symlinks ke site-enabled :
```
sudo ln -s /etc/nginx/sites-available/test-project /etc/nginx/sites-enabled/
```

restart nginx :
```
sudo systemctl reload nginx
```