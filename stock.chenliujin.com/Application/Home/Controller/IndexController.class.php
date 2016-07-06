<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {


	/**
	 * @authro chenliujin <liujin.chen@qq.com>
	 * @since 2016-06-22
	 */
	public function index()
	{
		$params = array(
			'status'	=> 1
		);

		$stock = new \stock;
		$list = $stock->findAll($params);

		$this->assign('stock_list', $list);
		$this->display();
    }

}
