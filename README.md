# news
# installation instructions

Firstly download xampp and install;
Then git clone project to C:\xampp\htdocs; 
After cloning project do this steps:

1) composer install 
2) php artisan migrate
3) php artisan db:seed
4) C:\Windows\System32\drivers\etc\hosts
and add a new line like: 
127.0.0.1 news.local

Then go to where xampp is installed under 
xampp\apache\conf\extra\httpd-vhosts.conf
Then add a virtual host in the bottom of the file like: 

<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/news/public"
    ServerName news.local
</VirtualHost>

Api routes:
http://news.local/api/v2/news
http://news.local/api/v2/news/2

-----------------------------------
Admin:
login => Admin
password => 123456

Users:
login => User 1
password => 123456

login => User 2
password => 123456

login => User 3
password => 123456