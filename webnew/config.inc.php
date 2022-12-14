<?php // -*-mode: PHP; coding:utf-8;-*-
namespace MRBS;

/**************************************************************************
 *   MRBS Configuration File
 *   Configure this file for your site.
 *   You shouldn't have to modify anything outside this file.
 *
 *   This file has already been populated with the minimum set of configuration
 *   variables that you will need to change to get your system up and running.
 *   If you want to change any of the other settings in systemdefaults.inc.php
 *   or areadefaults.inc.php, then copy the relevant lines into this file
 *   and edit them here.   This file will override the default settings and
 *   when you upgrade to a new version of MRBS the config file is preserved.
 *
 *   NOTE: if you include or require other files from this file, for example
 *   to store your database details in a separate location, then you should
 *   use an absolute and not a relative pathname.
 **************************************************************************/

/**********
 * Timezone
 **********/
 
// The timezone your meeting rooms run in. It is especially important
// to set this if you're using PHP 5 on Linux. In this configuration
// if you don't, meetings in a different DST than you are currently
// in are offset by the DST offset incorrectly.
//
// Note that timezones can be set on a per-area basis, so strictly speaking this
// setting should be in areadefaults.inc.php, but as it is so important to set
// the right timezone it is included here.
//
// When upgrading an existing installation, this should be set to the
// timezone the web server runs in.  See the INSTALL document for more information.
//
// A list of valid timezones can be found at http://php.net/manual/timezones.php
// The following line must be uncommented by removing the '//' at the beginning
$timezone = "Asia/Ho_Chi_Minh";


/*******************
 * Database settings
 ******************/
// Which database system: "pgsql"=PostgreSQL, "mysql"=MySQL
$dbsys = "mysql";
// Hostname of database server. For pgsql, can use "" instead of localhost
// to use Unix Domain Sockets instead of TCP/IP. For mysql "localhost"
// tells the system to use Unix Domain Sockets, and $db_port will be ignored;
// if you want to force TCP connection you can use "127.0.0.1".
$db_host = "localhost";
// If you need to use a non standard port for the database connection you
// can uncomment the following line and specify the port number
// $db_port = 1234;
// Database name:
$db_database = "datxe";
// Schema name.  This only applies to PostgreSQL and is only necessary if you have more
// than one schema in your database and also you are using the same MRBS table names in
// multiple schemas.
//$db_schema = "public";
// Database login user name:
$db_login = "root";
// Database login password:
$db_password = '';
// Prefix for table names.  This will allow multiple installations where only
// one database is available
$db_tbl_prefix = "mrbs_";
// Set $db_persist to TRUE to use PHP persistent (pooled) database connections.  Note
// that persistent connections are not recommended unless your system suffers significant
// performance problems without them.   They can cause problems with transactions and
// locks (see http://php.net/manual/en/features.persistent-connections.php) and although
// MRBS tries to avoid those problems, it is generally better not to use persistent
// connections if you can.
$db_persist = FALSE;
$debug = true;

/* Add lines from systemdefaults.inc.php and areadefaults.inc.php below here
   to change the default configuration. Do _NOT_ modify systemdefaults.inc.php
   or areadefaults.inc.php.  */
// The company logo, additional information and URL are all optional.
$mrbs_company_logo = "http://localhost/datxe/web/images/logo2.png";
$mrbs_company = "C??ng Ty CP Nh???a Thi???u Ni??n Ti???n Phong";   // This line must always be uncommented ($mrbs_company is used in various places)
$mrbs_company_url = "https://datphong.nhuatienphong.vn/";

// Uncomment this next line to use a logo instead of text for your organisation in the header
// $mrbs_company_logo = "images/logo.png";
$min_booking_date_enabled = true;
$min_booking_date = date("y-m-d");  // Must be a string in the format "yyyy-mm-dd"
$strftime_format['date']               = "%A  %B %Y";  // Used in Day view    
$default_view = "month";
$strftime_format['weekview_headers']   = "%a<br>%e. %B";  // Used in the table header in Week view (all rooms)
// Set the email address of the From field. Default is 'admin_email@your.org'
$mail_settings['from'] = 'thientuantest@gmail.com';

// Set the recipient email. Default is 'admin_email@your.org'. You can define
// more than one recipient like this "john@doe.com,scott@tiger.com"
$mail_settings['recipients'] = '';
$mail_settings['admin_on_bookings']      = true;  // the addresses defined by $mail_settings['recipients'] below
$mail_settings['area_admin_on_bookings'] = true;  // the area administrator
$mail_settings['room_admin_on_bookings'] = true;  // the room administrator
$mail_settings['booker']                 = true;  // the person making the booking
$mail_settings['book_admin_on_approval'] = true;  // the booking administrator when booking approval is enabled

$mail_settings['on_change'] = true;  // when an entry is changed
$mail_settings['on_delete'] = true;  // when an entry is deleted

// These settings determine what should be included in the email
// Set to true or false as required
$mail_settings['details']   = true; // Set to true if you want full booking details;
$mail_settings['html']      = true; // Set to true if you want HTML mail
$mail_settings['icalendar'] = true; // Set to true to include iCalendar details

// HOW TO EMAIL - BACKEND
// ----------------------
// Set the name of the backend used to transport your mails. Either 'mail',
// 'smtp', 'sendmail' or 'qmail'. Default is 'mail'.
$mail_settings['admin_backend'] = 'smtp';
$smtp_settings['host'] = 'smtp.gmail.com';  // SMTP server
$smtp_settings['port'] = 465;           // SMTP port number
$smtp_settings['auth'] = true;        // Whether to use SMTP authentication
$smtp_settings['secure'] = 'ssl';
$smtp_settings['username'] = 'thientuantest@gmail.com';       // Username (if using authentication)
$smtp_settings['password'] = 'fndqcijmvpzwhpbn'; 
$smtp_settings['hostname'] = 'smtp.gmail.com';
$disable_automatic_language_changing = true;
// Set email address of the Carbon Copy field. Default is ''. You can define
// more than one recipient (see 'recipients')
$mail_settings['cc'] = 'thientuantest@gmail.com';

// $edit_entry_field_order = array('name', 'in_charge');
// $vocab_override['vi']['users.employee_code'] = "M?? nh??n vi??n";
// $vocab_override['vi']['entry.startkm'] = "S??? Km ?????u";
// $vocab_override['vi']['entry.endkm'] = "S??? Km cu???i";
$vocab_override['vi']['entry.dispatch'] = "Quy???t ?????nh c??ng t??c";
$vocab_override['vi']['entry.slot'] = "S??? ng?????i";
$auth['admin_only_types'] = array('E');
$edit_entry_field_order = array('create_by', 'name','dispatch', 'slot', 'start_time','end_time', 'room_id', 'description', 'type', 'Confirm_status', 'privacy_status',);
// Set this to true if you want to prevent bookings of a type that is invalid for a room
// ?????t gi?? tr??? n??y th??nh true n???u b???n mu???n ng??n vi???c ?????t lo???i ph??ng kh??ng h???p l???
$prevent_simultaneous_bookings = true;
// Days of the week that are weekdays
// C??c ng??y trong tu???n l?? c??c ng??y trong tu???n
$weekdays = array(1, 2, 3, 4, 5);
// You can add a placeholder to text input fields in the entry form by using
$vocab_override['en']['entry.description.placeholder'] = "T??n ng?????i tham gia, y??u c???u v??? vi???c ch??? ?????...";
// ?????t gi?? tr??? n??y th??nh false n???u b???n kh??ng mu???n c?? kh??? n??ng t???o c??c s??? ki???n
// ng?????i kh??c c?? th??? ????ng k??.
$enable_registration = false;

// If you don't want ordinary users to be able to see the other users'
// details then set this to true.  (Only relevant when using 'db' authentication]
// N???u b???n kh??ng mu???n ng?????i d??ng b??nh th?????ng c?? th??? nh??n th???y nh???ng ng?????i d??ng kh??c '
// chi ti???t sau ???? ?????t gi?? tr??? n??y th??nh true. (Ch??? c?? li??n quan khi s??? d???ng x??c th???c 'db']
$auth['only_admin_can_see_other_users'] = true;

$mail_settings['admin_on_bookings']      = true;  // the addresses defined by $mail_settings['recipients'] below
$mail_settings['area_admin_on_bookings'] = true;  // the area administrator
$mail_settings['room_admin_on_bookings'] = true;  // the room administrator
$mail_settings['booker']                 = true;  // the person making the booking
$mail_settings['book_admin_on_approval'] = true;  // the booking administrator when booking approval is enabled

//Th???i ??i???m g???i mail
$mail_settings['on_change'] = true;  // when an entry is changed
$mail_settings['on_delete'] = true;  // when an entry is deleted

//G???i g?? trong mail
$mail_settings['details']   = true; // Set to true if you want full booking details;
$mail_settings['html']      = true; // Set to true if you want HTML mail
$mail_settings['icalendar'] = true; // Set to true to include iCalendar details

// Set the language used for emails (choose an available lang.* file).
// ?????t ng??n ng??? ???????c s??? d???ng cho email (ch???n m???t t???p lang. * C?? s???n).
$mail_settings['admin_lang'] = 'vi';   // Default is 'en'.

// ?????t gi?? tr??? n??y th??nh true ????? t???t t??nh n??ng t??? ?????ng thay ?????i ng??n ng??? m?? MRBS th???c hi???n
// d???a tr??n c??i ?????t ng??n ng??? tr??nh duy???t c???a ng?????i d??ng. N?? s??? ?????m b???o r???ng
// ng??n ng??? ???????c hi???n th??? lu??n l?? gi?? tr??? c???a $ default_language_tokens,
// nh?? ???????c ch??? ?????nh b??n d?????i
$disable_automatic_language_changing = true;

// ?????t ??i???u n??y th??nh m???t ?????nh ngh??a ng??n ng??? kh??c ????? m???c ?????nh th??nh kh??c
// m?? th??ng b??o ng??n ng???. ??i???u n??y ph???i t????ng ??????ng v???i t???p lang. * Trong MRBS.
// v?? d???. s??? d???ng "fr" ????? s??? d???ng c??c b???n d???ch trong "lang.fr" l??m m???c ?????nh
// b???n d???ch. [L??U ??: ch??? c???n thay ?????i ??i???u n??y n???u b???n
// ???? t???t t??nh n??ng t??? ?????ng thay ?????i ng??n ng??? ??? tr??n]
$default_language_tokens = "vi";

// ?????t ??i???u n??y th??nh ng??n ng??? h???p l??? ???????c h??? tr??? tr??n h??? ??i???u h??nh b???n ch???y
// B???t m??y ch??? MRBS n???u b???n mu???n ghi ???? x??c ?????nh ng??n ng??? t??? ?????ng
// MRBS th???c hi???n. Ng??n ng??? ph???i ??? d???ng ng??n ng??? BCP 47
// th???, v?? d???: 'en-GB' ho???c 'sr-Latn-RS'. L??u ?? r???ng MRBS s??? chuy???n ?????i ??i???u n??y th??nh
// ?????nh d???ng ph?? h???p v???i h??? ??i???u h??nh c???a b???n, v?? d???: b???ng c??ch th??m '.utf-8' ho???c thay ?????i n?? th??nh 'eng'.
$override_locale = "vi-VN";

// Language selection when run from the command line
// L???a ch???n ng??n ng??? khi ch???y t??? d??ng l???nh
$cli_language = "vi";