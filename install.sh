#!/bin/bash

$THEME_FOLDER=/var/www/html/weblcc/themes/birthofcool

rm -rf $THEME_FOLDER
cp -r stylesheets $THEME_FOLDER
chmod -R go+rx $THEME_FOLDER
