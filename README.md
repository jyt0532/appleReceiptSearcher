appleReceiptSearcher
====================

given a applereceipt, show all the detail information by html table

##Note 
the request will send to 'https://sandbox.itunes.apple.com/verifyReceipt' first.
If the return status code is 21008(which means this request is a production request)
, then the request will send to 'https://buy.itunes.apple.com/verifyReceipt'

##Screenshot
### before use
![appleReceiptSearcher screen shot](https://raw.github.com/jyt0532/appleReceiptSearcher/master/screenshot/receipt_before_use.png)
### after use
![appleReceiptSearcher screen shot](https://raw.github.com/jyt0532/appleReceiptSearcher/master/screenshot/receipt_after_use.png)
