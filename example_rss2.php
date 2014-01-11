<?php
  include("FeedGenerator.php");
  //The constant RSS2 is passed to mention the version
  $TestFeed = new feed(RSS2);
  
  //Setting the channel elements
  //Use wrapper functions for common channel elements
  $TestFeed->setTitle('Testing & Checking the RSS writer class');
  $TestFeed->setLink('http://www.4sol.pro/rss');
  $TestFeed->setDescription('This is test of creating a RSS 2.0 feed Universal Generator class');
  
  //Image title and link must match with the 'title' and 'link' channel elements for RSS 2.0
  $TestFeed->setImage('Testing the RSS writer class','http://www.4sol.pro/rss','http://www.4sol.pro/images/logo.gif');
  
  //Use core setChannelElement() function for other optional channels
  $TestFeed->setChannelElement('language', 'ru-RU');
  $TestFeed->setChannelElement('pubDate', date(DATE_RSS, time()));
  
  //Adding a feed. Genarally this portion will be in a loop and add all feeds.
  
  //Create an empty FeedItem
  $newItem = $TestFeed->createNewItem();
  
  //Add elements to the feed item
  //Use wrapper functions to add common feed elements
  $newItem->setTitle('The first feed');
  $newItem->setLink('http://www.yahoo.com');
  //The parameter is a timestamp for setDate() function
  $newItem->setDate(time());
  $newItem->setDescription('This is test of adding CDATA Encoded description by the php <b>Universal Feed Writer</b> class');
  $newItem->setEncloser('http://www.attrtest.com', '1283629', 'audio/mpeg');
  //Use core addElement() function for other supported optional elements
  $newItem->addElement('author', 'komarov4sol@gmail.com (Komarov Maksim)');
  //Attributes have to passed as array in 3rd parameter
  $newItem->addElement('guid', 'http://www.4sol.ru/',array('isPermaLink'=>'true'));
  
  //Now add the feed item
  $TestFeed->addItem($newItem);
  
  //Another method to add feeds from array()
  //Elements which have attribute cannot be added by this way
  $newItem = $TestFeed->createNewItem();
  $newItem->addElementArray(array('title'=>'The 2nd feed', 'link'=>'http://www.google.com', 'description'=>'This is test of feedwriter class'));
  $TestFeed->addItem($newItem);
  
  //OK. Everything is done. Now genarate the feed.
  $TestFeed->genarateFeed();

?>
