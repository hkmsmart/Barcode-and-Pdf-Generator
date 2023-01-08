

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
| `width`   | `integer` | * Barkod genişlik (çarpma faktörü olarak mutlak veya negatif değer kullanın) |
| `height`  | `integer` | * Barkod yükseklik (çarpma faktörü olarak mutlak veya negatif değer kullanın)|
| `color`   | `string`  | * barkod rengi|
| `backgroundColor` | `string` | * barkod arkaplan rengi |
| `padding` | `string` | * barkod dış boşluk "-2, -2, -2, -2" (çarpma faktörü olarak mutlak veya negatif değer kullanın) |
| `output`          | `string` | * barkod çıktı türü (pngBase64,getSvgCode,getHtmlDiv,getGrid,getGridCustom)|
| `grid2Value`    | `string` | Barkod getGridCustom çıktı türünü değeri özel ise ek olarak parametre kulanılabilir. |



#

#### Response Parametreler ,HttpCode:400

| Parametre | Tip      | Açıklama                |
| :-------- | :-------  | :------------------------- |
| `status`    | `string`  | * servis sonucu iki değer alır ("success","error")  |
| `data`   | `object`  | * request gönderilen ouput, içinde çıktı sonucunu verir |
| `message`   | `string` | * işlem hatalı ise hata mesajını döner) |


## Örnek Kullanım  / Request & Response
#Not


[BASE64 çıktılarını fotoğraf olarak görmek için, output değerini kopyalayıp linkte açılan siteye yapıştırınız.](https://codebeautify.org/base64-to-image-converter)

[SGV çıktılarını fotoğraf olarak görmek için, output değerini kopyalayıp linkte açılan siteye yapıştırınız.](https://www.svgviewer.dev/svg-to-png)

[HTML çıktılarını fotoğraf olarak görmek için, output değerini kopyalayıp linkte açılan siteye yapıştırınız.](https://codebeautify.org/htmlviewer)

[getGrid "Binary" çıktılarını fotoğraf olarak görmek için, output kopyalayıp kopyalaıyıp linkte açılan siteye yapıştırınız.](https://www.dcode.fr/binary-image)

#
#EndPoint: http://localhost/PdfAndBarcodes/public

#QRCODE barcode, output:pngBase64
```Request
GET: /createBarcode
#Request
{
    "type":"QRCODE",
    "value":"0123456789-Test",
    "width":-4,
    "height":-4,
    "color":"black",
    "backgroundColor":"white",
    "padding": "0,0,0,0",
    "output":"pngBase64"
}
#Response
{
    "status": "success",
    "data": {
        "pngBase64": "iVBORw0KGgoAAAANSUhEUgAAAFQAAABUAQMAAAAmpYKCAAAABlBMVEXw8PAAAAB+p+YsAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAAiklEQVQokZWS0RGAMAxC2YD9t2SDGBL1/JN6PfN+0kAoqkqCXJCw0EfakrBbKe0NIeuMyQNuUXwkBjze9dnDD/vbPyKu1oW6ZwVMS6tNJGGxy/ZHzHL/TMxY7i30fiMe77OsjHfBfQUznuxGITJ2dO2G91tNuDxHiBl2T2W81t93+Mf27iSqswv4AvwKQOvQM3aWAAAAAElFTkSuQmCC"
    }
}
```

#QRCODE,H,ST,0,0 barcode, 'QR-CODE WITH PARAMETERS' output:pngBase64
```Request
GET: /createBarcode
#Request
{
    "type":"QRCODE,H",
    "value":"https://github.com/hkmsmart/Barcode-and-Pdf-Generator/blob/main/Barcode.Generator.Dokuman.md",
    "width":-4,
    "height":-4,
    "color":"black",
    "backgroundColor":"white",
    "padding": "0,0,0,0",
    "output":"pngBase64"
}
#Response
{
    "status": "success",
    "data": {
        "pngBase64": "iVBORw0KGgoAAAANSUhEUgAAANQAAADUAQMAAADeEJ9bAAAABlBMVEXw8PAAAAB+p+YsAAAACXBIWXMAAA7EAAAOxAGVKw4bAAACi0lEQVRYhbWYyZGEQAwE5YH891IeaLqyGvazT4qYgyGZQKh1lKjdnV5vXdPVWzulw5VgU+fV032+R199jqwPR9ieI9uDST3nvOJ9DsfYudnm+sJn55wSZSMX6/rH3ccNc287wwoLdNe8dOPPEiSYguaf7Y2zr5m2YWUJWR2u4/B3+5wpNc7v7sbXqx08nWE6qp3WujZQRjV+CTB96ofuvW2SzjgfFWHDL51AADcOVyArhAPsGMApFLpjA7Y5gSLMfj54iziCcf8hRiZSwknLInfqloQAa+zZm4yrs0beVklIMLrUuE0NfpddlPQEKy0l2TH6KJvULgcBxtWbcu66cEyiV6UY+biUPO+qW9nzCaZsJDVUYnusO8jWEMMgHabSyYKz3PrPRNioGKwb5K7d7hCrDENHOTGQNnr3LUgB1qQluT/28tOgK8KQUkVq7hVVQx0ng75nt/OunDvj0sPWISYLaE3zVO+1fRmmNdXe4/XVSjfVL8LQNWPhTVlvl4WeDIN0WWjMVTq7V7pFmPXGIqT2mZ1UexKMOUYhJQ9fOSf3T4hpPptH/VrMtfXwRFhfRdMkJjMUWof6GmB/4uYKmps/HgK+Z4ydni72NhBaVs1EmK995UU7mPB8iD2qV8vpwJJqtA8SjCZPbUWZDs2DdlIR5gq+DBV+mtAecDrEpJ1c7MoZ4jy1DA+wplUwQVX7IYKcvSFGiiw27Y1iBTS+SDDrXmLWhU633a8Q+Z5dyW2tPzyI4rlMZ5ivOm8pZSQda/8EG794ykWLov4gTzNMUg2tgcyvd4JC2mQY+bmPCY4i7j3EZu/wS4taT903bz5nfuhKgbv+ZbzoZ20/Zgzat0ERQJoOt944+5j9ALtP2bKo6rWdAAAAAElFTkSuQmCC"
    }
}
```

#DATAMATRIX barcode, output:pngBase64
```Request
GET: /createBarcode
#Request
{
    "type":"DATAMATRIX",
    "value":"0123456789",
    "width":-4,
    "height":-4,
    "color":"black",
    "backgroundColor":"white",
    "padding": "0,0,0,0",
    "output":"pngBase64"
}
#Response
{
    "status": "success",
    "data": {
        "pngBase64": "iVBORw0KGgoAAAANSUhEUgAAADAAAAAwAQMAAABtzGvEAAAABlBMVEXw8PAAAAB+p+YsAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAAQElEQVQYlXXOyREAMAgCQDqg/y7pgBDeqDPuxwtqYGIa5EZ2Og5IyQeZtzb+yU2a0LLIR+DGzGqcyLzo0U1j8gAZVrJdhO0SZAAAAABJRU5ErkJggg=="
    }
}
```

#DATAMATRIX,R barcode, 'DATAMATRIX Rectangular (ISO/IEC 16022) RECTANGULAR' output:pngBase64
```Request
GET: /createBarcode
#Request
{
    "type":"DATAMATRIX,R",
    "value":"0123456789012345678901234567890123456789",
    "width":-4,
    "height":-4,
    "color":"black",
    "backgroundColor":"white",
    "padding": "0,0,0,0",
    "output":"pngBase64"
}
#Response
{
    "status": "success",
    "data": {
        "pngBase64": "iVBORw0KGgoAAAANSUhEUgAAAJAAAABAAQMAAADPtmzUAAAABlBMVEXw8PAAAAB+p+YsAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAAoElEQVQ4jaWTwQ3AIAwDvUH23zIbpGdT9dNfQAKUi2SIA+rf0BpNjYoxPV1SE65RD0F1sZAuogvE5hOSRZzMHlmZ2axNRtojlCn7BGhj4B6hLPZ46VTKXiI72ACk3Y84uUWUOxan/PqcWCJry11NgycnblFHWeVe5LLaI/uGbU5M7l0XqM8vOMRv5AL5kaQZSuUzN2je7+Vz/EEv0G+s0QNQFdbr2I8hlgAAAABJRU5ErkJggg=="
    }
}
```

#DATAMATRIX,S,GS1 barcode, 'GS1 DATAMATRIX (ISO/IEC 16022) SQUARE GS1' output:pngBase64
```Request
GET: /createBarcode
#Request
{
    "type":"DATAMATRIX,S,GS1",
    "value":"chr(232).'01095011010209171719050810ABCD1234'.chr(232).'2110",
    "width":-4,
    "height":-4,
    "color":"black",
    "backgroundColor":"white",
    "padding": "0,0,0,0",
    "output":"pngBase64"
}
#Response
{
    "status": "success",
    "data": {
        "pngBase64": "iVBORw0KGgoAAAANSUhEUgAAAGgAAABoAQMAAAAn0ifiAAAABlBMVEXw8PAAAAB+p+YsAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAAxklEQVQ4jZWU0Q3EMAxC2cD7b+kNOCB30n2aRm3yKpUkmBT7f6EhLkEg/Z04+nZ2x31B6jiDIBsCqKGmzxLuZA03wmJ3GjeKdTdkazTcLOFOXmpEQKIg+5tpBVOQqrKMU07BneTuK4pGU5AyI5tUE0zEzuS4WYZe9502W7W3EmxIMdCWrfDErgR3a6u4DdE2vYpMQ4m3gvA9V2eSOT5Syo9PVUPjzSbkDemR4uRgFfR+TXjhKyglscIv8zdiau+X8augv+tOH//I7Wtteh1wAAAAAElFTkSuQmCC"
    }
}
```

#DATAMATRIX,R,GS1 barcode, 'GS1 DATAMATRIX (ISO/IEC 16022) RECTANGULAR GS1' output:pngBase64
```Request
GET: /createBarcode
#Request
{
    "type":"DATAMATRIX,R,GS1",
    "value":"chr(232).'01095011010209171719050810ABCD1234'.chr(232).'2110",
    "width":-4,
    "height":-4,
    "color":"black",
    "backgroundColor":"white",
    "padding": "0,0,0,0",
    "output":"pngBase64"
}
#Response
{
    "status": "success",
    "data": {
        "pngBase64": "iVBORw0KGgoAAAANSUhEUgAAAMAAAABAAQMAAAB2ouqcAAAABlBMVEXw8PAAAAB+p+YsAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAAvUlEQVQ4ja2Uyw2AMAxDvYH33zIbBNuBIzcXqS15kZwfYH4WqmBnsSDhC3eGtKEIltKhxAhoW7lSTtMElvJFortUDHLSsVUAOKdJajkVBVzEIrA0k6eycz0dAVgFzANtbpezDKyCHB4KWfEeMfTARv9SHPfMu8WLwCOnCDzOMiQ9hhSBNZUYozf7BuStB2zE3IBt2sP7WptAn4yK6Jcr6LqIaVkPnF5+M/a5cUh1a8DtP6U4Od/v79MDP6sIHne2P0YM60/SAAAAAElFTkSuQmCC"
    }
}
```

#LRAW barcode, '1D RAW MODE (comma-separated rows of 01 strings)' output:pngBase64
```Request
GET: /createBarcode
#Request
{
    "type":"LRAW",
    "value":"0101010101",
    "width":-4,
    "height":-4,
    "color":"black",
    "backgroundColor":"white",
    "padding": "0,0,0,0",
    "output":"pngBase64"
}
#Response
{
    "status": "success",
    "data": {
        "pngBase64": "iVBORw0KGgoAAAANSUhEUgAAACgAAAAEAQMAAADGXu9jAAAABlBMVEXw8PAAAAB+p+YsAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAADklEQVQImWPgBwEGDBIADigBLWdDS4sAAAAASUVORK5CYII="
    }
}
```


#SRAW barcode, '2D RAW MODE (comma-separated rows of 01 strings)' output:pngBase64
```Request
GET: /createBarcode
#Request
{
    "type":"SRAW",
    "value":"0101,1010",
    "width":-4,
    "height":-4,
    "color":"black",
    "backgroundColor":"white",
    "padding": "0,0,0,0",
    "output":"pngBase64"
}
#Response
{
    "status": "success",
    "data": {
        "pngBase64": "iVBORw0KGgoAAAANSUhEUgAAABAAAAAIAQMAAADKuO3UAAAABlBMVEXw8PAAAAB+p+YsAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAAEUlEQVQImWPg52eAow8f4AgANYgH+SBkrYsAAAAASUVORK5CYII="
    }
}
```


#PDF417 barcode, 'PDF417 (ISO/IEC 15438:2006)' output:pngBase64
```Request
GET: /createBarcode
#Request
{
    "type":"PDF417",
    "value":"0123456789",
    "width":-4,
    "height":-4,
    "color":"black",
    "backgroundColor":"white",
    "padding": "0,0,0,0",
    "output":"pngBase64"
}
#Response
{
    "status": "success",
    "data": {
        "pngBase64": "iVBORw0KGgoAAAANSUhEUgAAAWgAAABMAQMAAAB6Yb8CAAAABlBMVEXw8PAAAAB+p+YsAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAA4ElEQVRIie2WwQ2AMAwDs4H33zIbBNuFZ3giP4hEoe714SapqPrj2xgGgMJ0N4fSmwMFynMIKlzMpQsSBFObsz+d5pJA0fxAS+RkcZlDz2PMJlvbKc12JjF0CynJ9gZV1VBOp+2S+FDmOuAs9duZRNB35deUmoL+cLKUTkuTz0bP3Q0yu55JCk1Tqn165BtuBPlcqiqJFlRyqbRY4NeSnRzaVaUuHpWWdsrk3vM5NA2OqkpN4AQpNd6dTKP8eJ2EJ8rNlssU2lL5xjwlZQH730wQ7Ru+fO8cy05VJP3Hl3EBT5q6yDK36q8AAAAASUVORK5CYII="
    }
}
```

#C128A barcode, output:pngBase64
```Request
GET: /createBarcode
#Request
{
    "type":"C128A",
    "value":"0123456789",
    "width":-3,
    "height":-30,
    "color":"black",
    "backgroundColor":"white",
    "padding":"-2,-2,-2,-2",
    "output":"pngBase64"
}
#Response
{
    "status": "success",
    "data": {
        "pngBase64": "iVBORw0KGgoAAAANSUhEUgAAAb8AAACWAQMAAAB0CRR7AAAABlBMVEXw8PAAAAB+p+YsAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAAY0lEQVRoge3LsQnAIBBAUeEKO7NAwFHcLMYFkpWucw1XsLOQXMgMQqr/yg/fOQAAAADAMukqRe3WlnUefoYk94hfqTP4lqs8KXbbN7VSWx52JZdrPBkZGRkZGf8bAQAAAADLXvn8p5J1VEufAAAAAElFTkSuQmCC"
    }
}

```

#C128B barcode, output:getSvgCode
```Request
GET: /createBarcode
#Request
{
    "type":"C128B",
    "value":"0123456789",
    "width":-3,
    "height":-30,
    "color":"black",
    "backgroundColor":"white",
    "padding":"-2,-2,-2,-2",
    "output":"getSvgCode"
}
#Response
{
    "status": "success",
    "data": {
        "getSvgCode": "<?xml version='1.0' standalone='no' ?><!DOCTYPE svg PUBLIC '-//W3C//DTD SVG 1.1//EN' 'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg width='447.000000' height='150.000000' viewBox='0 0 447.000000 150.000000' version='1.1' xmlns='http://www.w3.org/2000/svg'><desc>0123456789</desc><rect x='0' y='0' width='447.000000' height='150.000000' fill='#f0f0f0' stroke='none' stroke-width='0' stroke-linecap='square' /><g id='bars' fill='#000000' stroke='none' stroke-width='0' stroke-linecap='square'><rect x='6.000000' y='60.000000' width='6.000000' height='30.000000' /><rect x='15.000000' y='60.000000' width='3.000000' height='30.000000' /><rect x='24.000000' y='60.000000' width='3.000000' height='30.000000' /><rect x='39.000000' y='60.000000' width='3.000000' height='30.000000' /><rect x='48.000000' y='60.000000' width='9.000000' height='30.000000' /><rect x='60.000000' y='60.000000' width='6.000000' height='30.000000' /><rect x='72.000000' y='60.000000' width='3.000000' height='30.000000' /><rect x='81.000000' y='60.000000' width='9.000000' height='30.000000' /><rect x='96.000000' y='60.000000' width='6.000000' height='30.000000' /><rect x='105.000000' y='60.000000' width='6.000000' height='30.000000' /><rect x='117.000000' y='60.000000' width='9.000000' height='30.000000' /><rect x='132.000000' y='60.000000' width='3.000000' height='30.000000' /><rect x='138.000000' y='60.000000' width='6.000000' height='30.000000' /><rect x='150.000000' y='60.000000' width='3.000000' height='30.000000' /><rect x='156.000000' y='60.000000' width='9.000000' height='30.000000' /><rect x='171.000000' y='60.000000' width='6.000000' height='30.000000' /><rect x='183.000000' y='60.000000' width='3.000000' height='30.000000' /><rect x='192.000000' y='60.000000' width='9.000000' height='30.000000' /><rect x='204.000000' y='60.000000' width='6.000000' height='30.000000' /><rect x='213.000000' y='60.000000' width='9.000000' height='30.000000' /><rect x='228.000000' y='60.000000' width='3.000000' height='30.000000' /><rect x='237.000000' y='60.000000' width='6.000000' height='30.000000' /><rect x='249.000000' y='60.000000' width='9.000000' height='30.000000' /><rect x='261.000000' y='60.000000' width='3.000000' height='30.000000' /><rect x='270.000000' y='60.000000' width='9.000000' height='30.000000' /><rect x='282.000000' y='60.000000' width='6.000000' height='30.000000' /><rect x='291.000000' y='60.000000' width='9.000000' height='30.000000' /><rect x='303.000000' y='60.000000' width='9.000000' height='30.000000' /><rect x='315.000000' y='60.000000' width='3.000000' height='30.000000' /><rect x='324.000000' y='60.000000' width='6.000000' height='30.000000' /><rect x='336.000000' y='60.000000' width='9.000000' height='30.000000' /><rect x='351.000000' y='60.000000' width='3.000000' height='30.000000' /><rect x='357.000000' y='60.000000' width='6.000000' height='30.000000' /><rect x='369.000000' y='60.000000' width='6.000000' height='30.000000' /><rect x='387.000000' y='60.000000' width='3.000000' height='30.000000' /><rect x='393.000000' y='60.000000' width='3.000000' height='30.000000' /><rect x='402.000000' y='60.000000' width='6.000000' height='30.000000' /><rect x='417.000000' y='60.000000' width='9.000000' height='30.000000' /><rect x='429.000000' y='60.000000' width='3.000000' height='30.000000' /><rect x='435.000000' y='60.000000' width='6.000000' height='30.000000' /></g></svg>"
    }
}
```

#C128C barcode, output:getHtmlDiv
```Request
GET: /createBarcode
#Request
{
    "type":"C128C",
    "value":"0123456789",
    "width":-3,
    "height":-30,
    "color":"black",
    "backgroundColor":"white",
    "padding":"-2,-2,-2,-2",
    "output":"getHtmlDiv"
}
#Response
{
    "status": "success",
    "data": {
        "getHtmlDiv": "<div style='width:282.000000px;height:150.000000px;position:relative;font-size:0;border:none;padding:0;margin:0;background-color:rgba(94%,94%,94%,1);'><div style='background-color:rgba(0%,0%,0%,1);left:6.000000px;top:60.000000px;width:6.000000px;height:30.000000px;position:absolute;border:none;padding:0;margin:0;'>&nbsp;</div><div style='background-color:rgba(0%,0%,0%,1);left:15.000000px;top:60.000000px;width:3.000000px;height:30.000000px;position:absolute;border:none;padding:0;margin:0;'>&nbsp;</div><div style='background-color:rgba(0%,0%,0%,1);left:24.000000px;top:60.000000px;width:9.000000px;height:30.000000px;position:absolute;border:none;padding:0;margin:0;'>&nbsp;</div><div style='background-color:rgba(0%,0%,0%,1);left:39.000000px;top:60.000000px;width:6.000000px;height:30.000000px;position:absolute;border:none;padding:0;margin:0;'>&nbsp;</div><div style='background-color:rgba(0%,0%,0%,1);left:51.000000px;top:60.000000px;width:6.000000px;height:30.000000px;position:absolute;border:none;padding:0;margin:0;'>&nbsp;</div><div style='background-color:rgba(0%,0%,0%,1);left:60.000000px;top:60.000000px;width:6.000000px;height:30.000000px;position:absolute;border:none;padding:0;margin:0;'>&nbsp;</div><div style='background-color:rgba(0%,0%,0%,1);left:72.000000px;top:60.000000px;width:9.000000px;height:30.000000px;position:absolute;border:none;padding:0;margin:0;'>&nbsp;</div><div style='background-color:rgba(0%,0%,0%,1);left:84.000000px;top:60.000000px;width:6.000000px;height:30.000000px;position:absolute;border:none;padding:0;margin:0;'>&nbsp;</div><div style='background-color:rgba(0%,0%,0%,1);left:93.000000px;top:60.000000px;width:9.000000px;height:30.000000px;position:absolute;border:none;padding:0;margin:0;'>&nbsp;</div><div style='background-color:rgba(0%,0%,0%,1);left:105.000000px;top:60.000000px;width:3.000000px;height:30.000000px;position:absolute;border:none;padding:0;margin:0;'>&nbsp;</div><div style='background-color:rgba(0%,0%,0%,1);left:111.000000px;top:60.000000px;width:9.000000px;height:30.000000px;position:absolute;border:none;padding:0;margin:0;'>&nbsp;</div><div style='background-color:rgba(0%,0%,0%,1);left:123.000000px;top:60.000000px;width:6.000000px;height:30.000000px;position:absolute;border:none;padding:0;margin:0;'>&nbsp;</div><div style='background-color:rgba(0%,0%,0%,1);left:138.000000px;top:60.000000px;width:3.000000px;height:30.000000px;position:absolute;border:none;padding:0;margin:0;'>&nbsp;</div><div style='background-color:rgba(0%,0%,0%,1);left:153.000000px;top:60.000000px;width:3.000000px;height:30.000000px;position:absolute;border:none;padding:0;margin:0;'>&nbsp;</div><div style='background-color:rgba(0%,0%,0%,1);left:159.000000px;top:60.000000px;width:6.000000px;height:30.000000px;position:absolute;border:none;padding:0;margin:0;'>&nbsp;</div><div style='background-color:rgba(0%,0%,0%,1);left:171.000000px;top:60.000000px;width:6.000000px;height:30.000000px;position:absolute;border:none;padding:0;margin:0;'>&nbsp;</div><div style='background-color:rgba(0%,0%,0%,1);left:180.000000px;top:60.000000px;width:6.000000px;height:30.000000px;position:absolute;border:none;padding:0;margin:0;'>&nbsp;</div><div style='background-color:rgba(0%,0%,0%,1);left:189.000000px;top:60.000000px;width:12.000000px;height:30.000000px;position:absolute;border:none;padding:0;margin:0;'>&nbsp;</div><div style='background-color:rgba(0%,0%,0%,1);left:204.000000px;top:60.000000px;width:3.000000px;height:30.000000px;position:absolute;border:none;padding:0;margin:0;'>&nbsp;</div><div style='background-color:rgba(0%,0%,0%,1);left:219.000000px;top:60.000000px;width:6.000000px;height:30.000000px;position:absolute;border:none;padding:0;margin:0;'>&nbsp;</div><div style='background-color:rgba(0%,0%,0%,1);left:228.000000px;top:60.000000px;width:3.000000px;height:30.000000px;position:absolute;border:none;padding:0;margin:0;'>&nbsp;</div><div style='background-color:rgba(0%,0%,0%,1);left:237.000000px;top:60.000000px;width:6.000000px;height:30.000000px;position:absolute;border:none;padding:0;margin:0;'>&nbsp;</div><div style='background-color:rgba(0%,0%,0%,1);left:252.000000px;top:60.000000px;width:9.000000px;height:30.000000px;position:absolute;border:none;padding:0;margin:0;'>&nbsp;</div><div style='background-color:rgba(0%,0%,0%,1);left:264.000000px;top:60.000000px;width:3.000000px;height:30.000000px;position:absolute;border:none;padding:0;margin:0;'>&nbsp;</div><div style='background-color:rgba(0%,0%,0%,1);left:270.000000px;top:60.000000px;width:6.000000px;height:30.000000px;position:absolute;border:none;padding:0;margin:0;'>&nbsp;</div></div>"
    }
}
```

#C128 barcode, output:getGrid
```Request
GET: /createBarcode
#Request
{
    "type":"C128",
    "value":"0123456789",
    "width":-3,
    "height":-30,
    "color":"black",
    "backgroundColor":"white",
    "padding":"-2,-2,-2,-2",
    "output":"getGrid"
}
#Response
{
    "status": "success",
    "data": {
        "getGrid": "110100111001100110110011101101110101110110001000010110011011011110100001101001100011101011"
    }
}
```

#C39E+ barcode, output:getGridCustom
```Request
GET: /createBarcode
#Request
{
    "type":"C39E+",
    "value":"0123456789",
    "width":-3,
    "height":-30,
    "color":"black",
    "backgroundColor":"white",
    "padding":"-2,-2,-2,-2",
    "output":"getGridCustom",
    "grid2Value":"\u00Aa0,\u25a84"
}
#Response
{
    "status": "success",
    "data": {
        "getGridCustom": "▨4ª0ª0ª0▨4ª0▨4▨4▨4ª0▨4▨4▨4ª0▨4ª0▨4ª0▨4ª0ª0ª0▨4▨4▨4ª0▨4▨4▨4ª0▨4ª0▨4▨4▨4ª0▨4ª0ª0ª0▨4ª0▨4ª0▨4▨4▨4ª0▨4ª0▨4▨4▨4ª0ª0ª0▨4ª0▨4ª0▨4▨4▨4ª0▨4▨4▨4ª0▨4▨4▨4ª0ª0ª0▨4ª0▨4ª0▨4ª0▨4ª0▨4ª0ª0ª0▨4▨4▨4ª0▨4ª0▨4▨4▨4ª0▨4▨4▨4ª0▨4ª0ª0ª0▨4▨4▨4ª0▨4ª0▨4ª0▨4ª0▨4▨4▨4ª0ª0ª0▨4▨4▨4ª0▨4ª0▨4ª0▨4ª0▨4ª0ª0ª0▨4ª0▨4▨4▨4ª0▨4▨4▨4ª0▨4▨4▨4ª0▨4ª0ª0ª0▨4ª0▨4▨4▨4ª0▨4ª0▨4ª0▨4▨4▨4ª0ª0ª0▨4ª0▨4▨4▨4ª0▨4ª0▨4ª0▨4▨4▨4ª0ª0ª0▨4ª0▨4ª0▨4▨4▨4ª0▨4ª0ª0ª0▨4ª0▨4▨4▨4ª0▨4▨4▨4ª0▨4\n"
    }
}
```

#C39E barcode, output:pngBase64
```Request
GET: /createBarcode
#Request
{
    "type":"C39E",
    "value":"0123456789",
    "width":-3,
    "height":-30,
    "color":"black",
    "backgroundColor":"white",
    "padding": "0,0,0,0",
    "output":"pngBase64"
}
#Response
{
    "status": "success",
    "data": {
        "pngBase64": "iVBORw0KGgoAAAANSUhEUgAAAj0AAAAeAQMAAAD9+D3zAAAABlBMVEXw8PAAAAB+p+YsAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAATUlEQVRIie3MsQ0AIAhEURJ757FzNSbAFU1YggoU3MD6mp8LCY92n+pDORtCukw9G8ua1P1uobjbqzyiLvnl2ScQIECAAAECBAjQD3QAFfw6spPIWbgAAAAASUVORK5CYII="
    }
}
```


#C39+ barcode, output:pngBase64
```Request
GET: /createBarcode
#Request
{
    "type":"C39+",
    "value":"0123456789",
    "width":-3,
    "height":-30,
    "color":"black",
    "backgroundColor":"white",
    "padding": "0,0,0,0",
    "output":"pngBase64"
}
#Response
{
    "status": "success",
    "data": {
        "pngBase64": "iVBORw0KGgoAAAANSUhEUgAAAm0AAAAeAQMAAABE7Lu7AAAABlBMVEXw8PAAAAB+p+YsAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAAT0lEQVRIie3MwQkAMQhEUWHvW4+3bS0VaIsBm/CkGw1pIszlMwg+mu9nwTaqKWTqFtVUf6Tvawvl2tEdnH2przhV3w6BAwcOHDhw4MDdz/1OWrt8V+gN4wAAAABJRU5ErkJggg=="
    }
}
```


#C39 barcode, output:pngBase64
```Request
GET: /createBarcode
#Request
{
    "type":"C39",
    "value":"0123456789",
    "width":-3,
    "height":-30,
    "color":"black",
    "backgroundColor":"white",
    "padding": "0,0,0,0",
    "output":"pngBase64"
}
#Response
{
    "status": "success",
    "data": {
        "pngBase64": "iVBORw0KGgoAAAANSUhEUgAAAj0AAAAeAQMAAAD9+D3zAAAABlBMVEXw8PAAAAB+p+YsAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAATUlEQVRIie3MsQ0AIAhEURJ757FzNSbAFU1YggoU3MD6mp8LCY92n+pDORtCukw9G8ua1P1uobjbqzyiLvnl2ScQIECAAAECBAjQD3QAFfw6spPIWbgAAAAASUVORK5CYII="
    }
}
```



#C93 barcode, output:pngBase64
```Request
GET: /createBarcode
#Request
{
    "type":"C93",
    "value":"0123456789",
    "width":-3,
    "height":-30,
    "color":"black",
    "backgroundColor":"white",
    "padding": "0,0,0,0",
    "output":"pngBase64"
}
#Response
{
    "status": "success",
    "data": {
        "pngBase64": "iVBORw0KGgoAAAANSUhEUgAAAX0AAAAeAQMAAAD6oFxSAAAABlBMVEXw8PAAAAB+p+YsAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAARklEQVQ4jWN43P9fhvE4cx87Q+EBGT4LIPm4wUKGj525weJxH4MMI5DLLlNg8YeP/UHhcfl/FgyjGkY1jGoY1TCqYeA1AACNTiH7rGDq0AAAAABJRU5ErkJggg=="
    }
}
```



#CODABAR barcode, output:pngBase64
```Request
GET: /createBarcode
#Request
{
    "type":"CODABAR",
    "value":"0123456789",
    "width":-3,
    "height":-30,
    "color":"black",
    "backgroundColor":"white",
    "padding": "0,0,0,0",
    "output":"pngBase64"
}
#Response
{
    "status": "success",
    "data": {
        "pngBase64": "iVBORw0KGgoAAAANSUhEUgAAAWsAAAAeAQMAAADQEK39AAAABlBMVEXw8PAAAAB+p+YsAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAAP0lEQVQ4jWN4/MFCpvA488fj8o3HZfjsQWThjweFPx43HmfusweKyBTYg0WACg48YBhVPqp8VPmo8lHl1FIOALLimSmiYsfYAAAAAElFTkSuQmCC"
    }
}
```



#CODE11 barcode, output:pngBase64
```Request
GET: /createBarcode
#Request
{
    "type":"CODE11",
    "value":"0123456789",
    "width":-3,
    "height":-30,
    "color":"black",
    "backgroundColor":"white",
    "padding": "0,0,0,0",
    "output":"pngBase64"
}
#Response
{
    "status": "success",
    "data": {
        "pngBase64": "iVBORw0KGgoAAAANSUhEUgAAASwAAAAeAQMAAACsdrEkAAAABlBMVEXw8PAAAAB+p+YsAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAAOUlEQVQ4jWN4/MHicf9xIGLuP/6g8Lg8kP3xOPPH4zL8xx83Hn/cZwHkPihgGFU2qmxU2agy2isDACyO3IvZ/p91AAAAAElFTkSuQmCC"
    }
}
```



#EAN13 barcode, output:pngBase64
```Request
GET: /createBarcode
#Request
{
    "type":"EAN13",
    "value":"0123456789",
    "width":-3,
    "height":-30,
    "color":"black",
    "backgroundColor":"white",
    "padding": "0,0,0,0",
    "output":"pngBase64"
}
#Response
{
    "status": "success",
    "data": {
        "pngBase64": "iVBORw0KGgoAAAANSUhEUgAAAR0AAAAeAQMAAAArR1giAAAABlBMVEXw8PAAAAB+p+YsAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAAOklEQVQ4jWN43GAvw/jjQR07c+OP/x+PM9RZPG78L1PA8ICPnbnB/nHjgf99FgyjikYVjSoaVUSsIgDXJQ93+V0VWgAAAABJRU5ErkJggg=="
    }
}
```



#EAN2 barcode, output:pngBase64
```Request
GET: /createBarcode
#Request
{
    "type":"EAN2",
    "value":"12",
    "width":-3,
    "height":-30,
    "color":"black",
    "backgroundColor":"white",
    "padding": "0,0,0,0",
    "output":"pngBase64"
}
#Response
{
    "status": "success",
    "data": {
        "pngBase64": "iVBORw0KGgoAAAANSUhEUgAAADwAAAAeAQMAAABKVu8MAAAABlBMVEXw8PAAAAB+p+YsAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAAFklEQVQYlWN4/MGeuY+d+QPDKIP5AwBv/GxnWRPnRAAAAABJRU5ErkJggg=="
    }
}
```


#EAN5 barcode, output:pngBase64
```Request
GET: /createBarcode
#Request
{
    "type":"EAN5",
    "value":"12345",
    "width":-3,
    "height":-30,
    "color":"black",
    "backgroundColor":"white",
    "padding": "0,0,0,0",
    "output":"pngBase64"
}
#Response
{
    "status": "success",
    "data": {
        "pngBase64": "iVBORw0KGgoAAAANSUhEUgAAAI0AAAAeAQMAAAArYg8LAAAABlBMVEXw8PAAAAB+p+YsAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAAI0lEQVQokWN4/PGHfB8788fjDHwWD/iPyzdYMIwKjQoRFgIAakrxpbVre/AAAAAASUVORK5CYII="
    }
}
```



#EAN8 barcode, output:pngBase64
```Request
GET: /createBarcode
#Request
{
    "type":"EAN8",
    "value":"1234567",
    "width":-3,
    "height":-30,
    "color":"black",
    "backgroundColor":"white",
    "padding": "0,0,0,0",
    "output":"pngBase64"
}
#Response
{
    "status": "success",
    "data": {
        "pngBase64": "iVBORw0KGgoAAAANSUhEUgAAAMkAAAAeAQMAAAC8M6jRAAAABlBMVEXw8PAAAAB+p+YsAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAALUlEQVQokWN43PhDho/98f/jMow/Hvex/yk8wNxgIf/B4nEDw6jUqNSoFEwKAG4WkAbwPHeOAAAAAElFTkSuQmCC"
    }
}
```



#I25+ barcode, output:pngBase64
```Request
GET: /createBarcode
#Request
{
    "type":"I25+",
    "value":"0123456789",
    "width":-3,
    "height":-30,
    "color":"black",
    "backgroundColor":"white",
    "padding": "0,0,0,0",
    "output":"pngBase64"
}
#Response
{
    "status": "success",
    "data": {
        "pngBase64": "iVBORw0KGgoAAAANSUhEUgAAARQAAAAeAQMAAADXUnPoAAAABlBMVEXw8PAAAAB+p+YsAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAAOElEQVQ4jWN43Gfxh//A448HHvcf+FNnIVNgLwPk9rHL1LE/bvzxoM7iTwHDqJpRNaNqRtUgqQEAqLY9DT2JoV4AAAAASUVORK5CYII="
    }
}
```


#I25 barcode, output:pngBase64
```Request
GET: /createBarcode
#Request
{
    "type":"I25",
    "value":"0123456789",
    "width":-3,
    "height":-30,
    "color":"black",
    "backgroundColor":"white",
    "padding": "0,0,0,0",
    "output":"pngBase64"
}
#Response
{
    "status": "success",
    "data": {
        "pngBase64": "iVBORw0KGgoAAAANSUhEUgAAAOoAAAAeAQMAAAAYWRACAAAABlBMVEXw8PAAAAB+p+YsAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAAMklEQVQokWN43Mcu33+cufGHTOGPB4U/ZOos/tRZyPAfZ+4/8PjjAYZR6VHpUemBlAYAqUDTStbovi4AAAAASUVORK5CYII="
    }
}
```


#IMB barcode, output:pngBase64
```Request
GET: /createBarcode
#Request
{
    "type":"IMB",
    "value":"01234567094987654321-01234567891",
    "width":-3,
    "height":-30,
    "color":"black",
    "backgroundColor":"white",
    "padding": "0,0,0,0",
    "output":"pngBase64"
}
#Response
{
    "status": "success",
    "data": {
        "pngBase64": "iVBORw0KGgoAAAANSUhEUgAAAYMAAABaAQMAAABg7KgCAAAABlBMVEXw8PAAAAB+p+YsAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAAZ0lEQVRYhe3VuQ0AIQxE0ZHIXY/LowLXiEQjjJcKNiP4yDLmePFoT+2ZCo36BmmXekWu8Jb+4D6qj/6zhEAgEIjnReWvQiAQCMT7wjngfXQOdK24Xb5xOR/82hExbxT0jEAgEIi3xQFl6j1j0gc9EQAAAABJRU5ErkJggg=="
    }
}
```


#IMBPRE barcode, output:pngBase64
```Request
GET: /createBarcode
#Request
{
    "type":"IMBPRE",
    "value":"AADTFFDFTDADTAADAATFDTDDAAADDTDTTDAFADADDDTFFFDDTTTADFAAADFTDAADA",
    "width":-3,
    "height":-30,
    "color":"black",
    "backgroundColor":"white",
    "padding": "0,0,0,0",
    "output":"pngBase64"
}
#Response
{
    "status": "success",
    "data": {
        "pngBase64": "iVBORw0KGgoAAAANSUhEUgAAAYMAAABaAQMAAABg7KgCAAAABlBMVEXw8PAAAAB+p+YsAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAAZ0lEQVRYhe3VuQ0AIQxE0ZHIXY/LowLXiEQjjJcKNiP4yDLmePFoT+2ZCo36BmmXekWu8Jb+4D6qj/6zhEAgEIjnReWvQiAQCMT7wjngfXQOdK24Xb5xOR/82hExbxT0jEAgEIi3xQFl6j1j0gc9EQAAAABJRU5ErkJggg=="
    }
}
```


#KIX barcode, output:pngBase64
```Request
GET: /createBarcode
#Request
{
    "type":"KIX",
    "value":"0123456789",
    "width":-3,
    "height":-30,
    "color":"black",
    "backgroundColor":"white",
    "padding": "0,0,0,0",
    "output":"pngBase64"
}
#Response
{
    "status": "success",
    "data": {
        "pngBase64": "iVBORw0KGgoAAAANSUhEUgAAAPAAAABaAQMAAAC8HElZAAAABlBMVEXw8PAAAAB+p+YsAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAAP0lEQVRIiWNg4LNAQ8wNCMQwKj0qPSo9oNKP+yzwoFHpUelR6YGVhubYPoYHDBYP+BgeN6CIjEqPSo9KD6g0AKi5YHAgRy0pAAAAAElFTkSuQmCC"
    }
}
```


#MSI+ barcode, output:pngBase64
```Request
GET: /createBarcode
#Request
{
    "type":"MSI+",
    "value":"0123456789",
    "width":-3,
    "height":-30,
    "color":"black",
    "backgroundColor":"white",
    "padding": "0,0,0,0",
    "output":"pngBase64"
}
#Response
{
    "status": "success",
    "data": {
        "pngBase64": "iVBORw0KGgoAAAANSUhEUgAAAaEAAAAeAQMAAAC/jTOVAAAABlBMVEXw8PAAAAB+p+YsAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAAPklEQVQ4jWP4U2Ahw8fO3HgAyJDvAzJ+/CmwB4l8BIrYg0Q+/vhTB1LzGK6mgWFU16iuUV2jukZ1jerC0AUAGMiKC6/FlTIAAAAASUVORK5CYII="
    }
}
```

#MSI barcode, output:pngBase64
```Request
GET: /createBarcode
#Request
{
    "type":"MSI",
    "value":"0123456789",
    "width":-3,
    "height":-30,
    "color":"black",
    "backgroundColor":"white",
    "padding": "0,0,0,0",
    "output":"pngBase64"
}
#Response
{
    "status": "success",
    "data": {
        "pngBase64": "iVBORw0KGgoAAAANSUhEUgAAAX0AAAAeAQMAAAD6oFxSAAAABlBMVEXw8PAAAAB+p+YsAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAAO0lEQVQ4jWP4U2Ahw8fO3HgAyJDvAzJ+/CmwB4l8BIrYg0Q+/vhTB1LzGKyGYVTDqIZRDaMaRjUMvAYAbrtlmeFg2TQAAAAASUVORK5CYII="
    }
}
```



#PHARMA2T barcode, output:pngBase64
```Request
GET: /createBarcode
#Request
{
    "type":"PHARMA2T",
    "value":"0123456789",
    "width":-3,
    "height":-30,
    "color":"black",
    "backgroundColor":"white",
    "padding": "0,0,0,0",
    "output":"pngBase64"
}
#Response
{
    "status": "success",
    "data": {
        "pngBase64": "iVBORw0KGgoAAAANSUhEUgAAAGMAAAA8AQMAAABILZb0AAAABlBMVEXw8PAAAAB+p+YsAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAAKUlEQVQokWN43MDwuI/hAZ8Fc4PFA4ZR3mDkMfBZPG6wAAswjPIGJQ8AQ6BBRvaOq1sAAAAASUVORK5CYII="
    }
}
```



#PHARMA barcode, output:pngBase64
```Request
GET: /createBarcode
#Request
{
    "type":"PHARMA",
    "value":"0123456789",
    "width":-3,
    "height":-30,
    "color":"black",
    "backgroundColor":"white",
    "padding": "0,0,0,0",
    "output":"pngBase64"
}
#Response
{
    "status": "success",
    "data": {
        "pngBase64": "iVBORw0KGgoAAAANSUhEUgAAAT4AAAAeAQMAAACPLeDxAAAABlBMVEXw8PAAAAB+p+YsAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAAMElEQVQ4jWP43/ifGYL+sQPRH/4f8h8sZMAkiMHH/ocPJCjDMKpwVOGowlGFg1khAHIOGl3UD/vzAAAAAElFTkSuQmCC"
    }
}
```



#PLANET barcode, output:pngBase64
```Request
GET: /createBarcode
#Request
{
    "type":"PLANET",
    "value":"0123456789",
    "width":-3,
    "height":-30,
    "color":"black",
    "backgroundColor":"white",
    "padding": "0,0,0,0",
    "output":"pngBase64"
}
#Response
{
    "status": "success",
    "data": {
        "pngBase64": "iVBORw0KGgoAAAANSUhEUgAAAVMAAAA8AQMAAADhUMsMAAAABlBMVEXw8PAAAAB+p+YsAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAAQUlEQVRIie3KwQkAMAhD0UDvzpPxnMAZBRepdoLeDYRPDg8JVrCbhvLenDTCeOLV53QTsrKyshttw8/JysrKrrQXWj2Ax9PfZY4AAAAASUVORK5CYII="
    }
}
```



#POSTNET barcode, output:pngBase64
```Request
GET: /createBarcode
#Request
{
    "type":"POSTNET",
    "value":"0123456789",
    "width":-3,
    "height":-30,
    "color":"black",
    "backgroundColor":"white",
    "padding": "0,0,0,0",
    "output":"pngBase64"
}
#Response
{
    "status": "success",
    "data": {
        "pngBase64": "iVBORw0KGgoAAAANSUhEUgAAAVMAAAA8AQMAAADhUMsMAAAABlBMVEXw8PAAAAB+p+YsAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAAQElEQVRIiWN43McABMx9DMwNFgx8QARiMDcwPG5geMAAJvlADDA5qnZU7ajaUbUjU60FkWhU7ajaUbWjakekWgB+Ji6/nXqD5wAAAABJRU5ErkJggg=="
    }
}
```



#RMS4CC barcode, output:pngBase64
```Request
GET: /createBarcode
#Request
{
    "type":"RMS4CC",
    "value":"0123456789",
    "width":-3,
    "height":-30,
    "color":"black",
    "backgroundColor":"white",
    "padding": "0,0,0,0",
    "output":"pngBase64"
}
#Response
{
    "status": "success",
    "data": {
        "pngBase64": "iVBORw0KGgoAAAANSUhEUgAAAREAAABaAQMAAAClsvDWAAAABlBMVEXw8PAAAAB+p+YsAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAAR0lEQVRIie3UsQkAIBBD0YC982Q8J3BG4RbxCgvPxgU+/Cq8OlryW9ddDGEwGMxtYvoTBoPBVKNzJm7ph9ssS14NBoPBVLMB32D7tWYAbagAAAAASUVORK5CYII="
    }
}
```



#S25+ barcode, output:pngBase64
```Request
GET: /createBarcode
#Request
{
    "type":"S25+",
    "value":"0123456789",
    "width":-3,
    "height":-30,
    "color":"black",
    "backgroundColor":"white",
    "padding": "0,0,0,0",
    "output":"pngBase64"
}
#Response
{
    "status": "success",
    "data": {
        "pngBase64": "iVBORw0KGgoAAAANSUhEUgAAAjEAAAAeAQMAAADnxN19AAAABlBMVEXw8PAAAAB+p+YsAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAASUlEQVRIiWP43//jcZ/9438Wj/t//Acy+izAJFAExAYKghhwNUBZkDKL/xBlIFkLIPrfwDBqzqg5o+aMmjNqzqg5o+aMmoPDHAD60JqsZPQIHwAAAABJRU5ErkJggg=="
    }
}
```

#S25 barcode, output:pngBase64
```Request
GET: /createBarcode
#Request
{
    "type":"S25",
    "value":"0123456789",
    "width":-3,
    "height":-30,
    "color":"black",
    "backgroundColor":"white",
    "padding": "0,0,0,0",
    "output":"pngBase64"
}
#Response
{
    "status": "success",
    "data": {
        "pngBase64": "iVBORw0KGgoAAAANSUhEUgAAAd0AAAAeAQMAAABT+FaDAAAABlBMVEXw8PAAAAB+p+YsAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAAPElEQVQ4jWP43//jcZ/9438W//ssICRQBMQGCoIY9o/BIo9BsiBlEPQfLMswqnlU86jmUc2jmkc1D2fNAOPLwoVfopkcAAAAAElFTkSuQmCC"
    }
}
```



#UPCA barcode, output:pngBase64
```Request
GET: /createBarcode
#Request
{
    "type":"UPCA",
    "value":"0123456789",
    "width":-3,
    "height":-30,
    "color":"black",
    "backgroundColor":"white",
    "padding": "0,0,0,0",
    "output":"pngBase64"
}
#Response
{
    "status": "success",
    "data": {
        "pngBase64": "iVBORw0KGgoAAAANSUhEUgAAAR0AAAAeAQMAAAArR1giAAAABlBMVEXw8PAAAAB+p+YsAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAAOklEQVQ4jWN43GAvw/jjQR07c+OP/x+PM9RZPG78L1PA8ICPnbnB/nHjgf99FgyjikYVjSoaVUSsIgDXJQ93+V0VWgAAAABJRU5ErkJggg=="
    }
}
```



#UPCE barcode, output:pngBase64
```Request
GET: /createBarcode
#Request
{
    "type":"UPCE",
    "value":"0123456789",
    "width":-3,
    "height":-30,
    "color":"black",
    "backgroundColor":"white",
    "padding": "0,0,0,0",
    "output":"pngBase64"
}
#Response
{
    "status": "success",
    "data": {
        "pngBase64": "iVBORw0KGgoAAAANSUhEUgAAAJkAAAAeAQMAAAAFJy6ZAAAABlBMVEXw8PAAAAB+p+YsAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAAJUlEQVQokWN43Mf+h//AgwJ7GQYL+Y8HZOosHjcwjAqOCtJSEADdRxMaR9NmbQAAAABJRU5ErkJggg=="
    }
}
```


#ERROR RESPONSE ,httpCode:400
```Request
GET: /createBarcode
#Request
{
    "type":"",
    "value":"0123456789",
    "width":-4,
    "height":-4,
    "color":"black",
    "backgroundColor":"white",
    "padding": "0,0,0,0",
    "output":"pngBase64"
}
#Response
{
    "status": "error",
    "message": "Unsupported barcode type: "
}
```

