


---

# TODO


* 买入均价（当前持仓）
* 买入均价（历史所有）
  有买入时，计算历史的均价
* 流通市值 / 总市值
* 股力值
* 融资融券
* 定投

## 数据挖掘
* 12个月中，每个月的上涨概率
* 挖掘个股的上涨周期，版块的上涨周期
* 热点

## 利空
* 限售股解禁

## 利好
* 赠送转

---


# 选股
* 换手率
* 涨停板

* 避开大盘股，市值 < 100亿

## 1. 跟庄

## 庄家
* QFII 重仓
* 社保重仓
* 券商重仓

版块 > 大盘风向

## 为什么要跟庄

什么样的股票会没有庄家
* 割完韭菜的股票，未来会持续跌势
* 垃圾股，未来涨幅有限

没有庄家的股票，就表示该股涨幅有限，未来收益不大，需谨慎购买。

什么样的股票会开始有庄家

## 分析
* 股东研究：股东总人数，较上期变化


## 2. 换手率
  
* 换手率 >= 2%

## 3. 市盈率

## 财报


## 技术分析
* MACD 交叉
* 财务概况：营业总收入同比增长率

# 买点
* 均线多头排列

上涨幅度有多少

* MACD
* KDJ
* 建仓

# 卖点
* 均线空头排列
* MACD
* KDJ

分析每笔买卖的盈亏，年收益率等，分析买卖点的对错

# [分价表](http://vip.stock.finance.sina.com.cn/quotes_service/view/cn_price.php?symbol=sz000777)
![img](docs/img/分价表.png)

# [历史分价表](http://vip.stock.finance.sina.com.cn/quotes_service/view/cn_price_history.php?symbol=sz000777)
![img](docs/img/历史分价表.png)



# 盈亏
* 收益率

# 智能投顾
* 降准: 1.利多 2.利空

* 买卖分布
* 按月 买卖成交量
* 新低


# 选股
* 市值 & 流通市值 100亿

* 量比
* 美股影响
* 版块：AI，核能，稀土，芯片，软件，一带一路，军工，医疗，白酒，科创版

---



# [收益率](https://wiki.mbalib.com/zh-tw/%E6%94%B6%E7%9B%8A%E7%8E%87)

收益率（Earnings Rate/Earnings Yield/Rate of Return/Profitability）

## 计算公式

收益率 = 净利润 / 投资金额 * 100%

## [投资收益率](https://baike.baidu.com/item/%E6%8A%95%E8%B5%84%E6%94%B6%E7%9B%8A%E7%8E%87/2724753)

## 总投资收益率（ROI）

## 资本金净利润率（ROE）

# 日收益率
# 周收益率
# 月收益率
# 年收益率
# [年化收益率](https://baike.baidu.com/item/%E5%B9%B4%E5%8C%96%E6%94%B6%E7%9B%8A%E7%8E%87/6238244)

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
* 度量：SUM(volume)

强制维度：customer_id, stock_code, price, deal_type

* WHERE
  - customer_id
  - stock_code
  - status: 未清算|已清算
  - deal_date

### 1.2. SQL

```
SELECT
    customer_id, stock_code, price, deal_type, SUM(volume) AS volume
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
* 多屏联动切换，股票切换时，所有页面的切换到同一只股票
* https://github.com/quantzzh/dlstock/blob/master/deeplearing-stock-github.py
* https://github.com/search?p=4&q=%E8%82%A1%E7%A5%A8&type=Repositories

- 机器学习寻找奇点
- 模型验证

逻辑回归模型预测股票涨跌 => https://www.cnblogs.com/donaldlee2008/p/5595580.html

* [股票量化框架，支持行情获取以及交易](https://github.com/shidenggui/easyquant)


# 历史成交明细

* https://blog.csdn.net/weixin_42163573/article/details/81256348


# 站点
* [东方财富网](http://www.eastmoney.com/)


# 参考文献
* https://github.com/pythonstock/stock
