#!/bin/bash

rm -rf /var/www/html/weblcc/themes/birthofcool/
cp -r stylesheets /var/www/html/weblcc/themes/birthofcool
chmod -R go+rx /var/www/html/weblcc/themes/birthofcool

# To install at Kleene:
# scp -r ~/birthofcool/stylesheets kleene:~
# ssh kleene
# chown -R fbiasin:www-data stylesheets
# find stylesheets/ -type d -exec chmod 770 {} \;
# find stylesheets/ -type f -exec chmod 660 {} \;
# rm -rf /var/www/weblcc/sites/all/themes/birthofcool
# mv stylesheets /var/www/weblcc/sites/all/themes/birthofcool
# echo "Also make sure you cleaned cache"
