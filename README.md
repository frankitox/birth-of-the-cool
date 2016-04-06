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

Implementación del LogIn:
  Para loguearse el usuario debe hacerlo
usando HTTPS, para ello se emplea el puerto
444. Hay un menú 'login menu' que posee un
solo elemento llamado 'login' el cual es un
enlace hardcodeado a la dirección de login
en puerto 444.

BackUp del sitio:
  Se hace un backup semanal de kleene usando
el crontab del user fbiasin, copiando los
contenidos al home de fbiasin en labdcc.
  El backup se hace cada domingo a las 6:47,
se puede chequear que haya cambiado en
/etc/crontab.
