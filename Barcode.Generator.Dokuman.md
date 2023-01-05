

## API Referans


#Bu kitaplık, doğrusal ve iki boyutlu barkodlar oluşturmak için yardımcı PHP sınıfları içerir:

| Barkod Tipi | Açıklama     |
| :-------- | :------- |
|C39 | KOD 39 - ANSI MH10.8M-1983 - USD-3 - 3/9|
|C39+ | Sağlama toplamlı KOD 39|
|C39E | KOD 39 GENİŞLETİLMİŞ|
|C39E+ | KOD 39 GENİŞLETİLMİŞ + SAĞLAMA TOPLAMI|
|C93 | KOD 93 - USS-93|
|S25 | Standart 2/5|
|S25+ | Standart 2/5 + SAĞLAMA TOPLAM|
|I25 | Aralıklı 2/5|
|I25+ | Aralıklı 2/5 + Sağlama Toplamı|
|C128 | KOD 128|
|C128A | KOD 128A|
|C128B | KOD 128 B|
|C128C | KOD 128 C|
|EAN2 | 2 Haneli UPC Tabanlı Uzantı|
|EAN5 | 5 Haneli UPC Tabanlı Uzantı|
|EAN8 | EAN 8|
|EAN13 | EAN 13|
|UPCA | UPC-A|
|UPCE | UPC-E|
|MSI | MSI (Plessey kodunun varyasyonu)|
|MSI+ | MSI + SAĞLAMA TOPLAMI (modulo 11)|
|POSTNET | POSTNET|
|PLANET | gezegen|
|RMS4CC | RMS4CC (Royal Mail 4 Durumlu Müşteri Kodu) - CBC (Müşteri Barkodu)|
|KIX | KIX (Klant dizini - Müşteri dizini)|
|IMB | IMB - Akıllı Posta Barkodu - Tek kod - USPS-B-3200|
|IMBPRE | IMB - Akıllı Posta Barkodu - Tek kod - USPS-B-3200- önceden işlenmiş|
|CODABAR | KODABAR|
|CODE11 | KOD 11|
|PHARMA | FARMAKOD|
|PHARMA2T | FARMAKOD İKİ İZLİ|
|DATAMATRIX | VERİ MATRİSİ (ISO/IEC 16022)|
|PDF417 | PDF417 (ISO/IEC 15438/2006)|
|QRCODE | QR-KODU|
|RAW | 2B HAM MOD virgülle ayrılmış satırlar|
|RAW2 | 2D RAW MOD satırları köşeli parantezler içine alınır|


| Çıktı Türleri| Çıktı Türleri |
|  :--------  | :-------- |
|pngBase64|PNG resmi|
|getSvgCode|SVG Resmi|
|getHtmlDiv|HTML DIV'si|
|getGrid|Unicode Dizisi|
|getGrid:grid2Value|İkili Dizi|

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

