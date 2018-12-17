# 换手率

# 买点
* MACD

# 卖点
* MACD

# 盈亏
* 收益率

---

股票建模
股票数据挖掘

复利

1 元买入，10 元卖出，10 倍
1w => 10w
5W => 50W
10W => 100W

5 元买入，10 元卖出，1 倍
1W => 2W
5W => 10W
10W => 20W

现金流




7.85 => 8.1
7.65 => 7.9
7.45 => 7.7
7.25 => 7.5
7.05 => 7.3
6.85 => 7.1

# 价格

## 1. 价格分布：

### 1.1. OLAP

* 维度：customer_id, stock_code, price, deal_type, status, deal_date
* 度量：SUM(quantity|volume)

强制维度：customer_id, stock_code, price, deal_type

* WHERE
  - customer_id
  - stock_code
  - status: 未清算|已清算
  - deal_date

### 1.2. SQL

```
SELECT
    customer_id, stock_code, price, deal_type, SUM(quantity) AS volume
FROM deal
WHERE customer_id = 'customer_id' AND stock_code = '{stock_code}' AND deal_date >= '{start_time}' AND deal_date <= '{end_time}' AND status = '{status}'
GROUP BY customer_id, stock_code, price, deal_type
ORDER BY price;
```

---

# 历史成交

# 盈亏
- 收益率
  - 现金流：流动性
  - 单位时间收益率：3 天盈利 100 元和 30 天盈利 100 元
* 换手率趋势图



# 权限


# TODO

- 机器学习寻找奇点
- 模型验证

逻辑回归模型预测股票涨跌 => https://www.cnblogs.com/donaldlee2008/p/5595580.html
