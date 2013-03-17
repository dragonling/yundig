<?php defined('SYSPATH') or die('No direct script access.'); ?>

2013-03-16 00:07:57 --- ERROR: ErrorException [ 8 ]: Undefined property: stdClass::$catalog_id ~ MODPATH\admin\views\treeview.php [ 91 ]
2013-03-16 00:07:57 --- STRACE: ErrorException [ 8 ]: Undefined property: stdClass::$catalog_id ~ MODPATH\admin\views\treeview.php [ 91 ]
--
#0 D:\htdocs\vps\club_one\modules\admin\views\treeview.php(91): Kohana_Core::error_handler(8, 'Undefined prope...', 'D:\htdocs\vps\c...', 91, Array)
#1 D:\htdocs\vps\club_one\system\classes\kohana\view.php(61): include('D:\htdocs\vps\c...')
#2 D:\htdocs\vps\club_one\system\classes\kohana\view.php(343): Kohana_View::capture('D:\htdocs\vps\c...', Array)
#3 D:\htdocs\vps\club_one\modules\admin\classes\controller\admin.php(490): Kohana_View->render()
#4 [internal function]: Controller_Admin->after()
#5 D:\htdocs\vps\club_one\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_System_Rights))
#6 D:\htdocs\vps\club_one\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#7 D:\htdocs\vps\club_one\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#8 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#9 {main}
2013-03-16 00:11:47 --- ERROR: ErrorException [ 8 ]: Undefined index: 0 ~ MODPATH\admin\classes\controller\system\rights.php [ 64 ]
2013-03-16 00:11:47 --- STRACE: ErrorException [ 8 ]: Undefined index: 0 ~ MODPATH\admin\classes\controller\system\rights.php [ 64 ]
--
#0 D:\htdocs\vps\club_one\modules\admin\classes\controller\system\rights.php(64): Kohana_Core::error_handler(8, 'Undefined index...', 'D:\htdocs\vps\c...', 64, Array)
#1 [internal function]: Controller_System_Rights->action_list()
#2 D:\htdocs\vps\club_one\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_System_Rights))
#3 D:\htdocs\vps\club_one\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 D:\htdocs\vps\club_one\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#5 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#6 {main}
2013-03-16 00:14:20 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-16 00:14:20 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-16 00:16:32 --- ERROR: Database_Exception [ 1054 ]: Unknown column '1' in 'where clause' [ SELECT `ko_catalog`.* FROM `ko_catalog` AS `ko_catalog` WHERE `status` = 1 AND `1` = '25' ORDER BY `sort_order` ASC ] ~ MODPATH\database\classes\kohana\database\mysql.php [ 194 ]
2013-03-16 00:16:32 --- STRACE: Database_Exception [ 1054 ]: Unknown column '1' in 'where clause' [ SELECT `ko_catalog`.* FROM `ko_catalog` AS `ko_catalog` WHERE `status` = 1 AND `1` = '25' ORDER BY `sort_order` ASC ] ~ MODPATH\database\classes\kohana\database\mysql.php [ 194 ]
--
#0 D:\htdocs\vps\club_one\modules\database\classes\kohana\database\query.php(245): Kohana_Database_MySQL->query(1, 'SELECT `ko_cata...', 'Model_Catalog', Array)
#1 D:\htdocs\vps\club_one\modules\orm\classes\kohana\orm.php(963): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 D:\htdocs\vps\club_one\modules\orm\classes\kohana\orm.php(922): Kohana_ORM->_load_result(true)
#3 D:\htdocs\vps\club_one\modules\admin\classes\common\menu.php(32): Kohana_ORM->find_all()
#4 D:\htdocs\vps\club_one\modules\admin\classes\controller\menu\main.php(20): Common_Menu->sub('25', 1)
#5 [internal function]: Controller_Menu_Main->action_sub()
#6 D:\htdocs\vps\club_one\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_Menu_Main))
#7 D:\htdocs\vps\club_one\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 D:\htdocs\vps\club_one\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#9 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#10 {main}
2013-03-16 00:16:33 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-16 00:16:33 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-16 00:17:31 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-16 00:17:31 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-16 00:17:46 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-16 00:17:46 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-16 00:17:52 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-16 00:17:52 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-16 00:18:14 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-16 00:18:14 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-16 00:18:35 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-16 00:18:35 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-16 00:19:22 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-16 00:19:22 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-16 00:19:37 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-16 00:19:37 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-16 00:25:37 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-16 00:25:37 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-16 00:30:51 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected ',' ~ MODPATH\admin\classes\controller\menu\main.php [ 106 ]
2013-03-16 00:30:51 --- STRACE: ErrorException [ 4 ]: syntax error, unexpected ',' ~ MODPATH\admin\classes\controller\menu\main.php [ 106 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2013-03-16 00:32:53 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-16 00:32:53 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-16 00:33:26 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-16 00:33:26 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-16 00:34:11 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-16 00:34:11 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-16 00:34:17 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-16 00:34:17 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-16 00:34:46 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-16 00:34:46 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-16 00:35:00 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-16 00:35:00 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-16 00:35:09 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-16 00:35:09 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-16 00:35:20 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-16 00:35:20 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-16 00:40:58 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-16 00:40:58 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-16 16:53:43 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-16 16:53:43 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-16 16:55:15 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-16 16:55:15 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-16 16:55:19 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-16 16:55:19 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-16 16:55:26 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-16 16:55:26 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-16 16:55:38 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-16 16:55:38 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-16 17:18:31 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-16 17:18:31 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}