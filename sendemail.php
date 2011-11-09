<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
    <head>
        
        <title>Emmett Butler: Contact</title>
        
        <meta name="author" content="Emmett Butler for http://emmettbutler.com"/>
        <meta http-equiv="refresh" content="8; URL=contact.php">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=7" />
        
        <!--
            block header font is M32_Complete from mfs.jp.org, size 74, #ffff00
            
        -->
        
        <link rel="stylesheet" href="style.css"/>
        <link href="favicon.ico" rel="shortcut icon" type="image/ico" />
        
        <!--[if IE]>
            <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        
    </head>
    
    <body>
        
        <div id="main">
        
            <?php include("header.html"); ?>
        
            <div id="notify">
                
                <img src="images/pretty.gif"/><br/>
                
                <?php
                    
                    $to = "emb427@nyu.edu";
                    $from = $_POST['name'];
                    $subject = $_POST['subject'];
                    $subjectline = $from . ": " . $subject;
                    $body = $_POST['message'] . "\n\nSent automatically from emmettbutler.com";
                 
                    if($body && $subject){
                        if (mail($to, $subjectline, $body)) {
                            echo "Thanks, your message was sent successfully!<br/><br/>We're redirecting you right now.<br>If you're not automatically redirected, <a href=\"contact.php\">click here</a>";
                        } else {
                            echo "Your message failed to send - sorry about that. My bad.<br/><br/>We're redirecting you right now.<br>If you're not automatically redirected, <a href=\"contact.php\">click here</a>";
                        }
                    }
                    else if(!$body){
                        echo "Please include some content in your message.<br/><br/>We're redirecting you right now.<br>If you're not automatically redirected, <a href=\"contact.php\">click here</a>";
                    }
                    else if(!$subject){
                        echo "Please include a subject line.<br/><br/>We're redirecting you right now.<br/>If you're not automatically redirected, <a href=\"contact.php\">click here</a>";
                    }
            
                ?>
            </div>
            
            <?php include("footer.html"); ?>
            
        </div>
        
    </body>
</html>