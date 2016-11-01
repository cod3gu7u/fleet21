
Yii2: Partial View Examples
Last updated: 01 Mar 2016

Yii 2 has a slightly different approach from Yii 1.x when it comes to rendering views inside views (or partials views).

Remember that, in Yii 2, $this in a view refers to a View object (not a controller) and it just so happens that Class View also has a render method and you can call it in your view, nesting views indefinitely.

<?php
//this is a view file
$this->title = 'ze Title';
?>

<div class="bar baz">
  
</div>

Felipe 11 Jan 2015 01 Mar 2016 TECHNOLOGY
yii2 views
« Useful Examples & Commands for Harddisk Management (Disk Usage)
Archive
Scala Slick: Simple Example on Connecting to a PostgreSQL Database »
Dialogue & Discussion
