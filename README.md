# Skeleton of MPWARFWK PHP Framework #

## Getting Started ##

### Installation ###

In order to install the MPWARFWK-SKELETON you must clone this repository in a shared folder with your virtualmachine, for example ```shared/www```

So, from virtualmachine commandline change your current directory to ```/www``` and here execute the following commandline:

```zsh
$ git clone https://github.com/xserrat/mpwarfwk-skeleton.git framework

```

Then, you must create two VirtualHosts, one for Development environment and another one to Production environment:

* Development Environment:

```zsh

<VirtualHost *:80>
        DocumentRoot /www/framework/public
        ServerName framework.dev
        ServerAlias *.framework.dev

        RewriteEngine On
        #Allowed media extensions (includes .txt files for robots or .html, e.g: Google hosted HTMLs):
        RewriteCond %{REQUEST_FILENAME} !^(.+)\.(js|css|gif|png|jpg|swf|ico|txt|html)$
        RewriteRule ^/(.+) /index_dev.php [QSA,L]
</VirtualHost>

```

* Production Environment:

```zsh

<VirtualHost *:80>
        DocumentRoot /www/framework/public
        ServerName framework.prod
        ServerAlias *.framework.prod
          
        RewriteEngine On
        #Allowed media extensions (includes .txt files for robots or .html, e.g: Google hosted HTMLs):
        RewriteCond %{REQUEST_FILENAME} !^(.+)\.(js|css|gif|png|jpg|swf|ico|txt|html)$
        RewriteRule ^/(.+) /index.php [QSA,L]
</VirtualHost>

```

In order to load all dependencies about MPWARFWK framework, you must execute from virtualmachine ssh, the following commands:

```zsh

$ cd /www/framework
$ composer update

```
### Database Configuration - dbconfig.yaml ###

In order to add your configuration about your database, you can use the file
```config/dbconfig.yaml.example``` as an example. The correct filename is ```config/dbconfig.yaml```

### Run Demo Example ###

In order to run the current demo and show some functionalities of this framework, you can write in your browser:

```http://www.framework.dev``` or ```http://www.framework.prod``` 

And then, click on demo link to start with demo example.

Registered Emails and Passwords:

* Email: demo@mpwarfwk.com Password: demo
* Email: admin@mpwarfwk.com Password: admin
* Email: root@mpwarfwk.com Password: root 