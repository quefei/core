# Quefei Core




## （一）安装



### 1. 安装：


```php
  composer require quefei/core
```



### 2. 注册：


在 `config/app.php` 文件的 `providers` 数组中加入：

```php
  Quefei\AliyunMns\Providers\AliyunMnsServiceProvider::class,
  Quefei\AliyunDm\Providers\AliyunDmServiceProvider::class,
  Quefei\Myauth\Providers\MyauthServiceProvider::class,
```


在 `config/app.php` 文件的 `aliases` 数组中加入：

```php
  'MNS' => Quefei\AliyunMns\Facades\MNS::class,
  'DM' => Quefei\AliyunDm\Facades\DM::class,
```



### 3. 生成配置文件：


```php
  php artisan vendor:publish
```



### 4. 生成 Myauth 所需文件：


```php
  php artisan make:myauth --force
```



### 5. 运行迁移：


```php
  php artisan migrate
```




## （二）配置



### 1. 环境配置：


在 `.env` 文件中加入以下，它们的值从阿里云的 `控制台` 获取：

```php
  /**
   * 加入以下
   * 
   */
   
  ALIYUN_ACCESS_KEY_ID=
  ALIYUN_ACCESS_KEY_SECRET=
  ALIYUN_MNS_ENDPOINT=
  ALIYUN_MNS_TOPIC_NAME=
  ALIYUN_SEND_ADDRESS=
  ALIYUN_SENDER=
  ALIYUN_MAIL_TAG=
  
  
  
  /**
   * 例如（假设的值）
   * 
   */
  // 短信服务与邮件推送
  ALIYUN_ACCESS_KEY_ID=L6d644013c2414ab                                        // Access Key ID
  ALIYUN_ACCESS_KEY_SECRET=Tb2ed79818ac6498f72c45bf0b17d0                      // Access Key Secret
  
  // 短信服务
  ALIYUN_MNS_ENDPOINT=http://1234567890123456.mns.cn-shenzhen.aliyuncs.com     // Mns Endpoint
  ALIYUN_MNS_TOPIC_NAME=sms.topic-cn-shenzhen                                  // 主题名称
  
  // 邮件推送
  ALIYUN_SEND_ADDRESS=service@mail.dongfang.com                                // 发信地址
  ALIYUN_SENDER=东方公司                                                        // 发件人（用户自定义）
  ALIYUN_MAIL_TAG=service                                                      // 邮件标签
```




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

