<?php defined('SYSPATH') or die('No direct script access.'); ?>

2013-03-15 00:41:25 --- ERROR: ErrorException [ 1 ]: Using $this when not in object context ~ MODPATH\admin\views\system\rights_add.php [ 35 ]
2013-03-15 00:41:25 --- STRACE: ErrorException [ 1 ]: Using $this when not in object context ~ MODPATH\admin\views\system\rights_add.php [ 35 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2013-03-15 22:40:19 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-15 22:40:19 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-15 22:40:29 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-15 22:40:29 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-15 22:40:35 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-15 22:40:35 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-15 22:40:40 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-15 22:40:40 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-15 22:40:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-15 22:40:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-15 22:40:53 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-15 22:40:53 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-15 22:41:10 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-15 22:41:10 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-15 22:43:49 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-15 22:43:49 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-15 22:51:36 --- ERROR: Session_Exception [ 1 ]: Error reading session data. ~ SYSPATH\classes\kohana\session.php [ 326 ]
2013-03-15 22:51:36 --- STRACE: Session_Exception [ 1 ]: Error reading session data. ~ SYSPATH\classes\kohana\session.php [ 326 ]
--
#0 D:\htdocs\vps\club_one\system\classes\kohana\session.php(125): Kohana_Session->read(NULL)
#1 D:\htdocs\vps\club_one\system\classes\kohana\session.php(54): Kohana_Session->__construct(NULL, NULL)
#2 D:\htdocs\vps\club_one\modules\auth\classes\kohana\auth.php(57): Kohana_Session::instance('native')
#3 D:\htdocs\vps\club_one\modules\auth\classes\kohana\auth.php(37): Kohana_Auth->__construct(Object(Config_Group))
#4 D:\htdocs\vps\club_one\modules\admin\classes\controller\admin.php(46): Kohana_Auth::instance()
#5 D:\htdocs\vps\club_one\modules\admin\classes\controller\system\rights.php(17): Controller_Admin->before()
#6 [internal function]: Controller_System_Rights->before()
#7 D:\htdocs\vps\club_one\system\classes\kohana\request\client\internal.php(103): ReflectionMethod->invoke(Object(Controller_System_Rights))
#8 D:\htdocs\vps\club_one\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 D:\htdocs\vps\club_one\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#10 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#11 {main}
2013-03-15 22:51:41 --- ERROR: ErrorException [ 8 ]: Undefined variable: catalog_options ~ MODPATH\admin\views\system\rights_add.php [ 35 ]
2013-03-15 22:51:41 --- STRACE: ErrorException [ 8 ]: Undefined variable: catalog_options ~ MODPATH\admin\views\system\rights_add.php [ 35 ]
--
#0 D:\htdocs\vps\club_one\modules\admin\views\system\rights_add.php(35): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\htdocs\vps\c...', 35, Array)
#1 D:\htdocs\vps\club_one\system\classes\kohana\view.php(61): include('D:\htdocs\vps\c...')
#2 D:\htdocs\vps\club_one\system\classes\kohana\view.php(343): Kohana_View::capture('D:\htdocs\vps\c...', Array)
#3 D:\htdocs\vps\club_one\modules\admin\classes\controller\admin.php(490): Kohana_View->render()
#4 [internal function]: Controller_Admin->after()
#5 D:\htdocs\vps\club_one\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_System_Rights))
#6 D:\htdocs\vps\club_one\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#7 D:\htdocs\vps\club_one\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#8 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#9 {main}
2013-03-15 22:51:45 --- ERROR: ErrorException [ 8 ]: Undefined variable: catalog_options ~ MODPATH\admin\views\system\rights_add.php [ 35 ]
2013-03-15 22:51:45 --- STRACE: ErrorException [ 8 ]: Undefined variable: catalog_options ~ MODPATH\admin\views\system\rights_add.php [ 35 ]
--
#0 D:\htdocs\vps\club_one\modules\admin\views\system\rights_add.php(35): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\htdocs\vps\c...', 35, Array)
#1 D:\htdocs\vps\club_one\system\classes\kohana\view.php(61): include('D:\htdocs\vps\c...')
#2 D:\htdocs\vps\club_one\system\classes\kohana\view.php(343): Kohana_View::capture('D:\htdocs\vps\c...', Array)
#3 D:\htdocs\vps\club_one\modules\admin\classes\controller\admin.php(490): Kohana_View->render()
#4 [internal function]: Controller_Admin->after()
#5 D:\htdocs\vps\club_one\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_System_Rights))
#6 D:\htdocs\vps\club_one\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#7 D:\htdocs\vps\club_one\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#8 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#9 {main}
2013-03-15 22:51:47 --- ERROR: ErrorException [ 1 ]: Controller_User::action_info() [controller-user.action-info]: The script tried to execute a method or access a property of an incomplete object. Please ensure that the class definition &quot;Model_User&quot; of the object you are trying to operate on was loaded _before_ unserialize() gets called or provide a __autoload() function to load the class definition  ~ MODPATH\www\classes\controller\user.php [ 17 ]
2013-03-15 22:51:47 --- STRACE: ErrorException [ 1 ]: Controller_User::action_info() [controller-user.action-info]: The script tried to execute a method or access a property of an incomplete object. Please ensure that the class definition &quot;Model_User&quot; of the object you are trying to operate on was loaded _before_ unserialize() gets called or provide a __autoload() function to load the class definition  ~ MODPATH\www\classes\controller\user.php [ 17 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2013-03-15 22:51:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-15 22:51:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-15 22:51:55 --- ERROR: ErrorException [ 1 ]: Controller_User::action_info() [controller-user.action-info]: The script tried to execute a method or access a property of an incomplete object. Please ensure that the class definition &quot;Model_User&quot; of the object you are trying to operate on was loaded _before_ unserialize() gets called or provide a __autoload() function to load the class definition  ~ MODPATH\www\classes\controller\user.php [ 17 ]
2013-03-15 22:51:55 --- STRACE: ErrorException [ 1 ]: Controller_User::action_info() [controller-user.action-info]: The script tried to execute a method or access a property of an incomplete object. Please ensure that the class definition &quot;Model_User&quot; of the object you are trying to operate on was loaded _before_ unserialize() gets called or provide a __autoload() function to load the class definition  ~ MODPATH\www\classes\controller\user.php [ 17 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2013-03-15 22:51:55 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-15 22:51:55 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-15 22:51:57 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-15 22:51:57 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-15 22:52:02 --- ERROR: ErrorException [ 1 ]: Class 'Model_User' not found ~ MODPATH\orm\classes\kohana\orm.php [ 37 ]
2013-03-15 22:52:02 --- STRACE: ErrorException [ 1 ]: Class 'Model_User' not found ~ MODPATH\orm\classes\kohana\orm.php [ 37 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2013-03-15 22:52:02 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-15 22:52:02 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-15 23:09:37 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-15 23:09:37 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-15 23:11:49 --- ERROR: Session_Exception [ 1 ]: Error reading session data. ~ SYSPATH\classes\kohana\session.php [ 326 ]
2013-03-15 23:11:49 --- STRACE: Session_Exception [ 1 ]: Error reading session data. ~ SYSPATH\classes\kohana\session.php [ 326 ]
--
#0 D:\htdocs\vps\club_one\system\classes\kohana\session.php(125): Kohana_Session->read(NULL)
#1 D:\htdocs\vps\club_one\system\classes\kohana\session.php(54): Kohana_Session->__construct(NULL, NULL)
#2 D:\htdocs\vps\club_one\modules\auth\classes\kohana\auth.php(57): Kohana_Session::instance('native')
#3 D:\htdocs\vps\club_one\modules\auth\classes\kohana\auth.php(37): Kohana_Auth->__construct(Object(Config_Group))
#4 D:\htdocs\vps\club_one\modules\admin\classes\controller\admin.php(46): Kohana_Auth::instance()
#5 D:\htdocs\vps\club_one\modules\admin\classes\controller\dashboard\main.php(15): Controller_Admin->before()
#6 [internal function]: Controller_Dashboard_Main->before()
#7 D:\htdocs\vps\club_one\system\classes\kohana\request\client\internal.php(103): ReflectionMethod->invoke(Object(Controller_Dashboard_Main))
#8 D:\htdocs\vps\club_one\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 D:\htdocs\vps\club_one\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#10 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#11 {main}
2013-03-15 23:11:49 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-15 23:11:49 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-15 23:11:52 --- ERROR: ErrorException [ 1 ]: Controller_User::action_info() [controller-user.action-info]: The script tried to execute a method or access a property of an incomplete object. Please ensure that the class definition &quot;Model_User&quot; of the object you are trying to operate on was loaded _before_ unserialize() gets called or provide a __autoload() function to load the class definition  ~ MODPATH\www\classes\controller\user.php [ 17 ]
2013-03-15 23:11:52 --- STRACE: ErrorException [ 1 ]: Controller_User::action_info() [controller-user.action-info]: The script tried to execute a method or access a property of an incomplete object. Please ensure that the class definition &quot;Model_User&quot; of the object you are trying to operate on was loaded _before_ unserialize() gets called or provide a __autoload() function to load the class definition  ~ MODPATH\www\classes\controller\user.php [ 17 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2013-03-15 23:11:52 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-15 23:11:52 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-15 23:11:59 --- ERROR: ErrorException [ 1 ]: Controller_User::action_info() [controller-user.action-info]: The script tried to execute a method or access a property of an incomplete object. Please ensure that the class definition &quot;Model_User&quot; of the object you are trying to operate on was loaded _before_ unserialize() gets called or provide a __autoload() function to load the class definition  ~ MODPATH\www\classes\controller\user.php [ 17 ]
2013-03-15 23:11:59 --- STRACE: ErrorException [ 1 ]: Controller_User::action_info() [controller-user.action-info]: The script tried to execute a method or access a property of an incomplete object. Please ensure that the class definition &quot;Model_User&quot; of the object you are trying to operate on was loaded _before_ unserialize() gets called or provide a __autoload() function to load the class definition  ~ MODPATH\www\classes\controller\user.php [ 17 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2013-03-15 23:11:59 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-15 23:11:59 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-15 23:12:22 --- ERROR: ErrorException [ 1 ]: Controller_User::action_info() [controller-user.action-info]: The script tried to execute a method or access a property of an incomplete object. Please ensure that the class definition &quot;Model_User&quot; of the object you are trying to operate on was loaded _before_ unserialize() gets called or provide a __autoload() function to load the class definition  ~ MODPATH\www\classes\controller\user.php [ 17 ]
2013-03-15 23:12:22 --- STRACE: ErrorException [ 1 ]: Controller_User::action_info() [controller-user.action-info]: The script tried to execute a method or access a property of an incomplete object. Please ensure that the class definition &quot;Model_User&quot; of the object you are trying to operate on was loaded _before_ unserialize() gets called or provide a __autoload() function to load the class definition  ~ MODPATH\www\classes\controller\user.php [ 17 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2013-03-15 23:12:22 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-15 23:12:22 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-15 23:12:43 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-15 23:12:43 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-15 23:12:46 --- ERROR: ErrorException [ 1 ]: Class 'Model_User' not found ~ MODPATH\orm\classes\kohana\orm.php [ 37 ]
2013-03-15 23:12:46 --- STRACE: ErrorException [ 1 ]: Class 'Model_User' not found ~ MODPATH\orm\classes\kohana\orm.php [ 37 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2013-03-15 23:12:46 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-15 23:12:46 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-15 23:12:54 --- ERROR: ErrorException [ 1 ]: Class 'Model_User' not found ~ MODPATH\orm\classes\kohana\orm.php [ 37 ]
2013-03-15 23:12:54 --- STRACE: ErrorException [ 1 ]: Class 'Model_User' not found ~ MODPATH\orm\classes\kohana\orm.php [ 37 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2013-03-15 23:12:54 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-15 23:12:54 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-15 23:13:01 --- ERROR: ErrorException [ 1 ]: Class 'Model_User' not found ~ MODPATH\orm\classes\kohana\orm.php [ 37 ]
2013-03-15 23:13:01 --- STRACE: ErrorException [ 1 ]: Class 'Model_User' not found ~ MODPATH\orm\classes\kohana\orm.php [ 37 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2013-03-15 23:13:01 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-15 23:13:01 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-15 23:13:24 --- ERROR: ErrorException [ 1 ]: Class 'Model_User' not found ~ MODPATH\orm\classes\kohana\orm.php [ 37 ]
2013-03-15 23:13:24 --- STRACE: ErrorException [ 1 ]: Class 'Model_User' not found ~ MODPATH\orm\classes\kohana\orm.php [ 37 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2013-03-15 23:13:24 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-15 23:13:24 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-15 23:13:29 --- ERROR: ErrorException [ 1 ]: Class 'Model_User' not found ~ MODPATH\orm\classes\kohana\orm.php [ 37 ]
2013-03-15 23:13:29 --- STRACE: ErrorException [ 1 ]: Class 'Model_User' not found ~ MODPATH\orm\classes\kohana\orm.php [ 37 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2013-03-15 23:13:29 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-15 23:13:29 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-15 23:13:32 --- ERROR: ErrorException [ 1 ]: Class 'Model_User' not found ~ MODPATH\orm\classes\kohana\orm.php [ 37 ]
2013-03-15 23:13:32 --- STRACE: ErrorException [ 1 ]: Class 'Model_User' not found ~ MODPATH\orm\classes\kohana\orm.php [ 37 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2013-03-15 23:13:32 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-15 23:13:32 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-15 23:13:49 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-15 23:13:49 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-15 23:13:50 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-15 23:13:50 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-15 23:13:51 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-15 23:13:51 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-15 23:15:15 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-15 23:15:15 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-15 23:15:21 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-15 23:15:21 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-15 23:15:29 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-15 23:15:29 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-15 23:15:32 --- ERROR: ErrorException [ 8 ]: Undefined variable: catalog_options ~ MODPATH\admin\views\system\rights_add.php [ 35 ]
2013-03-15 23:15:32 --- STRACE: ErrorException [ 8 ]: Undefined variable: catalog_options ~ MODPATH\admin\views\system\rights_add.php [ 35 ]
--
#0 D:\htdocs\vps\club_one\modules\admin\views\system\rights_add.php(35): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\htdocs\vps\c...', 35, Array)
#1 D:\htdocs\vps\club_one\system\classes\kohana\view.php(61): include('D:\htdocs\vps\c...')
#2 D:\htdocs\vps\club_one\system\classes\kohana\view.php(343): Kohana_View::capture('D:\htdocs\vps\c...', Array)
#3 D:\htdocs\vps\club_one\modules\admin\classes\controller\admin.php(490): Kohana_View->render()
#4 [internal function]: Controller_Admin->after()
#5 D:\htdocs\vps\club_one\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_System_Rights))
#6 D:\htdocs\vps\club_one\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#7 D:\htdocs\vps\club_one\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#8 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#9 {main}
2013-03-15 23:15:38 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-15 23:15:38 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-15 23:16:10 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-15 23:16:10 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-15 23:16:49 --- ERROR: ErrorException [ 8 ]: Undefined variable: catalog_options ~ MODPATH\admin\views\system\rights_add.php [ 35 ]
2013-03-15 23:16:49 --- STRACE: ErrorException [ 8 ]: Undefined variable: catalog_options ~ MODPATH\admin\views\system\rights_add.php [ 35 ]
--
#0 D:\htdocs\vps\club_one\modules\admin\views\system\rights_add.php(35): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\htdocs\vps\c...', 35, Array)
#1 D:\htdocs\vps\club_one\system\classes\kohana\view.php(61): include('D:\htdocs\vps\c...')
#2 D:\htdocs\vps\club_one\system\classes\kohana\view.php(343): Kohana_View::capture('D:\htdocs\vps\c...', Array)
#3 D:\htdocs\vps\club_one\modules\admin\classes\controller\admin.php(490): Kohana_View->render()
#4 [internal function]: Controller_Admin->after()
#5 D:\htdocs\vps\club_one\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_System_Rights))
#6 D:\htdocs\vps\club_one\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#7 D:\htdocs\vps\club_one\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#8 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#9 {main}
2013-03-15 23:17:27 --- ERROR: ErrorException [ 8 ]: Undefined variable: catalog_options ~ MODPATH\admin\views\system\rights_add.php [ 35 ]
2013-03-15 23:17:27 --- STRACE: ErrorException [ 8 ]: Undefined variable: catalog_options ~ MODPATH\admin\views\system\rights_add.php [ 35 ]
--
#0 D:\htdocs\vps\club_one\modules\admin\views\system\rights_add.php(35): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\htdocs\vps\c...', 35, Array)
#1 D:\htdocs\vps\club_one\system\classes\kohana\view.php(61): include('D:\htdocs\vps\c...')
#2 D:\htdocs\vps\club_one\system\classes\kohana\view.php(343): Kohana_View::capture('D:\htdocs\vps\c...', Array)
#3 D:\htdocs\vps\club_one\modules\admin\classes\controller\admin.php(490): Kohana_View->render()
#4 [internal function]: Controller_Admin->after()
#5 D:\htdocs\vps\club_one\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_System_Rights))
#6 D:\htdocs\vps\club_one\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#7 D:\htdocs\vps\club_one\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#8 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#9 {main}
2013-03-15 23:19:10 --- ERROR: ErrorException [ 1 ]: Class 'Common' not found ~ MODPATH\admin\classes\controller\system\rights.php [ 147 ]
2013-03-15 23:19:10 --- STRACE: ErrorException [ 1 ]: Class 'Common' not found ~ MODPATH\admin\classes\controller\system\rights.php [ 147 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2013-03-15 23:20:46 --- ERROR: ErrorException [ 8 ]: Undefined variable: catalog_options ~ MODPATH\admin\views\system\rights_add.php [ 35 ]
2013-03-15 23:20:46 --- STRACE: ErrorException [ 8 ]: Undefined variable: catalog_options ~ MODPATH\admin\views\system\rights_add.php [ 35 ]
--
#0 D:\htdocs\vps\club_one\modules\admin\views\system\rights_add.php(35): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\htdocs\vps\c...', 35, Array)
#1 D:\htdocs\vps\club_one\system\classes\kohana\view.php(61): include('D:\htdocs\vps\c...')
#2 D:\htdocs\vps\club_one\system\classes\kohana\view.php(343): Kohana_View::capture('D:\htdocs\vps\c...', Array)
#3 D:\htdocs\vps\club_one\modules\admin\classes\controller\admin.php(490): Kohana_View->render()
#4 [internal function]: Controller_Admin->after()
#5 D:\htdocs\vps\club_one\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_System_Rights))
#6 D:\htdocs\vps\club_one\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#7 D:\htdocs\vps\club_one\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#8 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#9 {main}
2013-03-15 23:28:27 --- ERROR: ErrorException [ 8 ]: Undefined variable: catalog_options ~ MODPATH\admin\views\system\rights_add.php [ 35 ]
2013-03-15 23:28:27 --- STRACE: ErrorException [ 8 ]: Undefined variable: catalog_options ~ MODPATH\admin\views\system\rights_add.php [ 35 ]
--
#0 D:\htdocs\vps\club_one\modules\admin\views\system\rights_add.php(35): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\htdocs\vps\c...', 35, Array)
#1 D:\htdocs\vps\club_one\system\classes\kohana\view.php(61): include('D:\htdocs\vps\c...')
#2 D:\htdocs\vps\club_one\system\classes\kohana\view.php(343): Kohana_View::capture('D:\htdocs\vps\c...', Array)
#3 D:\htdocs\vps\club_one\modules\admin\classes\controller\admin.php(490): Kohana_View->render()
#4 [internal function]: Controller_Admin->after()
#5 D:\htdocs\vps\club_one\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_System_Rights))
#6 D:\htdocs\vps\club_one\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#7 D:\htdocs\vps\club_one\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#8 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#9 {main}
2013-03-15 23:28:29 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-15 23:28:29 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-15 23:32:34 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-15 23:32:34 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-15 23:41:14 --- ERROR: ErrorException [ 8 ]: Undefined index: name ~ MODPATH\admin\classes\common\main.php [ 102 ]
2013-03-15 23:41:14 --- STRACE: ErrorException [ 8 ]: Undefined index: name ~ MODPATH\admin\classes\common\main.php [ 102 ]
--
#0 D:\htdocs\vps\club_one\modules\admin\classes\common\main.php(102): Kohana_Core::error_handler(8, 'Undefined index...', 'D:\htdocs\vps\c...', 102, Array)
#1 D:\htdocs\vps\club_one\modules\admin\classes\controller\system\rights.php(187): Common_Main::make_treeview_options(Array)
#2 [internal function]: Controller_System_Rights->action_add()
#3 D:\htdocs\vps\club_one\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_System_Rights))
#4 D:\htdocs\vps\club_one\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 D:\htdocs\vps\club_one\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#7 {main}
2013-03-15 23:43:47 --- ERROR: ErrorException [ 8 ]: Undefined index: name ~ MODPATH\admin\classes\common\main.php [ 102 ]
2013-03-15 23:43:47 --- STRACE: ErrorException [ 8 ]: Undefined index: name ~ MODPATH\admin\classes\common\main.php [ 102 ]
--
#0 D:\htdocs\vps\club_one\modules\admin\classes\common\main.php(102): Kohana_Core::error_handler(8, 'Undefined index...', 'D:\htdocs\vps\c...', 102, Array)
#1 D:\htdocs\vps\club_one\modules\admin\classes\controller\system\rights.php(187): Common_Main::make_treeview_options(Array)
#2 [internal function]: Controller_System_Rights->action_add()
#3 D:\htdocs\vps\club_one\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_System_Rights))
#4 D:\htdocs\vps\club_one\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 D:\htdocs\vps\club_one\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#7 {main}
2013-03-15 23:45:48 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-15 23:45:48 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-15 23:46:54 --- ERROR: ErrorException [ 1 ]: Call to a member function make_treeview_options() on a non-object ~ MODPATH\admin\classes\controller\system\rights.php [ 186 ]
2013-03-15 23:46:54 --- STRACE: ErrorException [ 1 ]: Call to a member function make_treeview_options() on a non-object ~ MODPATH\admin\classes\controller\system\rights.php [ 186 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2013-03-15 23:54:10 --- ERROR: ErrorException [ 4096 ]: Argument 2 passed to Kohana_Form::select() must be an array, string given, called in D:\htdocs\vps\club_one\modules\admin\views\system\rights_add.php on line 29 and defined ~ SYSPATH\classes\kohana\form.php [ 252 ]
2013-03-15 23:54:10 --- STRACE: ErrorException [ 4096 ]: Argument 2 passed to Kohana_Form::select() must be an array, string given, called in D:\htdocs\vps\club_one\modules\admin\views\system\rights_add.php on line 29 and defined ~ SYSPATH\classes\kohana\form.php [ 252 ]
--
#0 D:\htdocs\vps\club_one\system\classes\kohana\form.php(252): Kohana_Core::error_handler(4096, 'Argument 2 pass...', 'D:\htdocs\vps\c...', 252, Array)
#1 D:\htdocs\vps\club_one\modules\admin\views\system\rights_add.php(29): Kohana_Form::select('type', 'data_types', '2', Array)
#2 D:\htdocs\vps\club_one\system\classes\kohana\view.php(61): include('D:\htdocs\vps\c...')
#3 D:\htdocs\vps\club_one\system\classes\kohana\view.php(343): Kohana_View::capture('D:\htdocs\vps\c...', Array)
#4 D:\htdocs\vps\club_one\modules\admin\classes\controller\admin.php(490): Kohana_View->render()
#5 [internal function]: Controller_Admin->after()
#6 D:\htdocs\vps\club_one\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_System_Rights))
#7 D:\htdocs\vps\club_one\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 D:\htdocs\vps\club_one\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#9 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#10 {main}
2013-03-15 23:55:17 --- ERROR: ErrorException [ 4096 ]: Argument 2 passed to Kohana_Form::select() must be an array, string given, called in D:\htdocs\vps\club_one\modules\admin\views\system\rights_add.php on line 29 and defined ~ SYSPATH\classes\kohana\form.php [ 252 ]
2013-03-15 23:55:17 --- STRACE: ErrorException [ 4096 ]: Argument 2 passed to Kohana_Form::select() must be an array, string given, called in D:\htdocs\vps\club_one\modules\admin\views\system\rights_add.php on line 29 and defined ~ SYSPATH\classes\kohana\form.php [ 252 ]
--
#0 D:\htdocs\vps\club_one\system\classes\kohana\form.php(252): Kohana_Core::error_handler(4096, 'Argument 2 pass...', 'D:\htdocs\vps\c...', 252, Array)
#1 D:\htdocs\vps\club_one\modules\admin\views\system\rights_add.php(29): Kohana_Form::select('type', 'data_types', '2', Array)
#2 D:\htdocs\vps\club_one\system\classes\kohana\view.php(61): include('D:\htdocs\vps\c...')
#3 D:\htdocs\vps\club_one\system\classes\kohana\view.php(343): Kohana_View::capture('D:\htdocs\vps\c...', Array)
#4 D:\htdocs\vps\club_one\modules\admin\classes\controller\admin.php(490): Kohana_View->render()
#5 [internal function]: Controller_Admin->after()
#6 D:\htdocs\vps\club_one\system\classes\kohana\request\client\internal.php(121): ReflectionMethod->invoke(Object(Controller_System_Rights))
#7 D:\htdocs\vps\club_one\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 D:\htdocs\vps\club_one\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#9 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#10 {main}