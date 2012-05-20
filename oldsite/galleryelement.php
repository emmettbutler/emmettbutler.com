<?php

//i think there needs to be a tag object that has a field for how many times it's been used....ugh lame

class galleryElement {
    private $name;
    private $image;
    private $href;
    private $description;
    private $date;
    private $tags;

    private $found;

    private static $allTags = array();

    public function galleryElement($name, $image, $href, $description, $date, $tags){
        $this->tags = array();


        $found = false;

        $this->name = $name;
        $this->image = $image;
        $this->href = $href;
        $this->description = $description;
        $this->date = $date;
        $this->tags = $tags;
    }

    public function getName(){
        return $this->name;
    }

    public function getImage(){
        return $this->image;
    }

    public function getHref(){
        return $this->href;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getDate(){
        return $this->date;
    }

    public function getTags(){
        return $this->tags;
    }

    public function getAllTags(){
        return self::$allTags;
    }
}

$elements = array();

$elements[] = new galleryElement(
    "Dokideux Panikku",
    "images/gallery/dokideux.png",
    "../dokideux",
    "My friend <a href='http://twitter.com/radstronomical'>Diego</a> and I made this game in a matter of hours for the What Would Molydeux? game jam. It's a classic platformer proof-of-concept with the added twist that the character you control is scared of you. If you press the buttons too fast, he gets freaked out and freezes in terror. Made with Actionscript Flixel. Source on <a href='https://github.com/emmett9001/Dokideux-Panikku'>Github</a>",
    "4/1/2012",
    array("programming", "game", "twitter", "actionscript", "flash", "flixel")
);

$elements[] = new galleryElement(
    "space_dad",
    "images/gallery/spacedad.png",
    "http://twitter.com/space_dad",
    "I built this Twitter bot as a hobby project over the 2011/2012 school year. It's driven by a python script that scrapes Urban Dictionary, a slew of questionable free ebooks, and a number of other sources for content and tweets that content every once in a while. Sometimes, just to keep things interesting, it translates its tweets to Japanese and then back to English. The goal here is non-sequitur based comedy, and so far space_dad seems to be doing well. DISCLAIMER: Please don't hold me responsible for the things he tweets, I don't write them. Source on <a href='http://github.com/emmett9001/python_bits/blob/master/twit_bot.py'>Github</a> and <a href='http://github.com/emmett9001/python_bits/blob/master/scraper.py'>the scraper</a>",
    "11/19/2011",
    array("programming", "python", "twitter", "bot", "hack")
);

$elements[] = new galleryElement(
    "TumblrTV",
    "images/gallery/tumblrtv.png",
    "tumblrtv",
    "I built this tumblr/boxee mashup with three friends at the fall 2011 HackNY hackathon. It reads your tumblr dashboard for youtube videos and plays them back in a boxee-friendly television visualization. Source on <a href=\"http://github.com/emmett9001/hackny\">Github</a>",
    "10/2/2011",
    array("backend", "websites", "hackathon", "programming", "jquery", "tumblr", "boxee")
);

$elements[] = new galleryElement(
    "Wonderleague",
    "images/gallery/wonderleague_screen.png",
    "http://phatqao.imgur.com/wonderleague_caps#AbhDL",
    "This site was made for a friend's upcoming musical endeavor, and is based on my first custom Wordpress theme. It also incorporates an early version of <a href=\"http://github.com/emmett9001/content-management-system\">this content management system</a> to handle data entry on the subpages.",
    "8/24/2011",
    array("web design", "websites", "wordpress", "programming", "php")
);

$elements[] = new galleryElement(
    "The Corbly Association",
    "images/gallery/corbly_screen.png",
    "images/gallery/corbly_screen.png",
    "A site I made for the John Corbly Historical Association in western PA. This design is simple and professional, using Javascript dropdown menus to enhance the user's experience. This site also uses Javascript to load subpages, so navigating between them does not trigger a pageload.",
    "8/24/2011",
    array("web design", "websites", "programming", "php", "javascript")
);

$elements[] = new galleryElement(
    "Quadroopl",
    "images/gallery/quadroopl.png",
    "quadroopl",
    "An app I made after my cousin complained about the abundant spam in his twitter feed. It filters out each user's top tweet, removing all other tweets to give you a quick, spam-free update on the most talked-about tweets of your feed. Source: <a target=\"_blank\" href=\"http://github.com/emmett9001/quadroopl\">Github</a>",
    "7/19/2011",
    array("web dev", "twitter", "websites", "programming", "php", "javascript")
);

$elements[] = new galleryElement(
    "Spaceratops",
    "images/gallery/spaceratops.png",
    "files/spaceratops/launch.html",
    "I made this game about \"dinosaurs that fly through space and shoot lasers from their horns\" in my spare time. I coded the engine from scratch in Java, drew the sprites, and composed the music. Still, though, my favorite part is the rainbow gun. It ended up winning the award for Best Undergraduate Presentation at the 2011 NYU Music Technology open house. Thanks, dinosaurs! Source: <a target=\"_blank\" href=\"https://github.com/emmett9001/Spaceratops\">Github</a>",
    "3/20/2011",
    array("programming", "Java", "dinosaurs", "games", "8-bit")
);

$elements[] = new galleryElement(
    "Spaceratops theme music",
    "images/gallery/notes.png",
    "http://soundcloud.com/raised-by-robots/theme",
    "Another piece I created in LSDJ - the emulator, not the GameBoy cartridge. I play guitar on this one too.",
    "3/11/2011",
    array("music", "8-bit", "chiptune")
);

$elements[] = new galleryElement(
    "Level Two",
    "images/gallery/notes.png",
    "http://soundcloud.com/raised-by-robots/level-2",
    "A piece I composed and recorded using Little Sound DJ, the GameBoy chip controller software. Also there's some guitar playing - that's me too.",
    "3/3/2011",
    array("music", "8-bit", "chiptune")
);

$elements[] = new galleryElement(
    "Level Three",
    "images/gallery/notes.png",
    "http://soundcloud.com/raised-by-robots/level-three",
    "Writing music with a GameBoy emulator is fun. The interface is predictably clunky, but the resuting sound is totally real. This is another of my chip creations.",
    "2/20/2011",
    array("music", "8-bit", "chiptune")
);

$elements[] = new galleryElement(
    "Level One",
    "images/gallery/notes.png",
    "http://soundcloud.com/raised-by-robots/level-one",
    "My first experience with Little Sound DJ. I was going for a Mega Man feel with nothing but GameBoy sounds.",
    "12/14/2010",
    array("music", "8-bit", "chiptune")
);

$elements[] = new galleryElement(
    "\"Get Low\" bluegrass cover",
    "images/gallery/notes.png",
    "http://soundcloud.com/raised-by-robots/get-low-final",
    "I produced and co-engineered this bluegrass version of \"Get Low\" by Lil' Jon and the East Side Boyz. We were going for ridiculosity with a refined touch - we at least succeeded in making it ridiculous.",
    "12/10/2010",
    array("music", "bluegrass")
);

$elements[] = new galleryElement(
    "Mouse Mouse",
    "images/gallery/mouse.png",
    "files/mousemouse/launch.html",
    "This is the first game I ever made. It was the final project for my computer science 101 class. Looking at the source, it's obvious that it was my first game. That said, it is surprisingly addictive. Source: <a target=\"_blank\" href=\"https://github.com/emmett9001/Mouse-Mouse\">Github</a>",
    "5/15/2010",
    array("games", "Java", "programming")
);

$elements[] = new galleryElement(
    "\"PLO Style\" remix beat",
    "images/gallery/notes.png",
    "http://soundcloud.com/raised-by-robots/plo-style",
    "I composed and arranged this instrumental for a remix of Method Man's \"PLO Style\" after listening to a lot of Ratatat. It was all done in Logic Express, and mixed in one of the NYU recording studios.",
    "3/14/2010",
    array("music", "hip-hop")
);

foreach($elements as $current){
    if(in_array($_GET['filter'], $current->getTags()) || $filter == "all"){

        $size=getimagesize($current->getImage());
        $width=$size[0];
        $height=$size[1];
        $scale=$width/80;
        $thumb_width=80;
        $thumb_height=$size[1]/$scale;

        echo "<div id=\"gallery-entry\">";
        echo "<div id=\"gallery-entry-image\">";
        echo "<a target=\"_blank\" href=\"" . $current->getHref() . "\"><img src=\"" . $current->getImage() . "\" width=" . $thumb_width . " height=" . $thumb_height . "></a><br/>";
        echo "</div>";
        echo "<div id=\"gallery-entry-content\">";
        echo "<div id=\"gallery-entry-title\">";
        echo "<a target=\"_blank\" href=\"" . $current->getHref() . "\">" . $current->getName() . "</a></div>";
        echo "<div id=\"gallery-entry-timestamp\">Added on " . $current->getDate() . "</div>";
        echo $current->getDescription();
        echo "<div id=\"gallery-entry-tags\">Filed under: ";
        foreach($current->getTags() as $tag){
            echo "<a href=\"gallery.php?filter=" .$tag . "\">" . $tag . "</a>, ";
        }
        echo "</div></div></div>";
        echo "<br><br>";
    }
}

foreach($elements as $element){
    foreach($element->getTags() as $entryTag){
        if($allTags[0]){
            foreach($allTags as $globalTag){
                if($entryTag == $globalTag) $found = true;
            }
            if(!$found) $allTags[] = $entryTag;
            $found = false;
        }
        else $allTags[0] = $entryTag;
    }
}

?>
