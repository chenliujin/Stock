
# 查询

## URL: /v1/stock/price_distribute/

## Method: GET

## Params:
- stock_code
- starttime
- endtime
- status

## return:

```
{
  "status": 0,
  "data": [
    {
      "price": 6.00,
      "B": 1000,
      "S": 200
    },
    {
      "price": 7.00,
      "B": 0,
      "S": 10
    }
  ]
}
```
