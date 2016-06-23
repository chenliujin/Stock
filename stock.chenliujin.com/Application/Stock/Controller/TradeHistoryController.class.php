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
		$params = array();

		if (!empty($_GET['stock_code'])) {
			$params['stock_code'] = $_GET['stock_code'];
		}

		$trade_history = new \trade_history;
		$list = $trade_history->findAll($params);

		$this->assign('trade_history_list', $list);

		$this->display();
	}


	public function create()
	{
		$this->display();
	}


	/**
	 * @author chenliujin <liujin.chen@qq.com>
	 * @since 2016-06-21
	 */
	public function store()
	{
		if (empty($_REQUEST['stock_code'])) {
			exit('404');
		}

		$stock_code		= $_POST['stock_code'];
		$deal_day		= $_POST['deal_day'];
		$deal_type		= $_POST['deal_type'];
		$quantity		= intval($_POST['quantity']);
		$price			= $_POST['price'];
		$poundage		= $_POST['poundage'];
		$transfer_fee	= $_POST['transfer_fee'];
		$stamp_tax		= $_POST['stamp_tax'];

		$amount = $quantity * $price;
		switch ($deal_type) {
		case 'buy':
			$amount += $poundage;
			$amount += $transfer_fee;
			$amount = -$amount;
			break;

		case 'sale':
			$amount -= $poundage;
			$amount -= $transfer_fee;
			$amount -= $stamp_tax;
			break;
		}

		$trade_history = new \trade_history;
		$trade_history->stock_code		= $stock_code; 
		$trade_history->deal_day		= $deal_day; 
		$trade_history->deal_type		= $deal_type; 
		$trade_history->quantity		= $quantity;
		$trade_history->price			= $price; 
		$trade_history->stamp_tax		= $stamp_tax; 
		$trade_history->poundage		= $poundage; 
		$trade_history->transfer_fee	= $transfer_fee;
		$trade_history->amount			= $amount;
		$trade_history->date_added		= date('Y-m-d H:i:s');
		$rs = $trade_history->insert();

		if ($rs) {
			$params = array(
				'stock_code'	=> $stock_code,
				'price'			=> $price
			);
			$price_distribute = new \price_distribute;
			$result = $price_distribute->findAll($params);
			if (empty($result)) {
				switch ($deal_type) {
				case 'buy':
					$price_distribute->buy	= $quantity;
					$price_distribute->sale	= 0;
					break;
				case 'sale':
					$price_distribute->buy	= 0; 
					$price_distribute->sale	= $quantity;
					break;
				}

				$price_distribute->stock_code 	= $stock_code;
				$price_distribute->price		= $price;
				$price_distribute->date_added	= date('Y-m-d H:i:s');
				$price_distribute->insert();
			} else {
				$price_distribute = $result[0];

				switch ($deal_type) {
				case 'buy':
					$price_distribute->buy += $quantity;
					break;
				case 'sale':
					$price_distribute->sale	+= $quantity;
					break;
				}

				$price_distribute->update();
			}

			redirect('/index.php?m=Stock&c=TradeHistory&stock_code=' . $stock_code);
		} else {
			exit('error');
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
		$stock_code 	= $_POST['stock_code'];
		$deal_day		= $_POST['deal_day'];
		$deal_type		= $_POST['deal_type'];
		$quantity		= $_POST['quantity'];
		$price			= $_POST['price'];
		$poundage		= $_POST['poundage'];
		$transfer_fee	= $_POST['transfer_fee'];
		$stamp_tax		= $_POST['stamp_tax'];

		$amount = abs($quantity) * $price;
		switch ($deal_type) {
		case 'buy':
			$amount += $poundage;
			$amount += $transfer_fee;
			$amount = -$amount;
			break;

		case 'sale':
			$amount -= $poundage;
			$amount -= $transfer_fee;
			$amount -= $stamp_tax;

			$quantity = -abs($quantity);
			break;
		}

		$params = array(
			'id'	=> intval($_POST['id'])
		);

		$trade_history = new \trade_history;
		$trade_history = $trade_history->get($params);

		$trade_history->stock_code		= $stock_code;
		$trade_history->deal_day		= $deal_day;
		$trade_history->deal_type		= $deal_type;
		$trade_history->quantity		= $quantity;
		$trade_history->price			= $price;
		$trade_history->transfer_fee	= $transfer_fee;
		$trade_history->stamp_tax		= $stamp_tax;
		$trade_history->poundage		= $poundage;
		$trade_history->amount			= $amount;

		$rs = $trade_history->update();

		if ($rs) {
			redirect('/index.php?m=Stock&c=TradeHistory&stock_code=' . $stock_code);
		} else {
			exit('error');
		}
	}

}
	
