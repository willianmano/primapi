VIRTUAL HOST CONF

<VirtualHost *:80>
    ServerName rmmapi.dev
    DocumentRoot /var/www/html/rmmapi/public
    <Directory /var/www/html/rmmapi/public>
            DirectoryIndex index.php
            AllowOverride All
            Order allow,deny
            Allow from all

            RewriteEngine On
            # Redirect all requests not pointing at an actual file to index.php
            RewriteCond %{REQUEST_FILENAME} !-f
            RewriteRule . index.php [L] 
    </Directory>
</VirtualHost>