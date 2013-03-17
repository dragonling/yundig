<?php defined('SYSPATH') or die('No direct script access.'); ?>

2013-03-13 00:12:14 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 00:12:14 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 00:17:16 --- ERROR: Session_Exception [ 1 ]: Error reading session data. ~ SYSPATH\classes\kohana\session.php [ 326 ]
2013-03-13 00:17:16 --- STRACE: Session_Exception [ 1 ]: Error reading session data. ~ SYSPATH\classes\kohana\session.php [ 326 ]
--
#0 D:\htdocs\vps\club_one\system\classes\kohana\session.php(125): Kohana_Session->read(NULL)
#1 D:\htdocs\vps\club_one\system\classes\kohana\session.php(54): Kohana_Session->__construct(NULL, NULL)
#2 D:\htdocs\vps\club_one\modules\user\classes\kohana\user.php(57): Kohana_Session::instance('native')
#3 D:\htdocs\vps\club_one\modules\user\classes\kohana\user.php(37): Kohana_User->__construct(Object(Config_Group))
#4 D:\htdocs\vps\club_one\modules\user\classes\model\user\user.php(59): Kohana_User::instance()
#5 D:\htdocs\vps\club_one\modules\orm\classes\kohana\orm.php(1073): Model_User_User->filters()
#6 D:\htdocs\vps\club_one\modules\orm\classes\kohana\orm.php(655): Kohana_ORM->run_filter('email', 'dragonling@live...')
#7 D:\htdocs\vps\club_one\modules\orm\classes\kohana\orm.php(634): Kohana_ORM->set('email', 'dragonling@live...')
#8 D:\htdocs\vps\club_one\modules\www\classes\web.php(375): Kohana_ORM->__set('email', 'dragonling@live...')
#9 D:\htdocs\vps\club_one\modules\www\classes\controller\user\main.php(58): Web->save()
#10 [internal function]: Controller_User_Main->action_reg_next()
#11 D:\htdocs\vps\club_one\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_User))
#12 D:\htdocs\vps\club_one\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#13 D:\htdocs\vps\club_one\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#14 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#15 {main}
2013-03-13 00:17:16 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 00:17:16 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 00:17:24 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 00:17:24 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 00:17:25 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 00:17:25 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 00:18:12 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 00:18:12 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 00:18:33 --- ERROR: ORM_Validation_Exception [ 0 ]: Failed to validate array ~ MODPATH\orm\classes\kohana\orm.php [ 1174 ]
2013-03-13 00:18:33 --- STRACE: ORM_Validation_Exception [ 0 ]: Failed to validate array ~ MODPATH\orm\classes\kohana\orm.php [ 1174 ]
--
#0 D:\htdocs\vps\club_one\modules\orm\classes\kohana\orm.php(1200): Kohana_ORM->check(NULL)
#1 D:\htdocs\vps\club_one\modules\orm\classes\kohana\orm.php(1314): Kohana_ORM->create(NULL)
#2 D:\htdocs\vps\club_one\modules\www\classes\web.php(379): Kohana_ORM->save()
#3 D:\htdocs\vps\club_one\modules\www\classes\controller\user\main.php(58): Web->save()
#4 [internal function]: Controller_User_Main->action_reg_next()
#5 D:\htdocs\vps\club_one\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_User))
#6 D:\htdocs\vps\club_one\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#7 D:\htdocs\vps\club_one\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#8 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#9 {main}
2013-03-13 00:18:33 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 00:18:33 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 00:21:50 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 00:21:50 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 00:22:04 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 00:22:04 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 00:22:07 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 00:22:07 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 00:22:11 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 00:22:11 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 00:22:18 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 00:22:18 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 00:23:01 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 00:23:01 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 00:23:14 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 00:23:14 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 00:23:19 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 00:23:19 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 00:23:26 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 00:23:26 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 00:24:55 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 00:24:55 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 00:25:04 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 00:25:04 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 00:25:57 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 00:25:57 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 00:26:17 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 00:26:17 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 00:27:45 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected ',' ~ MODPATH\user\classes\model\user\user.php [ 141 ]
2013-03-13 00:27:45 --- STRACE: ErrorException [ 4 ]: syntax error, unexpected ',' ~ MODPATH\user\classes\model\user\user.php [ 141 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2013-03-13 00:27:45 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 00:27:45 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 00:27:52 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected ',' ~ MODPATH\user\classes\model\user\user.php [ 141 ]
2013-03-13 00:27:52 --- STRACE: ErrorException [ 4 ]: syntax error, unexpected ',' ~ MODPATH\user\classes\model\user\user.php [ 141 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2013-03-13 00:27:52 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 00:27:52 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 00:28:06 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 00:28:06 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 00:28:13 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 00:28:13 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 00:31:34 --- ERROR: ErrorException [ 4096 ]: Argument 1 passed to Kohana_Validation::factory() must be an array, null given, called in D:\htdocs\vps\club_one\modules\user\classes\model\user\user.php on line 140 and defined ~ SYSPATH\classes\kohana\validation.php [ 19 ]
2013-03-13 00:31:34 --- STRACE: ErrorException [ 4096 ]: Argument 1 passed to Kohana_Validation::factory() must be an array, null given, called in D:\htdocs\vps\club_one\modules\user\classes\model\user\user.php on line 140 and defined ~ SYSPATH\classes\kohana\validation.php [ 19 ]
--
#0 D:\htdocs\vps\club_one\system\classes\kohana\validation.php(19): Kohana_Core::error_handler(4096, 'Argument 1 pass...', 'D:\htdocs\vps\c...', 19, Array)
#1 D:\htdocs\vps\club_one\modules\user\classes\model\user\user.php(140): Kohana_Validation::factory(NULL)
#2 D:\htdocs\vps\club_one\modules\user\classes\model\user\user.php(199): Model_User_User::get_password_validation(NULL)
#3 D:\htdocs\vps\club_one\modules\user\classes\model\user\user.php(206): Model_User_User->update_user(NULL)
#4 D:\htdocs\vps\club_one\modules\www\classes\web.php(379): Model_User_User->save()
#5 D:\htdocs\vps\club_one\modules\www\classes\controller\user\main.php(61): Web->save()
#6 [internal function]: Controller_User_Main->action_reg_next()
#7 D:\htdocs\vps\club_one\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_User))
#8 D:\htdocs\vps\club_one\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 D:\htdocs\vps\club_one\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#10 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#11 {main}
2013-03-13 00:31:34 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 00:31:34 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 00:34:27 --- ERROR: ErrorException [ 1 ]: Call to a member function save() on a non-object ~ MODPATH\www\classes\controller\user\main.php [ 61 ]
2013-03-13 00:34:27 --- STRACE: ErrorException [ 1 ]: Call to a member function save() on a non-object ~ MODPATH\www\classes\controller\user\main.php [ 61 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2013-03-13 00:34:28 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 00:34:28 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 00:36:29 --- ERROR: ErrorException [ 1 ]: Call to a member function table_name() on a non-object ~ MODPATH\www\classes\controller\user\main.php [ 61 ]
2013-03-13 00:36:29 --- STRACE: ErrorException [ 1 ]: Call to a member function table_name() on a non-object ~ MODPATH\www\classes\controller\user\main.php [ 61 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2013-03-13 00:36:29 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 00:36:29 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 00:36:43 --- ERROR: ErrorException [ 1 ]: Call to a member function table() on a non-object ~ MODPATH\www\classes\controller\user\main.php [ 61 ]
2013-03-13 00:36:43 --- STRACE: ErrorException [ 1 ]: Call to a member function table() on a non-object ~ MODPATH\www\classes\controller\user\main.php [ 61 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2013-03-13 00:36:44 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 00:36:44 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 00:38:27 --- ERROR: ErrorException [ 2048 ]: Declaration of Model_User_User::save() should be compatible with that of Kohana_ORM::save() ~ MODPATH\user\classes\model\user\user.php [ 208 ]
2013-03-13 00:38:27 --- STRACE: ErrorException [ 2048 ]: Declaration of Model_User_User::save() should be compatible with that of Kohana_ORM::save() ~ MODPATH\user\classes\model\user\user.php [ 208 ]
--
#0 D:\htdocs\vps\club_one\system\classes\kohana\core.php(496): Kohana_Core::error_handler(2048, 'Declaration of ...', 'D:\htdocs\vps\c...', 208, Array)
#1 D:\htdocs\vps\club_one\system\classes\kohana\core.php(496): Kohana_Core::auto_load()
#2 [internal function]: Kohana_Core::auto_load('Model_User_User')
#3 D:\htdocs\vps\club_one\modules\user\classes\model\user.php(3): spl_autoload_call('Model_User_User')
#4 D:\htdocs\vps\club_one\system\classes\kohana\core.php(496): require('D:\htdocs\vps\c...')
#5 [internal function]: Kohana_Core::auto_load('Model_User')
#6 D:\htdocs\vps\club_one\modules\orm\classes\kohana\orm.php(37): spl_autoload_call('Model_User')
#7 D:\htdocs\vps\club_one\modules\www\classes\controller\user\main.php(61): Kohana_ORM::factory('user')
#8 [internal function]: Controller_User_Main->action_reg_next()
#9 D:\htdocs\vps\club_one\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_User))
#10 D:\htdocs\vps\club_one\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#11 D:\htdocs\vps\club_one\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#12 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#13 {main}
2013-03-13 00:38:28 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 00:38:28 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 00:42:47 --- ERROR: ErrorException [ 1 ]: Call to a member function save() on a non-object ~ MODPATH\www\classes\controller\user\main.php [ 61 ]
2013-03-13 00:42:47 --- STRACE: ErrorException [ 1 ]: Call to a member function save() on a non-object ~ MODPATH\www\classes\controller\user\main.php [ 61 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2013-03-13 00:42:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 00:42:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 00:43:06 --- ERROR: ErrorException [ 1 ]: Call to a member function save() on a non-object ~ MODPATH\www\classes\controller\user\main.php [ 61 ]
2013-03-13 00:43:06 --- STRACE: ErrorException [ 1 ]: Call to a member function save() on a non-object ~ MODPATH\www\classes\controller\user\main.php [ 61 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2013-03-13 00:43:07 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 00:43:07 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 00:43:45 --- ERROR: Kohana_Exception [ 0 ]: Cannot update user model because it is not loaded. ~ MODPATH\orm\classes\kohana\orm.php [ 1250 ]
2013-03-13 00:43:45 --- STRACE: Kohana_Exception [ 0 ]: Cannot update user model because it is not loaded. ~ MODPATH\orm\classes\kohana\orm.php [ 1250 ]
--
#0 D:\htdocs\vps\club_one\modules\user\classes\model\user\user.php(206): Kohana_ORM->update(Object(Validation))
#1 D:\htdocs\vps\club_one\modules\user\classes\model\user\user.php(211): Model_User_User->update_user(Array, NULL)
#2 D:\htdocs\vps\club_one\modules\www\classes\controller\user\main.php(61): Model_User_User->save()
#3 [internal function]: Controller_User_Main->action_reg_next()
#4 D:\htdocs\vps\club_one\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_User))
#5 D:\htdocs\vps\club_one\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 D:\htdocs\vps\club_one\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#7 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#8 {main}
2013-03-13 00:43:45 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 00:43:45 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 00:44:49 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 00:44:49 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 00:45:15 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 00:45:15 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 00:45:46 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 00:45:46 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 00:45:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 00:45:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 00:45:54 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 00:45:54 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 00:46:05 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 00:46:05 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 00:46:36 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 00:46:36 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 00:46:42 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 00:46:42 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 01:34:18 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 01:34:18 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 01:45:14 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 01:45:14 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 21:58:56 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 21:58:56 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 21:59:12 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 21:59:12 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 22:01:02 --- ERROR: ErrorException [ 1 ]: Call to a member function as_array() on a non-object ~ MODPATH\www\classes\controller\user.php [ 12 ]
2013-03-13 22:01:02 --- STRACE: ErrorException [ 1 ]: Call to a member function as_array() on a non-object ~ MODPATH\www\classes\controller\user.php [ 12 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2013-03-13 22:01:03 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 22:01:03 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 22:01:09 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 22:01:09 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 22:02:40 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 22:02:40 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 22:13:37 --- ERROR: Session_Exception [ 1 ]: Error reading session data. ~ SYSPATH\classes\kohana\session.php [ 326 ]
2013-03-13 22:13:37 --- STRACE: Session_Exception [ 1 ]: Error reading session data. ~ SYSPATH\classes\kohana\session.php [ 326 ]
--
#0 D:\htdocs\vps\club_one\system\classes\kohana\session.php(125): Kohana_Session->read(NULL)
#1 D:\htdocs\vps\club_one\system\classes\kohana\session.php(54): Kohana_Session->__construct(NULL, NULL)
#2 D:\htdocs\vps\club_one\modules\user\classes\kohana\user.php(57): Kohana_Session::instance('native')
#3 D:\htdocs\vps\club_one\modules\user\classes\kohana\user.php(37): Kohana_User->__construct(Object(Config_Group))
#4 D:\htdocs\vps\club_one\modules\user\classes\model\user\user.php(64): Kohana_User::instance()
#5 D:\htdocs\vps\club_one\modules\orm\classes\kohana\orm.php(1073): Model_User_User->filters()
#6 D:\htdocs\vps\club_one\modules\orm\classes\kohana\orm.php(655): Kohana_ORM->run_filter('email', 'dragonling2@liv...')
#7 D:\htdocs\vps\club_one\modules\orm\classes\kohana\orm.php(634): Kohana_ORM->set('email', 'dragonling2@liv...')
#8 D:\htdocs\vps\club_one\modules\orm\classes\kohana\orm.php(725): Kohana_ORM->__set('email', 'dragonling2@liv...')
#9 D:\htdocs\vps\club_one\modules\user\classes\model\user\user.php(172): Kohana_ORM->values(Array, NULL)
#10 D:\htdocs\vps\club_one\modules\user\classes\model\user\user.php(211): Model_User_User->create_user(Array, NULL)
#11 D:\htdocs\vps\club_one\modules\www\classes\controller\user\main.php(61): Model_User_User->save()
#12 [internal function]: Controller_User_Main->action_reg_next()
#13 D:\htdocs\vps\club_one\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_User))
#14 D:\htdocs\vps\club_one\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#15 D:\htdocs\vps\club_one\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#16 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#17 {main}
2013-03-13 22:13:37 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 22:13:37 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 22:14:39 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 22:14:39 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 22:14:48 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 22:14:48 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 22:14:57 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 22:14:57 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 22:15:23 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 22:15:23 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 22:15:29 --- ERROR: ErrorException [ 1 ]: Class 'Model_Auth_admin_user' not found ~ MODPATH\orm\classes\kohana\orm.php [ 37 ]
2013-03-13 22:15:29 --- STRACE: ErrorException [ 1 ]: Class 'Model_Auth_admin_user' not found ~ MODPATH\orm\classes\kohana\orm.php [ 37 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2013-03-13 22:15:29 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 22:15:29 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 22:15:34 --- ERROR: ErrorException [ 1 ]: Class 'Model_Auth_admin_user' not found ~ MODPATH\orm\classes\kohana\orm.php [ 37 ]
2013-03-13 22:15:34 --- STRACE: ErrorException [ 1 ]: Class 'Model_Auth_admin_user' not found ~ MODPATH\orm\classes\kohana\orm.php [ 37 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2013-03-13 22:15:34 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 22:15:34 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 22:15:37 --- ERROR: ErrorException [ 1 ]: Class 'Model_Auth_admin_user' not found ~ MODPATH\orm\classes\kohana\orm.php [ 37 ]
2013-03-13 22:15:37 --- STRACE: ErrorException [ 1 ]: Class 'Model_Auth_admin_user' not found ~ MODPATH\orm\classes\kohana\orm.php [ 37 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2013-03-13 22:15:37 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 22:15:37 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 22:15:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 22:15:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 22:15:50 --- ERROR: ErrorException [ 1 ]: Class 'Model_Auth_admin_user' not found ~ MODPATH\orm\classes\kohana\orm.php [ 37 ]
2013-03-13 22:15:50 --- STRACE: ErrorException [ 1 ]: Class 'Model_Auth_admin_user' not found ~ MODPATH\orm\classes\kohana\orm.php [ 37 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2013-03-13 22:15:50 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 22:15:50 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 22:16:05 --- ERROR: ErrorException [ 1 ]: Class 'Model_Auth_admin_user' not found ~ MODPATH\orm\classes\kohana\orm.php [ 37 ]
2013-03-13 22:16:05 --- STRACE: ErrorException [ 1 ]: Class 'Model_Auth_admin_user' not found ~ MODPATH\orm\classes\kohana\orm.php [ 37 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2013-03-13 22:16:05 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 22:16:05 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 22:16:10 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 22:16:10 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 22:16:13 --- ERROR: ErrorException [ 1 ]: Class 'Model_Auth_admin_user' not found ~ MODPATH\orm\classes\kohana\orm.php [ 37 ]
2013-03-13 22:16:13 --- STRACE: ErrorException [ 1 ]: Class 'Model_Auth_admin_user' not found ~ MODPATH\orm\classes\kohana\orm.php [ 37 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2013-03-13 22:16:13 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 22:16:13 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 22:16:20 --- ERROR: ErrorException [ 1 ]: Class 'Model_Auth_admin_user' not found ~ MODPATH\orm\classes\kohana\orm.php [ 37 ]
2013-03-13 22:16:20 --- STRACE: ErrorException [ 1 ]: Class 'Model_Auth_admin_user' not found ~ MODPATH\orm\classes\kohana\orm.php [ 37 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2013-03-13 22:16:23 --- ERROR: ErrorException [ 1 ]: Class 'Model_Auth_admin_user' not found ~ MODPATH\orm\classes\kohana\orm.php [ 37 ]
2013-03-13 22:16:23 --- STRACE: ErrorException [ 1 ]: Class 'Model_Auth_admin_user' not found ~ MODPATH\orm\classes\kohana\orm.php [ 37 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2013-03-13 22:17:12 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 22:17:12 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 22:17:26 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 22:17:26 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 22:17:35 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 22:17:35 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 22:17:53 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 22:17:53 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 22:17:55 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 22:17:55 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 22:18:06 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 22:18:06 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 22:20:11 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 22:20:11 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 22:20:18 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 22:20:18 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 22:20:21 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 22:20:21 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 22:20:24 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 22:20:24 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 22:20:41 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 22:20:41 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 22:23:18 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 22:23:18 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 22:23:19 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 22:23:19 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 22:36:28 --- ERROR: Session_Exception [ 1 ]: Error reading session data. ~ SYSPATH\classes\kohana\session.php [ 326 ]
2013-03-13 22:36:28 --- STRACE: Session_Exception [ 1 ]: Error reading session data. ~ SYSPATH\classes\kohana\session.php [ 326 ]
--
#0 D:\htdocs\vps\club_one\system\classes\kohana\session.php(125): Kohana_Session->read(NULL)
#1 D:\htdocs\vps\club_one\system\classes\kohana\session.php(54): Kohana_Session->__construct(NULL, NULL)
#2 D:\htdocs\vps\club_one\modules\user\classes\kohana\user.php(57): Kohana_Session::instance('native')
#3 D:\htdocs\vps\club_one\modules\user\classes\kohana\user.php(37): Kohana_User->__construct(Object(Config_Group))
#4 D:\htdocs\vps\club_one\modules\user\classes\model\user\user.php(65): Kohana_User::instance()
#5 D:\htdocs\vps\club_one\modules\orm\classes\kohana\orm.php(1073): Model_User_User->filters()
#6 D:\htdocs\vps\club_one\modules\orm\classes\kohana\orm.php(655): Kohana_ORM->run_filter('email', 'dragonlings@liv...')
#7 D:\htdocs\vps\club_one\modules\orm\classes\kohana\orm.php(634): Kohana_ORM->set('email', 'dragonlings@liv...')
#8 D:\htdocs\vps\club_one\modules\orm\classes\kohana\orm.php(725): Kohana_ORM->__set('email', 'dragonlings@liv...')
#9 D:\htdocs\vps\club_one\modules\user\classes\model\user\user.php(173): Kohana_ORM->values(Array, NULL)
#10 D:\htdocs\vps\club_one\modules\user\classes\model\user\user.php(212): Model_User_User->create_user(Array, NULL)
#11 D:\htdocs\vps\club_one\modules\www\classes\controller\user.php(44): Model_User_User->save()
#12 [internal function]: Controller_User->action_reg_next()
#13 D:\htdocs\vps\club_one\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_User))
#14 D:\htdocs\vps\club_one\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#15 D:\htdocs\vps\club_one\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#16 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#17 {main}
2013-03-13 22:36:29 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 22:36:29 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 22:36:36 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 22:36:36 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 22:40:00 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 22:40:00 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 22:40:06 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 22:40:06 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 22:40:21 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 22:40:21 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 22:49:48 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 22:49:48 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 22:49:50 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 22:49:50 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 22:50:01 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 22:50:01 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 23:12:31 --- ERROR: ReflectionException [ 0 ]: Function unique() does not exist ~ SYSPATH\classes\kohana\validation.php [ 383 ]
2013-03-13 23:12:31 --- STRACE: ReflectionException [ 0 ]: Function unique() does not exist ~ SYSPATH\classes\kohana\validation.php [ 383 ]
--
#0 D:\htdocs\vps\club_one\system\classes\kohana\validation.php(383): ReflectionFunction->__construct('unique')
#1 D:\htdocs\vps\club_one\modules\orm\classes\kohana\orm.php(1165): Kohana_Validation->check()
#2 D:\htdocs\vps\club_one\modules\orm\classes\kohana\orm.php(1200): Kohana_ORM->check(Object(Validation))
#3 D:\htdocs\vps\club_one\modules\user\classes\model\user\info.php(61): Kohana_ORM->create(Object(Validation))
#4 D:\htdocs\vps\club_one\modules\user\classes\model\user\info.php(100): Model_User_Info->create_user(Array, NULL)
#5 D:\htdocs\vps\club_one\modules\www\classes\controller\user.php(45): Model_User_Info->save()
#6 [internal function]: Controller_User->action_reg_next()
#7 D:\htdocs\vps\club_one\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_User))
#8 D:\htdocs\vps\club_one\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 D:\htdocs\vps\club_one\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#10 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#11 {main}
2013-03-13 23:12:32 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 23:12:32 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 23:13:08 --- ERROR: ReflectionException [ 0 ]: Function unique() does not exist ~ SYSPATH\classes\kohana\validation.php [ 383 ]
2013-03-13 23:13:08 --- STRACE: ReflectionException [ 0 ]: Function unique() does not exist ~ SYSPATH\classes\kohana\validation.php [ 383 ]
--
#0 D:\htdocs\vps\club_one\system\classes\kohana\validation.php(383): ReflectionFunction->__construct('unique')
#1 D:\htdocs\vps\club_one\modules\orm\classes\kohana\orm.php(1165): Kohana_Validation->check()
#2 D:\htdocs\vps\club_one\modules\orm\classes\kohana\orm.php(1200): Kohana_ORM->check(Object(Validation))
#3 D:\htdocs\vps\club_one\modules\user\classes\model\user\info.php(83): Kohana_ORM->create(Object(Validation))
#4 D:\htdocs\vps\club_one\modules\user\classes\model\user\info.php(122): Model_User_Info->create_user(Array, NULL)
#5 D:\htdocs\vps\club_one\modules\www\classes\controller\user.php(45): Model_User_Info->save()
#6 [internal function]: Controller_User->action_reg_next()
#7 D:\htdocs\vps\club_one\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_User))
#8 D:\htdocs\vps\club_one\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 D:\htdocs\vps\club_one\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#10 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#11 {main}
2013-03-13 23:13:09 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 23:13:09 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 23:23:37 --- ERROR: ErrorException [ 8 ]: Undefined variable: extra_validation ~ MODPATH\user\classes\model\user\info.php [ 83 ]
2013-03-13 23:23:37 --- STRACE: ErrorException [ 8 ]: Undefined variable: extra_validation ~ MODPATH\user\classes\model\user\info.php [ 83 ]
--
#0 D:\htdocs\vps\club_one\modules\user\classes\model\user\info.php(83): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\htdocs\vps\c...', 83, Array)
#1 D:\htdocs\vps\club_one\modules\user\classes\model\user\info.php(122): Model_User_Info->create_user(Array, NULL)
#2 D:\htdocs\vps\club_one\modules\www\classes\controller\user.php(45): Model_User_Info->save()
#3 [internal function]: Controller_User->action_reg_next()
#4 D:\htdocs\vps\club_one\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_User))
#5 D:\htdocs\vps\club_one\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 D:\htdocs\vps\club_one\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#7 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#8 {main}
2013-03-13 23:23:37 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 23:23:37 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 23:23:51 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 23:23:51 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 23:24:29 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 23:24:29 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 23:25:06 --- ERROR: Database_Exception [ 1062 ]: Duplicate entry '14' for key 'user_id' [ INSERT INTO `ko_user_info` (`user_id`, `first_name`, `last_name`, `gender`, `brithday`, `phone`, `spare_email`, `id_card`, `county`, `education`, `profession`, `income`, `family_income`, `marriage`, `referrer_name`, `referrer_id`) VALUES (14, 'asfasdf', '', '1', '0-0-0', '', '', '', '0', '0', '0', '0', '0', '0', '', '') ] ~ MODPATH\database\classes\kohana\database\mysql.php [ 194 ]
2013-03-13 23:25:06 --- STRACE: Database_Exception [ 1062 ]: Duplicate entry '14' for key 'user_id' [ INSERT INTO `ko_user_info` (`user_id`, `first_name`, `last_name`, `gender`, `brithday`, `phone`, `spare_email`, `id_card`, `county`, `education`, `profession`, `income`, `family_income`, `marriage`, `referrer_name`, `referrer_id`) VALUES (14, 'asfasdf', '', '1', '0-0-0', '', '', '', '0', '0', '0', '0', '0', '0', '', '') ] ~ MODPATH\database\classes\kohana\database\mysql.php [ 194 ]
--
#0 D:\htdocs\vps\club_one\modules\database\classes\kohana\database\query.php(245): Kohana_Database_MySQL->query(2, 'INSERT INTO `ko...', false, Array)
#1 D:\htdocs\vps\club_one\modules\orm\classes\kohana\orm.php(1222): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 D:\htdocs\vps\club_one\modules\user\classes\model\user\info.php(83): Kohana_ORM->create()
#3 D:\htdocs\vps\club_one\modules\user\classes\model\user\info.php(122): Model_User_Info->create_user(Array, NULL)
#4 D:\htdocs\vps\club_one\modules\www\classes\controller\user.php(45): Model_User_Info->save()
#5 [internal function]: Controller_User->action_reg_next()
#6 D:\htdocs\vps\club_one\system\classes\kohana\request\client\internal.php(118): ReflectionMethod->invoke(Object(Controller_User))
#7 D:\htdocs\vps\club_one\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 D:\htdocs\vps\club_one\system\classes\kohana\request.php(1138): Kohana_Request_Client->execute(Object(Request))
#9 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#10 {main}
2013-03-13 23:25:06 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 23:25:06 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 23:26:16 --- ERROR: ErrorException [ 1 ]: Call to undefined method Model_User_Info::fine() ~ MODPATH\www\classes\controller\user.php [ 45 ]
2013-03-13 23:26:16 --- STRACE: ErrorException [ 1 ]: Call to undefined method Model_User_Info::fine() ~ MODPATH\www\classes\controller\user.php [ 45 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2013-03-13 23:26:16 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 23:26:16 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 23:26:26 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 23:26:26 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 23:35:25 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 23:35:25 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 23:55:51 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 23:55:51 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 23:55:52 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 23:55:52 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 23:56:54 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 23:56:54 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 23:57:00 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 23:57:00 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 23:57:13 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 23:57:13 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 23:57:46 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 23:57:46 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 23:57:48 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 23:57:48 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 23:58:00 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 23:58:00 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 23:58:32 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 23:58:32 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}
2013-03-13 23:58:44 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
2013-03-13 23:58:44 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1126 ]
--
#0 D:\htdocs\vps\club_one\index.php(110): Kohana_Request->execute()
#1 {main}