复利
现金流



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



# 权限


# TODO

- 机器学习寻找奇点
- 模型验证
