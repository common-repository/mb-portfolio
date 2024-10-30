=== MB Portfolio ===
Contributors: smubeen0786
Tags: mb-porfolio,best portfolio, filterable portfolio, portfolio, portfolio plugin, wordpress portfolio plugin
Requires at least: 4.0
Tested up to: 5.6.1
Requires PHP: 5.6
Stable tag: 1.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html


== Description ==
MB Portfolio is designed to display a stylish portfolio grid in your wordpress website with navigation to filter portfolio with categories.
Display your portfolio grid anywhere in the website with simple shortcode. You can have full control over how the grid will display.  
Shortcode has multple parameter to control the display in front-end.
== Installation ==

This section describes how to install the plugin and get it working.

1. Upload the plugin files to the `/wp-content/plugins/plugin-name` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Place "[mb_portfolio navigation='true' posts='6' term_id='any' pagination='false']" in your pages or templates.

== Usage : ==
Place this shorcode anywhere in the page or post where you want to display the portfolio grid => [mb_portfolio navigation="true" posts="6" term_id="" pagination="true"]

== Shortcode parameter explaination:==
*  1- 'navigation':
```
'navigation' parameter accepts 'true/false' to show/hide the navigation that filter the grid accordiing to category. Default value is 'true'.
```
*  2- 'posts':
```
'posts' parameter accepts an 'integer' to show number of posts in grid. Default value is '6'.
```
*  3- 'term_id':
```
'term_id' parameter accepts an 'integer' id of portfolio category to show posts of     specific category in the grid. By Default all categories posts will be displayed.
```
*  4- 'pagination':
```
'pagination' parameter accepts 'true/false' to show/hide the pagination after the grid. Default value is 'true'.
```


== Change Log ==

Bug fix and improvement in grid design.


== Custom Color Scheme ==

To use your desired color for portfolio section use the following classes in theme customizer with your Color #code. Just replace 'red' with your desired color code and copy in theme customizer. 


**#portfolio .portfolio-nav ul li i,
.cath4,#portfolio .portfolio-hover span {
    color: red;
}**
**#portfolio .portfolio-nav ul li.mbactive,**
**#portfolio .portfolio-nav ul li:hover,**
**#portfolio .portfolio-nav ul li span,**
**#portfolio .portfolio-single .mbbtn,**
**#portfolio .portfolio-hover .mbbutton a:hover,**
**#portfolio .portfolio-hover .mbbutton .primary,**
**#portfolio .mbbutton .mbbtn,**
**#portfolio.archive .nav-bg,**
**#portfolio.single .portfolio-single.slider .owl-nav div,**
**#portfolio.single .content h2:before,**
**#portfolio.single .portfolio-widget,**
**.k-line{
	background: red;
}**
**#header .nav li a::after,**
**#portfolio .portfolio-nav ul li span::before{
	border-top-color:red;
}**

**#portfolio div.mbpagination a,.page-numbers.current{
	border: 1px solid red;
}**
**#portfolio div.mbpagination .page-numbers.current{
	background: red;
}**
**#portfolio div.mbpagination a:hover{
	background: red;
}**




== Screenshots ==
1. Custom post type for Portfolio.
2. screenshot for adding custom link i.e. project website link.
3. screenshot to add fa icon for portfolio category.
4. screenshot for placing shortcode in the page or post.
5. screenshot of final look front-end.