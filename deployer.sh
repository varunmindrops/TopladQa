set -e

echo "Deployig application"

#exit maintenance mode
(php artisan down --message 'the app is being deploying')
   #update codebase
git pull origin master
#exit maintenance mode
php artisan up 

echo "Appliaction deployed"