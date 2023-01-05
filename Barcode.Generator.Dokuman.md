

## API Referans

Bu kitaplık, doğrusal ve iki boyutlu barkodlar oluşturmak için yardımcı PHP sınıfları içerir:

#### Get Method

```http
  GET /createBarcode
```


#### Request Parametreler

| Parametre | Tip      | Açıklama                |
| :-------- | :-------  | :------------------------- |
| `type`    | `string`  | * Barkod tipi  |
| `value`   | `string`  | * Barkod okunduğunda çıkan değer  |
| `value`   | `string`  | * Barkod okunduğunda çıkan değer  |
| `width`   | `integer` | * Barkod genişlik (çarpma faktörü olarak mutlak veya negatif değer kullanın) |
| `height`  | `integer` | * Barkod yükseklik (çarpma faktörü olarak mutlak veya negatif değer kullanın)|
| `color`   | `string`  | * barkod rengi|
| `backgroundColor` | `string` | * barkod arkaplan rengi |
| `output`          | `string` | * barkod çıktı türü (pngBase64,getSvgCode,getHtmlDiv,getGrid)|
| `grid2Value`    | `string` | Barkod grid çıktı türünü değeri özel ise ek olarak parametre kulanılabilir. |



#

#### Response Parametreler

| Parametre | Tip      | Açıklama                |
| :-------- | :-------  | :------------------------- |
| `status`    | `string`  | * servis sonucu iki değer alır ("success","error")  |
| `data`   | `object`  | * request gönderilen ouput, içinde çıktı sonucunu verir |
| `message`   | `string` | * işlem hatalı ise hata mesajını döner) |

