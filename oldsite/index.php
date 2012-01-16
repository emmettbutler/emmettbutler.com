<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
<head>
    
    <title>Emmett Butler: Programmer, Musician, Person</title>
    
    <meta name="author" content="Emmett Butler for http://emmettbutler.com"/>
    <meta name="keywords" content="Emmett,Butler,web,design,programmer,music,drawing,NYU,technology,computer,science,programming"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=7" />
    
    <!--
	block header font is M32_Complete from mfs.jp.org, size 74, #ffff00
    -->
    
    <link href="favicon.ico" rel="shortcut icon" type="image/ico" />
    <link rel="stylesheet" href="style.css"/>
    
    <!--[if IE]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
</head>

<body>
    
    <div id="main">
        
        <?php include("header.html"); ?>
	
	<div id="blogwrapper">
	    <div id="boxtop-left"></div>
	    <div id="blog">
		
		<div id="blog-header">
		    <a target=\"_blank\" href="http://emmettbutler.com/threestegosaurusmoon"><img src="images/blog.png"/></a>
		</div>
		<?php
		
		    $feedUrl = 'http://emmettbutler.com/threestegosaurusmoon/?feed=rss2';
		    $ret = array();
		    
		    // retrieve search results 
		    if($xml = @simplexml_load_file($feedUrl)) {  //load xml file using simplexml        
			$result["item"] = $xml->xpath("/rss/channel/item"); //divide feed into array elements around item tags
		    
			foreach($result as $key => $attribute) { 
			    $i=0; 
			    foreach($attribute as $element) { 
				 if($i < 3){
				    $ret[$i]['title'] = (string)$element->title; //assign the desired elements to array entries
				    $ret[$i]['timestamp'] = (string)$element->pubDate;
				    $ret[$i]['summary'] = (string)$element->description;
				    $ret[$i]['link'] = (string)$element->guid;
				    $i++;
				 }
			    } 
			} 
		    } else {
			echo "Sorry, the blog feed is currently down. Please refresh the page, or try again later (or visit <a href=\"http://threestegosaurusmoon.com\">the blog</a>.";
		    }
		    
		    foreach($ret as $article){
			echo "<section id=\"entry\">";
			echo "<section id=\"blogpost-name\"><a target=\"_blank\" href=\"" . $article['link'] . "\">" . $article['title'] . "</a></section>";
			echo "<section id=\"timestamp\">" . $article['timestamp'] . "</section>";
			echo "<section id=\"summary\"><a target=\"_blank\" href=\"" . $article['link'] . "\">" . $article['summary'] . "</a></section>";
			echo "</section>";
		    }
		?>
		<div id="followlink">
		    <a a target=\"_blank\" href="http://emmettbutler.com/threestegosaurusmoon"><img src="images/readmyblog.png"></a>
		</div>
	    </div>
	    <div id="boxbottom-left"></div>
	</div>
        
    <div id="boxwrapper-right">
        <div id="boxtop-right"></div>
        <div id="box-right">
            <div id="box-header"></div>
            <div id="box-content">
                This is the personal website of Emmett Butler. If ths is your first time visiting, <a href="bio.php">check this out</a>. Additionally, please <a href="contact.php">contact me</a> if you'd like to reproduce any work found on this site.
            </div>
        </div>
        <div id="boxbottom-right"></div>
    </div>

	<div id="tumblrwrapper">
	    <div id="tumblrboxtop"></div>
	    <div id="tumblr">
		<div id="tumblelog-title">
		    <a target=\"_blank\" href="http://emmett9001.tumblr.com"><img src="images/tumblr.png"/></a>
		</div>
		<div id="tumblr-body">
		    <script type="text/javascript" src="http://emmett9001.tumblr.com/js?num=3"></script>
		</div>
		<div id="followlink">
		    <a a target=\"_blank\" href="http://emmett9001.tumblr.com"><img src="images/followme.png"></a>
		</div>
	    </div>
	    <div id="tumblrboxbottom"></div>
	</div>
	
	<div id="twitterwrapper">
	    <div id="boxtop-left"></div>
	    <div id="twitter">
		<div id="twitter_div">
		    <div id="twitter-title"><a target=\"_blank\" href="http://twitter.com/emmett9001">
			    <img src="images/twitter.png"/>
		    </a></div>
		    <ul id="twitter_update_list"></ul>
		</div>
		<script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
		<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/emmett9001.json?callback=twitterCallback2&count=11"></script>
		<?php
		/*
		    $feedUrl = 'http://twitter.com/statuses/user_timeline/204428062.rss';
		    $ret = array();
		    
		    // retrieve search results 
		    if($xml = simplexml_load_file($feedUrl)) {  //load xml file using simplexml        
			$result["item"] = $xml->xpath("/rss/channel/item"); //divide feed into array elements around item tags
		    
			foreach($result as $key => $attribute) { 
			    $i=0; 
			    foreach($attribute as $element) { 
				 if($i < 8){
				    $ret[$i]['timestamp'] = (string)$element->pubDate;
				    $ret[$i]['summary'] = (string)$element->description;
				    $ret[$i]['summary'] = preg_replace("/emmett9001: /", "", $ret[$i]['summary']);
				    $ret[$i]['summary'] = preg_replace("#(^|[\n ])@([^ \"\t\n\r<]*)#ise", "'\\1<a href=\"http://www.twitter.com/\\2\" >@\\2</a>'", $ret[$i]['summary']);
				    $ret[$i]['summary'] = preg_replace("#(^|[\n ])([\w]+?://[\w]+[^ \"\n\r\t<]*)#ise", "'\\1<a href=\"\\2\" >\\2</a>'", $ret[$i]['summary']);
				    $ret[$i]['summary'] = preg_replace("#(^|[\n ])((www|ftp)\.[^ \"\t\n\r<]*)#ise", "'\\1<a href=\"http://\\2\" >\\2</a>'", $ret[$i]['summary']);
				    $ret[$i]['link'] = (string)$element->guid;
				    $i++;
				 }
			    } 
			} 
		    }
		    
		    foreach($ret as $article){
			echo "<section id=\"tweet\">";
			echo "<section id=\"summary\">" . $article['summary'] . "</section>";
			echo "<section id=\"tweet-timestamp\">" . $article['timestamp'] . "</section>";
			echo "</section>";
		    }*/
		?>
		<div id="followlink">
		    <a a target=\"_blank\" href="http://twitter.com/emmett9001"><img src="images/followme.png"></a>
		</div>
	    </div>
	    <div id="boxbottom-left"></div>
	</div>
	
	<?php include("footer.html"); ?>
    
    </div>
    
</body>
    
</html>
