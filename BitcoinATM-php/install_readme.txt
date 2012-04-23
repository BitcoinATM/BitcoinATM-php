1. Installing apache server (Windows 7)
C:\Documents and Settings\1000\My Documents\Downloads" -k install -n "Apache2"
httpd-2.2.20-win32-x86-no_ssl (1).msi


1.1 Download it here http://httpd.apache.org/download.cgi
(I have chosen without crypto variant of version 2.2, but in future ssl should be supported by server - so you will have to reinstall version of apache server)

1.2. Choose localhost as server name while installing 

1.3  choose installation directory without spaces (for example, c:/apache2.2)

1.4 Change port to 8080 in file C:\Apache2.2\conf\httpd.conf (property 'Listen')

1.5 start server after installation and check that URL http://localhost:8080 shows the message "It works"

2. Install PHP5 with help of that tutorial (see 2.1-... for setting properties in php.ini):


2.1 You don't need to change values of properties short_open_tag, magic_quotes_gpc, register_globals. 
You could set property display_errors = On 

2.2 Use variant a (Running PHP 5 as an Apache Module) while integrating  apache server and php5

2.3 find property DirectoryIndex and set it to start.html

2.4 find property DocumentRoot and set it to the folder with your application, for example "d:/NotWork/Todd/site/atm_dev"

2.5 find property extension_dir in php.ini and set it
extension_dir = "c:/php/ext" (write here a folder path where library php_curl.dll is situated)

2.6 find the line
;extension=php_curl.dll
and remove ; so that the line now contains only  
extension=php_curl.dll

2.7 check the %windows%\system32 directory to see whether the following DLL files are already available.
   1. libeay32.dll
   2. ssleay32.dll
If they are presented in %windows%\system32 you must first rename the above two DLL files. We did as follows by adding an .old extesion.
   1. libeay32.dll.old
   2. ssleay32.dll.old
Both these libeay32.dll and ssleay32.dll files are available inside your %PHP_HOME% directory. Now copy both of those DLL files into %windows%\system32 folder.

2.8  There is a bug in several pages. You need to find all files in the application folter that contain the following strings:
define(kMtGoxKey
define(kMtGoxSecret

an replace those strings with
define('kMtGoxKey'
define('kMtGoxSecre'


3. Restart apache server (you could use icon in the process bar for that)
 and open localhost:8080 in your browser - you should see the first page


Found in Spash page
http://bitcoinduit.com/ATM/MouseCursor.inc
