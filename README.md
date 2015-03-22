# Skeleton of MPWARFWK PHP Framework #

## Getting Started ##

### Installation ###

In order to install the MPWARFWK-SKELETON you must clone this repository in a shared folder with your virtualmachine, for example ```shared/www```

So, from virtualmachine commandline execute the following commands:

```$ cd /www```
```/www/ $ git clone https://github.com/xserrat/mpwarfwk-skeleton.git framework```

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

~/ $ cd /www/framework
/www/framework $ composer update

```
