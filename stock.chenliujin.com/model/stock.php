<?php

class stock extends Model
{
	/**
	 * @author chenliujin <liujin.chen@qq.com>
	 * @since 2016-06-22
	 */
	public static function getTableName()
	{
		return 'stock.stock';
	}


	/**
	 * @author chenliujin <liujin.chen@qq.com>
	 * @since 2016-06-22
	 */
	public function getPrimaryKey()
	{
		return array('id');
	}
}

?>
