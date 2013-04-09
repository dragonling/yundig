<?php defined('SYSPATH') or die('No direct script access.');	

class Controller_Caipiao extends Controller_Main{

	function before()
	{				
		parent::before();				
	}
	
	function action_index()
	{
		$page = Arr::get($_GET, 'page', 1);
		$year = Arr::get($_GET, 'year', '2013');
		$month = Arr::get($_GET, 'month', '01');
		$day = Arr::get($_GET, 'day', '01');
		if ($page == 52) die;
		$url = 'http://baidu.lecai.com/lottery/draw/list/23?lottery_type=23&page='.$page.'&ds='.$year.'-'.$month.'-'.$day.'&de='.$year.'-'.$month.'-'.(14+$day);
		$html = file_get_contents($url);
		$html = substr($html, strpos($html, '<table id="draw_list">'));
		$html = substr($html, 0, strpos($html, '</div>'));
		preg_match_all('/<td class="td1">(.*?)<\/td>.*?<td class="td2">(.*?)<\/td>.*?<td class="td3">(.*?)<\/td>/is', $html, $match, PREG_SET_ORDER );
		array_shift($match);
		if (empty($match) && $month < 12)
		{
			$month += 1;
			$page = 1;
		}
		foreach ($match as $v)
		{
			preg_match_all('/<span class="ball_1">(.*?)<\/span>/', $v[3], $balls);
			
			$issue = trim($v[2]);
			
			$issue_day = str_replace(substr(str_replace('-', '', $v[1]), 2), '', $issue);
			$orm = ORM::factory('caipiao')->where('issue', '=', $issue)->find();
			$orm->date = $v[1];
			$orm->issue = $issue;
			$orm->issue_day = $issue_day;
			$orm->ball = implode(',', $balls[1]);
			$orm->save();
		}
		echo '<script>window.location="http://www.club.com/caipiao?page='.($page+1).'&month='.$month.'&year='.$year.'&day='.$day.'"</script>';
	}
	
	function action_calculate()
	{
		$issue = Arr::get($_GET, 'issue', 1);
		
		$data = array();
		for ($i = 1; $i <= 11; $i++)
		{
			for ($j = $i+1; $j <= 11; $j++)
			{
				$s1 = $i;
				$s2 = $j;
				if ($i < 10) $s1 = '0'.$i;
				if ($j < 10) $s2 = '0'.$j;
				$sql = "SELECT *  FROM `ko_caipiao` WHERE `issue_day` = {$issue}  and find_in_set('{$s1}', ball) and find_in_set('{$s2}', ball)";
				$res = DB::query(2, $sql)->execute();
				
				$data["$s1, $s2"] = $res[1];
				
				$sql2 = "SELECT *  FROM `ko_caipiao` WHERE `issue_day` = {$issue}  and find_in_set('{$s1}', ball) = 0 and find_in_set('{$s2}', ball) = 0";
				$res2 = DB::query(2, $sql2)->execute();
				
				$data2["$s1, $s2"] = $res2[1];
			}
		}
		asort($data);
		asort($data2);
		$count = ORM::factory('caipiao')->where('issue_day', '=', $issue)->count_all();
		
		$this->echo_form($issue+1);
		echo "<b>当前期号：$issue</b><br>";
		echo $count;
		echo "<br />\n";
		//echo array_shift($data);
		echo "<br />\n";
		//echo array_pop($data);
		echo "<br />\n";
		echo "<br />\n";
		
		
		print_r($data);
		echo "<br />\n";
		echo "<br />\n";
		
		print_r($data2);
	}
	function action_calculate2()
	{
		$date = Arr::get($_GET, 'date', date('Y-m-d'));
		
		$data = array();

		for ($i = 1; $i <= 11; $i++)
		{
			for ($j = $i+1; $j <= 11; $j++)
			{
				$s1 = $i;
				$s2 = $j;
				if ($i < 10) $s1 = '0'.$i;
				if ($j < 10) $s2 = '0'.$j;
				$sql = "SELECT *  FROM `ko_caipiao` WHERE `date` = '{$date}' and find_in_set('{$s1}', ball) and find_in_set('{$s2}', ball)";
				$res = DB::query(2, $sql)->execute();
				
				$data["$s1, $s2"] = $res[1];
				
				$sql2 = "SELECT *  FROM `ko_caipiao` WHERE `date` = '{$date}' and find_in_set('{$s1}', ball) = 0 and find_in_set('{$s2}', ball) = 0";
				$res2 = DB::query(2, $sql2)->execute();
				
				$data2["$s1, $s2"] = $res2[1];
			}
		}
		asort($data);
		asort($data2);
		$count = ORM::factory('caipiao')->where('date', '=', $date)->count_all();
		
		$this->echo_form2($date);
		echo "<b>当前期号：$date</b><br>";
		echo $count;
		echo "<br />\n";
		//echo array_shift($data);
		echo "<br />\n";
		//echo array_pop($data);
		echo "<br />\n";
		echo "<br />\n";
		
		
		print_r($data);
		echo "<br />\n";
		echo "<br />\n";
		
		print_r($data2);
	}
	
	function action_calculate3()
	{
		$date = Arr::get($_GET, 'date', date('Y-m-d'));
		
		$data = array();

		for ($i = 1; $i <= 11; $i++)
		{
			for ($j = $i+1; $j <= 11; $j++)
			{
				for ($k = $j+1; $k <= 11; $k++)
				{
					$s1 = $i;
					$s2 = $j;
					$s3 = $k;
					if ($i < 10) $s1 = '0'.$i;
					if ($j < 10) $s2 = '0'.$j;
					if ($k < 10) $s3 = '0'.$k;
					$sql = "SELECT *  FROM `ko_caipiao` WHERE `date` = '{$date}' and find_in_set('{$s1}', ball) and find_in_set('{$s2}', ball) and find_in_set('{$s3}', ball)";
					$res = DB::query(2, $sql)->execute();
					
					$data["$s1, $s2, $s3"] = $res[1];
					
				}
			}
		}
		asort($data);
		$count = ORM::factory('caipiao')->where('date', '=', $date)->count_all();
		
		$this->echo_form3($date);
		echo "<b>当前期号：$date</b><br>";
		echo $count;
		echo "<br />\n";
		//echo array_shift($data);
		echo "<br />\n";
		//echo array_pop($data);
		echo "<br />\n";
		echo "<br />\n";
		
		
		print_r($data);
		echo "<br />\n";
		echo "<br />\n";
		
	}
	
	function echo_form($issue = 1)
	{
		if ($issue == 85) $issue = 1;
		$input = Form::input('issue', $issue);
		$submit = Form::submit('submit', 'Ok');
		$form  = '<form method="get">'.$input.$submit.'</form>'; 
		echo $form;
	}
	function echo_form2($date = 1)
	{
		$input = Form::input('date', $date);
		$submit = Form::submit('submit', 'Ok');
		$form  = '<form method="get">'.$input.$submit.'</form>'; 
		echo $form;
	}
	
	function echo_form3($date = 1)
	{
		$input = Form::input('date', $date);
		$submit = Form::submit('submit', 'Ok');
		$form  = '<form method="get">'.$input.$submit.'</form>'; 
		echo $form;
	}
}