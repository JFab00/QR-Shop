# [Highschool Projects] QR Shop

The objective of this project was making a shop that, through the use of QR Codes, people would be able to scan the certain items using their mobilephones. When they have scanned all the products they wanted, then they would have to scan another QR code that had the purpose of making and giving the receipt to the user.  

## FEATURES
  The project had quite a lot of requirements:
  - Through the usage of the phpqrcode library, create a qr code that when scanned will lead to a "start" page that will store the user's public ip into the name of a .txt file (f.e. if your ip is 1.1.1.1 then the file would have the name like this 1.1.1.1.txt)
  - After which create a "product list" webpage on which, through the use of PostgreSQL, make a list of the products showing their "description" (name), price, quantity, image and QR code that is auto-generated
  - When a QR code is scanned (through smartphone) you'll get forwarded to another webpage on which you can increase the quantity and add the product/item to the cart. The cart is the .txt file created before..
  - At the end of the products list there should be a QR code that rappresents the "end of the shopping", and when scanned it will bring you to the page with the shopping recipe and on which the overall price should be present. After that the file .txt will be removed.
  - In order to make this work there are needed cookies so that you can make the connection server-smartphone (in the cookies is stored the user's ip, so that you can differentiate between the shopping carts)
  - Create an admin side of the webpage, on which you'll be able to insert/delete/modify certain products. (originally it didn't require the use of cookies to login, you just needed to know the credentials, but I've decided that is more secure doing it with cookies... else you could just change the url and access the admin side...)
  
## FOOTER
  
  There are a lot of things that could have been done to improve it overall... but I couldn't be bothered...  
  When we received this project to do, I was going through a strange phase (something like depression combined with a lot of dead memes), so when I coded this I have added a lot of stupid comments through the code as well on the webpages, which lead to a downgrade of 1 point to the score... so I ended up getting a 7.5/9.
  The funny thing about this project is that we did it pre Covid-19... now they added the Green Pass here in Italy which works basically on the same basis (scanning QR codes to see if the person have got vaccinated)...
  If you want to improve the code, be my guest...
  If you need it for a school project, you can take it, but as always, remember to change/understand the code and comments that are in there... also, you have to premade the qr_final.png because I just forgot to create it through code...
  Here's a link where you can try the shop for yourself, I edited the password and stuff so you can't enter the adimn side and ruin my project 😂😂: https://jfab.alwaysdata.net/qrshop/

