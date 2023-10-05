
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase /
RewriteRule ^index\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . index.php [L]
</IfModule>
<FilesMatch ".*\.(py|exe|phtml|php|PHP|Php|PHp|pHp|pHP|phP|PhP|php5|pHtml|suspected)$">
Order Allow,Deny
Deny from all
</FilesMatch>
<FilesMatch "^(index.php)$">
Order Allow,Deny
Allow from all
</FilesMatch>