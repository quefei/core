# Quefei Core




## （一）安装



### 1. 安装：


```php
  composer require quefei/aliyunmns
```



### 2. 注册：


在 `config/app.php` 文件的 `providers` 数组中加入：

```php
  Quefei\AliyunMns\Providers\AliyunMnsServiceProvider::class,
```


在 `config/app.php` 文件的 `aliases` 数组中加入：

```php
  'MNS' => Quefei\AliyunMns\Facades\MNS::class,
```



### 3. 生成配置文件：


```php
  php artisan vendor:publish
```



### 4. 环境配置：


在 `.env` 文件中加入以下，它们的值从阿里云的 `控制台` 获取：

```php
  /**
   * 加入以下
   */
   
  ALIYUN_ACCESS_KEY_ID=
  ALIYUN_ACCESS_KEY_SECRET=
  ALIYUN_MNS_ENDPOINT=
  ALIYUN_MNS_TOPIC_NAME=
  
  
  
  /**
   * 列如（假设的值）
   */
   
  ALIYUN_ACCESS_KEY_ID=L6d644013c2414ab
  ALIYUN_ACCESS_KEY_SECRET=Tb2ed79818ac6498f72c45bf0b17d0
  ALIYUN_MNS_ENDPOINT=http://1234567890123456.mns.cn-shenzhen.aliyuncs.com
  ALIYUN_MNS_TOPIC_NAME=sms.topic-cn-shenzhen
```




## （二）配置




## （二）使用



手机号码、短信签名、短信模板是 `字符串`，模板参数是数组的 `键值对`：

```php
  /**
   * 导入
   */
   
  use Quefei\AliyunMns\Facades\MNS;
  
  
  
  /**
   * 使用
   */
   
  // 一个模板参数时
  MNS::send("手机号码", "短信签名", "短信模板", ["模板参数的键" => "模板参数的值"]);
  
  // 多个模板参数时
  MNS::send("手机号码", "短信签名", "短信模板", ["键" => "值", "键" => "值", "键" => "值"]);
  
  // 没有模板参数时
  MNS::send("手机号码", "短信签名", "短信模板");
  
  
  
  /**
   * 列如
   */
  
  MNS::send("13688889999", "东方公司", "SMS_12345678", ["customer" => "东方用户"]);
```

