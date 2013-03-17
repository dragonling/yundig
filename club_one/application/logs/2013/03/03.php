<?php defined('SYSPATH') or die('No direct script access.'); ?>

2013-03-03 00:24:03 --- ERROR: Database_Exception [ 2 ]: mysql_connect() [function.mysql-connect]: Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\kohana\database\mysql.php [ 67 ]
2013-03-03 00:24:03 --- STRACE: Database_Exception [ 2 ]: mysql_connect() [function.mysql-connect]: Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\kohana\database\mysql.php [ 67 ]
--
#0 D:\htdocs\vps\club_one\modules\database\classes\kohana\database\mysql.php(171): Kohana_Database_MySQL->connect()
#1 D:\htdocs\vps\club_one\modules\database\classes\kohana\database\mysql.php(360): Kohana_Database_MySQL->query(1, 'SHOW FULL COLUM...', false)
#2 D:\htdocs\vps\club_one\modules\orm\classes\kohana\orm.php(1504): Kohana_Database_MySQL->list_columns('languages')
#3 D:\htdocs\vps\club_one\modules\orm\classes\kohana\orm.php(392): Kohana_ORM->list_columns(true)
#4 D:\htdocs\vps\club_one\modules\orm\classes\kohana\orm.php(337): Kohana_ORM->reload_columns()
#5 D:\htdocs\vps\club_one\modules\orm\classes\kohana\orm.php(246): Kohana_ORM->_initialize()
#6 D:\htdocs\vps\club_one\modules\orm\classes\kohana\orm.php(37): Kohana_ORM->__construct(0)
#7 D:\htdocs\vps\club_one\modules\www\classes\web.php(24): Kohana_ORM::factory('language', 0)
#8 D:\htdocs\vps\club_one\modules\www\classes\web.php(19): Web->set_config()
#9 D:\htdocs\vps\club_one\modules\www\classes\controller\main.php(9): Web->before()
#10 [internal function]: Controller_Main->before()
#11 D:\htdocs\vps\club_one\system\classes\kohana\request\client\internal.php(103): ReflectionMethod->invoke(Object(Controller_Main))
#12 D:\htdocs\vps\club_one\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#13 D:\htdocs\vps\club_one\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#14 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#15 {main}
2013-03-03 00:24:04 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-03 00:24:04 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-03 00:24:16 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-03 00:24:16 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-03 00:24:44 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-03 00:24:44 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-03 00:24:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-03 00:24:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-03 00:24:48 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-03 00:24:48 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-03 00:24:49 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-03 00:24:49 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-03 00:24:56 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-03 00:24:56 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-03 00:25:08 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-03 00:25:08 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-03 00:25:31 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-03 00:25:31 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-03 00:25:34 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-03 00:25:34 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-03 00:27:07 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-03 00:27:07 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}