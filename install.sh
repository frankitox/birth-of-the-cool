#!/bin/bash

rm -rf /var/www/html/weblcc/themes/birthofcool/
cp -r stylesheets /var/www/html/weblcc/themes/birthofcool
chmod -R go+rx /var/www/html/weblcc/themes/birthofcool
