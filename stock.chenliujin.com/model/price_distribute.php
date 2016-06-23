<?php

class price_distribute extends Model
{
	/**
	 * @author chenliujin <liujin.chen@qq.com>
	 * @since 2015-09-20
	 */
	public static function getTableName()
	{
		return 'stock.price_distribute';
	}


	/**
	 * @author chenliujin <liujin.chen@qq.com>
	 * @since 2016-06-22
	 */
	public function getPrimaryKey()
	{
		return array('id');
	}

	/**
	 * @author chenliujin <liujin.chen@qq.com>
	 * @since 2015-09-20
	 */
	public static function getAll(array $params)
	{
		$sql = "
			SELECT * 
			FROM " . self::GetTableName() . "";

		foreach ($params as $field => $value) {
			switch ($field) {
			default:
				$where[] = $field . ' = ?';
				$where_array[] = $value; 
				break;
			}
		}

		$sql .= !empty($where) ? ' WHERE ' . implode(' AND ' , $where) : '';
		$sql .= " ORDER BY price";

		return self::Query($sql, $where_array); 
	}
}

?>
