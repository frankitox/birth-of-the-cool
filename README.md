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

Página principal:
  Usa un bloque para mostrar las tres
primeras noticias. Luego una view de
tres noticias con un offset de tres.
Para la view usa un template custom en
templates/views-view-unformatted--noticias-lcc.tpl.php

Implementación del LogIn:
  Básicamente hay un menú llamado login con
un sólo link a la dirección `user`.

BackUp del sitio:
  Se hace un backup semanal de kleene usando
el crontab del user fbiasin, copiando los
contenidos al home de fbiasin en labdcc.
  El backup se hace cada domingo a las 6:47,
se puede chequear que haya cambiado en
/etc/crontab.

Restaurar sitio desde un BackUp:

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
