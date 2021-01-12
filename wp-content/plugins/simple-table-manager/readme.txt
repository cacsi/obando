=== Simple Table Manager ===
Contributors: Ryo Inoue, lorro
Donate link: http://www.tokyo-ict.com/en/
Tags: database, table, mysql, crud, export
Requires at least: 5.0
Tested up to: 5.5.1
Requires PHP: 7.0
Stable tag: 1.4
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Enables editing table records and exporting them to CSV files through a minimal database interface from your dashboard.

== Description ==

Simple Table Manager enables editing table records and exporting them to CSV files through a minimal database interface from your dashboard.

* Simply CRUD table contents on your wp-admin screen
* Search and sort table records
* No knowledge of MySQL or PHP required
* Export table records to a CSV file
* Does not allow users to change the structure of the table

Unlike 'full featured' database management plugins, it does not allow users to alter the structure of the table but requires no knowledge on MySQL or PHP.

Similar to CakePHP's scaffold feature, Simple Table Manager is an auxiliary tool suited for the initial development phase of a website. It is also ideal when you want to ask someone else with no database expertise to keep track of table records on your website. This was the motivation for developing this plugin.

== Installation ==

1. Via the Dashboard > Plugins > Add plugin menu page
2. Or upload the entire 'simple-table-manager' folder to the '/wp-content/plugins/' directory
3. Activate the plugin through the 'Plugins' menu in WordPress
4. On the plugin's 'Settings' page, select the table you want to manage

== Frequently asked questions ==

= How can I add a new table or field by using the plugin? =

You cannot. Please use 'full featured' plugins or phpMyAdmin if you need full access to the database.

== Screenshots ==

1. List records
2. Edit record
3. Add record
4. Settings

== Changelog == 

= Version 1.0 (2015-03-03) =
First release

= Version 1.1 (2015-05-02) =
* Added feature to auto-adjust input text fields according to data type
* Enabled insert and retrieval of data containing special chars
* Rearranged files for a loosely MVC structure
* Fixed a few minor bugs.

= Version 1.2 (2016-01-15) =
* Enabled handling of non-integer primary keys

= Version 1.3 (2019-08-20) =
* Fix error on activation if database prefix is not "wp_"
* Fix CSV Export
* Fix $order not found error
* Make all strings translation-ready
* Cosmetic changes

= Version 1.4 (2020-09-07) =
* Fixed errors if column names have spaces
* Date fields have date picker in Edit and Add screens
* Time fields have time picker in Edit and Add screens
* Works if the primary column is not the first column
* Edit and Add screens show data types
* Minor styling improvements
* Tested with WordPress 5.5.1
* Updated readme.txt

== Upgrade Notice ==

= 1.4 =
Allows column names to have spaces. Various minor improvements.
