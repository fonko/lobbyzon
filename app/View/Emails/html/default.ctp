<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Emails.html
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<?php
$content = explode("\n", $content);
echo "Gracias por inscribirte en lobbyzona, para confirmar tu cuenta haz clic <a href=http://www.lobbyzona.com/users/confirm/$hash>aqui</a><br>Recuerde que para loguear debe usar su mail como user name y su password";

foreach ($content as $line):
	echo '<p> ' . $line . "</p>\n";
endforeach;
?>