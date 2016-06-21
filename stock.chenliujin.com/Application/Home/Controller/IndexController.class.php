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
		$stock = new \stock;
		$list = $stock->findAll();

		$this->assign('stock_list', $list);
		$this->display();
    }

}
