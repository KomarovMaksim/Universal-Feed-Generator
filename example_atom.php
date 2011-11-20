<?php
	include("FeedGenerator.php");
	//The constant ATOM is passed to mention the version
	$TestFeed = new feed(ATOM);
	//Setting the channel elements
	//Use wrapper functions for common elements
	$TestFeed->setTitle('Testing the RSS writer class');
	$TestFeed->setLink('http://www.4sol.ru/rss');
	//For other channel elements, use setChannelElement() function
	$TestFeed->setChannelElement('updated', date(DATE_ATOM , time()));
	$TestFeed->setChannelElement('author', array('name'=>'Komarov Maksim <komarov4sol@gmail.com>'));

	//Adding a feed. Genarally this protion will be in a loop and add all feeds.

	//Create an empty FeedItem
	$newItem = $TestFeed->createNewItem();
	
	//Add elements to the feed item
	//Use wrapper functions to add common feed elements
	$newItem->setTitle('The first feed');
	$newItem->setLink('http://www.yahoo.com');
	$newItem->setDate(time());
	//Internally changed to "summary" tag for ATOM feed
	$newItem->setDescription('This is test of adding CDATA Encoded description by the php <b>Universal Feed Writer</b> class');

	//Now add the feed item	
	$TestFeed->addItem($newItem);
	
	//OK. Everything is done. Now genarate the feed.
	$TestFeed->genarateFeed();
  
?>

