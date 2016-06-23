<?php
namespace Stock\Controller;
use Think\Controller;

class PriceDistributeController extends Controller
{
	/**
	 * @author chenliujin <liujin.chen@qq.com>
	 * @since 2015-05-15
	 */
	public function index()
	{
		$this->display();
	}

	public function data()
	{
		$params = array(
			'stock_id' => $_GET['stock_id']
		);

		$price_distribute = new \price_distribute;
		$list = $price_distribute->getAll($params);

		foreach ($list as $price_distribute) {
			$data['B'][$price_distribute->price] = -$price_distribute->buy;
			$data['S'][$price_distribute->price] = $price_distribute->sale;
		}

		$this->assign('data', $data);
		$this->display();
	}

}
