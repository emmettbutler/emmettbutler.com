<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>

    <head>

        <title>Emmett Butler: Contact</title>

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
                        <img src="images/contactheader.png">
                    </div>
                    <div id="box-content">
                        Please don't hesitate to contact me - I'd love to hear from you! Follow me on Twitter, comment on my blog - it's up to you.
                        <section id="contact-list">
                            <a target=\"_blank\" title="Three Stegosaurus Moon" href="http://threestegosaurusmoon.com"><img src="images/media_icons/wordpress.png" width=64 height=64 /></a>
                            <a target=\"_blank\" title="@sensitiveemmett" href="http://twitter.com/sensitiveemmett"><img src="images/media_icons/twitter.png" width=64 height=64 /></a>
			                <a target=\"_blank\" title="Github" href="http://github.com/emmett9001"><img src="images/media_icons/github.png" width=64 height=64 /></a>
                            <a target=\"_blank\" title="emmett9001" href="http://emmett9001.tumblr.com"><img src="images/media_icons/tumblr.png" width=64 height=64 /></a>
                            <a target=\"_blank\" title="LinkedIn" href="http://linkedin.com/in/emmett9001"><img src="images/media_icons/linkedin.png" width=58 height=58 /></a>
                            <a target=\"_blank\" title="Raised by Robots" href="http://soundcloud.com/raised-by-robots"><img src="images/media_icons/soundcloud.png" width=64 height=64 /></a>
                            <a target=\"_blank\" title="Google+" href="https://plus.google.com/110766953489760687934/about"><img src="images/media_icons/gplus.png" width=64 height=64 /></a>
                        </section>
                    </div>
                </div>
                <div id="boxbottom-left"></div>
            </div>

            <div id="boxwrapper-right">
                <div id="boxtop-right"></div>
                <div id="box-right">
                    <div id="box-header">

                    </div>
                    <div id="box-content">
                        <p>You can send me an email using the form below. Name and subject are optional, but I probably won't read an email that doesn't have them.</p>
                        <div id="form-labels">
                            <div id="label-name">Name:</div>
                            <div id="label-sub">Subject:</div>
                            <div id="label-message">Message:</div>
                        </div>
                        <div id="form">
                            <form action="sendemail.php" method="post" enctype="multipart/form-data">
                                <input type="text" size=30 name="name" class="input"/>
                                <input type="text" size=30 name="subject" class="input"/>
                                <textarea name="message" cols=32 rows=11 class="input"></textarea><br/><br/>
                                <input class="submit" type="image" border="0" src="images/emailme.png" value="Send Message!"/>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="boxbottom-right"></div>
            </div>

            <?php include("footer.html"); ?>

        </div>

    </body>

</html>
