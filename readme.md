![](http://csku.science/img/becardLogo.png)
# BeCard
BeCard คือระบบสะสมแต้มที่เชื่อมต่อระหว่างร้านค้าองค์กรและลูกค้า อ่านว่า บี-การ์ด แปลว่าเป็นบัตร นอกจากนั้นคําว่า Becard ยังเปน  ชื่อสายพันธุ์นกที่สามารถพบได้ในอเมริกากลางและอเมริกาใต้ มี ลักษณะชอบเก็บสะสมเมล็ดพืช โดย BeCard ทําหน้าที่ดูแล จัดการระบบสมาชิกลูกค้าของร้านค้า ระบบสะสม แต้ม ระบบแลกของรางวัล ระบบโปรโมชั่น ระบบบัตรสมาชิกแบบอิเล็กทรอนิกส์ ที่ร้านค้าองค์กรสามารถตั่ง ค่าจัดการได้อย่างยืดยุ่น

# วิธีติดตั้ง
1. Download หรือ Clone Project ลง Server
2. ติดตั้ง Composer ด้วยคำสั่ง ``` composer install ```
3. แก้ไข Config ไฟล์เชื่อมต่อฐานข้อมูลในไฟล์ config/database.php
4. Migration Database ด้วยคำสั่ง ``` php artisan migrate ```
5. Run Server ด้วยคำสั่ง php artisan serve ``` php artisan serve ```

![](http://csku.science/img/screencapture-127-0-0-1-8000-2018-05-27-09_13_55.png)

#วิธีใช้งาน
#### สมัครสมาชิก
- สามารถเข้าไปสมัครสมาชิกปกติได้ที่เมนู Register
- หากต้องการสมัครสมาชิกเป็น Entrepreneur โดยเฉพาะให้กดที่ปุ่ม Get started as Entrepreneur เพื่อเข้าสู่หน้าสมัครเฉพาะ (แยกกับระบบหลัก)

#### เข้าสู่ระบบ
- สามารถเข้าสู่ระบบได้ที่เมนู Login

#### สมัครบัตร
- การจะสมัครสมาชิกได้นั้น User จำเป็นต้อง Scan QR Code จากหน้าร้านเท่านั้น
- เมื่อ Scan QR Code เสร็จ User จะมีบัตรสมาชิกนั้นๆ เมื่อมีบัตรแล้ว เราสามารถนำ QR Code หลังบัตรมาแสกนที่แคชเชียรได้ในครั้งต่อไปที่ซื้อของ

#### การสร้างร้าน (Entrepreneur)
- เมื่อ login เข้าสู่ระบบในฐานะ Entrepreneur จะมีเมนูในการจัดการร้านเพิ่มขึ้นมา
- หากยังไม่มีร้าน จะบังคับให้สร้าง ใส่ข้อมูลที่จำเป็น เช่น ชื่อร้าน ที่อยู่สำนักงานใหญ่ 
- เมื่อสร้างเสร็จ จะไม่สามารถเปิดร้านหรือเผยแพร่ร้านได้ จำเป็นจะต้องสร้าง สาขา แคชเชียร์ และบัตรสมาชิกก่อน ตามลำดับ
- นอกจากนี้ยังสามารถตั้งค่าเพิ่มเติมได้ ทั้งรูปโปรโมชั่น Reward ของรางวัล
###### การสร้าง สาขา แคชเชียร์ ถูกจำกัดไว้ใน Package แต่ละ Package สามารถสร้างได้แตกต่างกัน เช่น Sliver สร้างได้ 1 สาขา แต่ Gold สามารถสร้างได้ 5 สาขา

#### การแลกของรางวัล
- ทุกการสะสมแต้มจะได้ BePoint หรือรวมถึงการชวนเพื่อนมาสมัคร 
- BePoint คือหน่วยแต้มของเว็บเรา ที่สามารถแลกของรางวัลจากทาง BeCard ได้
- การแลกของรางวัลจากทางเว็บหรือทางร้านค้า สามารถเข้าไปดูได้ในเมนู Reward หรือ ในหน้าร้านนั้นๆ เมื่อแต้มเราถึงมากพอ จะสามารถกดแลกของรางวัลได้ (ในส่วนระบบนี้จะมีการดักทุกข้อมูล เพื่อป้องกันคนซน คนโกง)
- เมื่อแลกของรางวัลเสร็จ จะเกิด Voucher ขึ้นเราสามารถนำ Voucher ดังกล่าวไปแลกของรางวัลได้ที่หน้าร้านหรือบริษัท 
- Cashier จะแสกน QR Code สถานะของใบนั้นๆจะเปลี่ยนเป็นรับของเรียบร้อยแล้ว
- โดยสามารถเข้าไปดูได้ที่เมนู Reward และ Voucher

#### Affiliate ระบบแนะนำเพื่อน
- ระบบแนะนำเพื่อนเป็นหนึ่งในแผนการตลาดที่ให้ User ชวน User คนอื่นมาใช้ เพื่อแลกกับแต้ม BePoint ในระบบ
- โดยแต่ละคนจะมี Link Affiliate ของแต่ละคน ให้ส่ง Link ดังก่าวไปให้เพื่อนสมัครสมาชิก และเมื่อเพื่อนสมัครสมาชิกผ่าน Link เราจะได้แต้ม เพื่อนที่สมัครกับเราก็ได้แต้ม
- โดยสามารถเข้าไปเล่นได้ที่เมนู Affiliate 

#สมาชิก
| ชื่อ  | รหัสนิสิต  |
| ------------ | ------------ |
| นางสาวฉมามาส บรรจงจิตส์  | 5810450202  |
| นายศุภวิชญ์ ชาญพิทยานุกูลกิจ | 5810450440  |
| นายวสุพล จงสถิตเกียรติ  | 5810451012  |
| นายศรัทธา จารุพรโกศล  | 5810451055  |