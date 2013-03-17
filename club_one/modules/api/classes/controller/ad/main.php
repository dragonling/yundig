<?php defined('SYSPATH') or die('No direct script access.');
/**
 * 
 * 本接口定义了终端机顶盒根据设备ID获取所属客户编号的广告信息接口。广告类型包括首页滚动提示文字信息等。
 * @author Shunnar
 *
 */
class Controller_Ad_Main extends Controller_Api{
	
	public function before()
	{
		parent::before();
		$this->key = "API-Ad".implode($_GET, '-');
		
		if($ads = Cache::instance()->get($this->key, FALSE))
		{
			//Kohana_Log::instance()->add(Log::DEBUG, $this->key."is cached!");
			$this->response->body($ads);
		}
		//validate 失败处理
		if($this->data['code']!='0000')
		{			
		//	$this->response->body(API::to_xml($this->data,'config'));
			$this->export($this->data,'config');		
		}
	}
	/**
	 * 正常输出时设置缓存
	 * @see Kohana_Controller::after()
	 */
	public function after()
	{
		parent::after();
		$ads = $this->response->body();
		
		
		Xcache::add_tag($this->key, $ads,3600,array("API_AD"));
	}
	/**
	 * 
	 * API 默认执行入口
	 */
	public function action_index()
	{
		$this->get_add();
		//$xml = API::to_xml($this->data,'config',array('content'));
		$this->export($this->data,'config',array('content'));
		//$this->response->body($xml);	
		//$this->response->body($xml);	
	}
	/**
	 * 
	 * 获取广告信息
	 */
	protected function get_add()
	{
		//get 参数获取
		$ads = array();
		$position_id = $this->request->query('pid');
		$limit = $this->request->query('limit');
		$type = $this->request->query('type');
		$key = "ad-p-".$position_id."limit".$limit."type-".$type.$this->pcba_code.$this->oem_code;
		
		if( ! $ads = Cache::instance()->get($key, FALSE))	
		{
// 			$results = DB::select()->from('vlc_api_ad')->where("position_id",'=',$position_id)->execute();
			
			
			
			
		
			$ads_customer = ORM::factory('api_ad')->where("position_id",'=',$position_id)->where('board_type','=',$this->pcba_code)->where('customer','=',$this->oem_code)->find();
			$ads_board = ORM::factory('api_ad')->where("position_id",'=',$position_id)->and_where("board_type","=",$this->pcba_code)->and_where('customer','=',"0")->find();
			$ads_base = ORM::factory('api_ad')->where("position_id",'=',$position_id)->where('board_type','=',"0")->where('customer','=',"0")->find();
			
		
			//首先查找客户定制
			if($ads_customer->loaded())
			{
				$ads[] = $ads_customer->as_array();
			}
			//其次查找板卡设置
			elseif($ads_board->loaded())
			{
				$ads[] = $ads_board->as_array();
			}
			else
			{
				$ads[] = $ads_base->as_array();
			}
			//$results = array_merge($ads_base,$ads_board);
			//echo Debug::vars($ads_customer->loaded());exit;
			
			Cache::instance()->set($key, $ads);
			Xcache::add_tag($key, $ads,120,array("API_AD"));
		}
				
		if(empty($ads))
		$this->data = $this->code("1201","广告位不存在");
		else
		$this->data += array(			
			"posion_id"=>$position_id,
			"ads" =>$ads,
			);
		
	}

}
