Replacement mysite folder for ChristopherBolt.Com sites

Install silverstripe (update to version required):
composer create-project silverstripe/installer . 3.3.1

Then install all my required dependancies, themes etc:
composer require christopherbolt/silverstripe-bolt-mysite

Run post install:
cat mysite/install/htaccess.txt >> .htaccess && rm install.php