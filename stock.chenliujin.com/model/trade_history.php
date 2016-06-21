<?php

class trade_history extends Model
{
	public static function getTableName()
	{
		return 'stock.trade_history';
	}

	/**
	 * @author chenliujin <liujin.chen@qq.com>
	 * @since 2015-10-14
	 */
	public function getPrimaryKey()
	{
		return array('id');
	}

	/*
	 * by chenliujin
	 * at 2011-11-16
	 */
	public static function getAll(array $params)
	{
		$where = array();
		$where_array = array();
		foreach ($params as $field => $value) {
			switch ($field) {
			case 'id':
				$where[] = 'id = ?';
				$where_array[] = $value; 
				break;

			case 'stock_id':
				$where[] = 'stock_id = ?';
				$where_array[] = $value; 
				break;

			case 'trade_type':
				$where[] = 'trade_type = ?';
				$where_array[] = $value;
				break;

			case 'status':
				$where[] = 'status = ?';
				$where_array[] = $value;
				break;
			}
		}

		return Model::$dbo->findAll();
	}
}

?>
