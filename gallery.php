<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
    
    <head>
        
        <title>Emmett Butler: Gallery</title>
        
        <meta name="author" content="Emmett Butler for http://emmettbutler.com">
        <meta name="keywords" content="Emmett,Butler,web,design,programmer,musician,music,drawing,draw,games,person,NYU"/>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=7" />
            
        <link rel="stylesheet" href="style.css">
        <link href="favicon.ico" rel="shortcut icon" type="image/ico" />
            
        <!--[if IE]>
            <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        
    </head>
    
    <body>
        
        <div id="main">
            
            <?php include("header.html"); ?>
            
            <div id="boxwrapper-left">
                <div id="boxtop-left"></div>
                <div id="box-left">
                    <div id="box-header">
                        <a href="gallery.php?filter=all"><img src="images/galleryheader.png"></a>
                    </div>
                    <div id="box-content">
                        Viewing
                        <?php
                            if(isset($_GET['filter'])) $filter = $_GET['filter'];
                            else $filter = "all";
                            if($filter == "all") echo " all entries"; else echo " entries tagged \"" . $filter . "\""; echo "<br/><br/>"; include("galleryelement.php");
                        ?>
                    </div>
                </div>
                <div id="boxbottom-left"></div>
            </div>
            
            <div id="boxwrapper-right">
                <div id="boxtop-right"></div>
                <div id="box-right">
                    <div id="box=header">
                        
                    </div>
                    <div id="box-content">
                        Here is a list of things I've made, organized by date. It's a various collection, including drawings, music recordings, websites, games, and more. As such, you can filter the list to see only what you want to see by clicking on tags in the box below. For example, if you want to listen to my music, click "music", or click "8bit" for anything relating to old video games.<br/><br/>If a web design project links to an image instead of the website itself, that means the full site is coming soon!
                    </div>
                </div>
                <div id="boxbottom-right"></div>
            </div>
            
            <div id="boxwrapper-right">
                <div id="boxtop-right"></div>
                <div id="box-right">
                    <div id="box-header">
                        <a href="gallery.php?filter=all">All Tags</a>
                    </div>
                    <div id="box-content">
                        <?php
                            foreach($allTags as $tag){
                                echo "<a href=\"gallery.php?filter=" . $tag . "\">" . $tag . "</a> - ";
                            }
                            echo "<br>";
                        ?>
                    </div>
                </div>
                <div id="boxbottom-right"></div>
            </div>
            
            <?php include("footer.html"); ?>
            
        </div>
        
    </body>
    
</html>
