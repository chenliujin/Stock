<?php
namespace Stock\Controller;
use Think\Controller;

class TradeHistoryController extends Controller
{
	/**
	 * @author chenliujin <liujin.chen@qq.com>
	 * @since 2016-06-20
	 */
	public function index()
	{
		$trade_history = new \trade_history;
		$list = $trade_history->findAll();

		$this->assign('trade_history_list', $list);

		$this->display();
	}


	public function create()
	{
		$this->display();
	}


	public function store()
	{
		if (empty($_REQUEST['stock_id'])) {
			exit('404');
		}

		$trade_history = new \trade_history;
		$trade_history->stock_id = $_REQUEST['stock_id'];
		$trade_history->trade_day = $_REQUEST['trade_day'];
		$trade_history->trade_type = strtoupper($_REQUEST['trade_type']);
		$trade_history->num = intval($_REQUEST['num']);
		$trade_history->price = $_REQUEST['price'];
		$trade_history->poundage = $_REQUEST['poundage']; 
		$trade_history->transfer_fee = $_REQUEST['transfer_fee'];
		$trade_history->stamp_tax = $trade_history->trade_type == 'S' ? $trade_history->total * 0.001 : 0; 
		$trade_history->created_at = date('Y-m-d H:i:s');
		$trade_history->modified_at = date('Y-m-d H:i:s');
		$rs = $trade_history->insert();
        if ($rs) {
			echo $rs;
        }
	}


	/**
	 * @author chenliujin <liujin.chen@qq.com>
	 * @since 2015-10-13
	 */
	public function edit()
	{
		$id = intval($_REQUEST['id']);

		$trade_history = new \trade_history;
		$trade_history = $trade_history->get($id);

		$this->assign('trade_history', $trade_history);
		$this->display();

	}


	/**
	 * @author chenliujin <liujin.chen@qq.com>
	 * @since 2015-10-13
	 */
	public function update()
	{
		echo '>>>>>>>>>>';
		echo '<pre>';
		print_r($_REQUEST);
	}

}
	