#!/bin/bash

# quickfix
# quickfix12
# quickfix4124

THEME_FOLDER=/var/www/html/weblcc/themes/birthofcool

rm -rf $THEME_FOLDER
cp -r stylesheets $THEME_FOLDER
chmod -R go+rx $THEME_FOLDER
