# Laravel_Member_Management_System" 

設置.env檔(資料庫也要修改)，才能發郵件，記得到google開啟低安全性應用程式

``
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME="gmail帳號"
MAIL_PASSWORD="gmail密碼"
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS="gmail帳號@gmail.com"
MAIL_FROM_NAME="${APP_NAME}"
``
