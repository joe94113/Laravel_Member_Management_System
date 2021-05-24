# Laravel_Member_Management_System" 

設置.env檔(資料庫也要修改)，才能發郵件，記得到google開啟低安全性應用程式

``
MAIL_MAILER=smtp\r\n
MAIL_HOST=smtp.gmail.com\r\n
MAIL_PORT=465\r\n
MAIL_USERNAME="gmail帳號"\r\n
MAIL_PASSWORD="gmail密碼"\r\n
MAIL_ENCRYPTION=ssl\r\n
MAIL_FROM_ADDRESS="gmail帳號@gmail.com"\r\n
MAIL_FROM_NAME="${APP_NAME}"\r\n
``
