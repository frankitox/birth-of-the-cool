# How to code.
This project was set up using
[this](http://thesassway.com/beginner/getting-started-with-sass-and-compass)
article. Basically you should do `gem
install compass`. Then you'll be able to
execute the `compass watch` command over this
directory to start checking changes in the
`sass` folder.

## Test in development.
To test changes in your
development version you should execute
`./install` with the proper modifications to
the `THEME_FOLDER` env variable in the
script.

## Test in production.
To install at Kleene:

  scp -r ~/birthofcool/stylesheets kleene:~
  ssh kleene
  chown -R fbiasin:www-data stylesheets
  find stylesheets/ -type d -exec chmod 770 {} \;
  find stylesheets/ -type f -exec chmod 660 {} \;
  rm -rf /var/www/weblcc/sites/all/themes/birthofcool
  mv stylesheets /var/www/weblcc/sites/all/themes/birthofcool
  echo "Also make sure you clean the cache"

# Algunos detalles de implementación.

## Página principal.
  Usa un bloque para mostrar las tres
primeras noticias. Luego una view de
tres noticias con un offset de tres.
Para la view usa un template custom en
templates/views-view-unformatted--noticias-lcc.tpl.php

## Implementación del LogIn.
  Básicamente hay un menú llamado login con
un sólo link a la dirección `user`.

## Artículos inspiración.
Good image showing where each template goes:
https://www.drupal.org/node/171194
About how to restructure the user login block:
https://www.drupal.org/node/1167712
About styling a menu.
https://api.drupal.org/api/drupal/includes%21menu.inc/function/theme_menu_tree/7
https://www.drupal.org/node/988694
https://gist.github.com/gagarine/3201854
About styling views.
https://www.ostraining.com/blog/drupal/views-templates/

# Backup y restauración.

## BackUp del sitio:
  Se hace un backup semanal de kleene usando
el crontab del user fbiasin, copiando los
contenidos al home de fbiasin en labdcc.
  El backup se hace cada domingo a la noche,
(@weekly) en /etc/crontab.

## Restaurar sitio desde un BackUp:
**Nota**: Ésto es para development, pero
seguro con algunos cambios funciona en
producción.

  sudo rm -rf /var/www/html/weblcc
  sudo cp -r site /var/www/html/weblcc
  sudo find /var/www/html/weblcc -type f -exec chmod go+r {} \;
  sudo find /var/www/html/weblcc -type d -exec chmod go+rx {} \;
  # En el archivo:
  # /var/www/html/weblcc/sites/default/settings.php:215
  # Cambiar para usar tu propia DB.
  echo "DROP DATABASE drupalweblcc; CREATE DATABASE drupalweblcc" | mysql -u root
  mysql -u root drupalweblcc < database.sql
  # En éste punto se debería poder acceder a
  # la página principal, pero habría
  # problemas para loguearse, por las clean
  # URLs.
  # Primero acceder a ?q=user, donde
  # loguearse con el usuario de
  # administrador. Luego acceder a
  # ?q=admin/config/search/clean-urls
  # Ahi sacar el check a las clear URLs.
  # Fuente: https://www.drupal.org/node/5590
