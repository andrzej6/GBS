<?php

include('config.php');

$description = "What the British media -BBC, press and radio- are saying about sitting and sit-stand";

$keywords = "get-britain-standing, active-working, productive-working, office-productivity, sit-stand,
            media-BBC-sit-stand, press–radio-sit-stand, sit-stand-desk, standing-desk, height-adjustable-desk, healthy-office";

$title = "What the British media are saying about Sitting and Sit-Stand";



list($menu, $submenu) = array('media','coverage');
include($_SERVER['DOCUMENT_ROOT'].$rootpath.'/headsect.php');

?>



<body>



<?php
include($_SERVER['DOCUMENT_ROOT'].$rootpath.'/header.php');
?>





<!-- C O N T E N T -->

<div class="content_wrapper">

    <div class="container">

        <div class="content_block no-sidebar row">

            <div class="fl-container span12">

                <div class="row">

                    <div class="posts-block span12">

                        <div class="contentarea">







                            <div class="row-fluid">





                                <div class="customnav"><a href="index.php" >Home</a> >> Media</div><br/>





                                <h1>What do the British media say about sitting?</h1>

                                <br/>

                                <br/>																<?php include('media-buttons.php'); ?>

                                <br/><br/><br/>
                                <?php

                                $conn = new PDO('mysql:host=localhost;dbname=laravel_project', $username, $password);
                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                                $data = $conn->query('SELECT * FROM articles where country LIKE "%1%" and date_posted > "2018-01-01" order by date_posted desc');



                                foreach ($data as $article)
                                {
                                    ?>
                                    <div class="mediarow">
                                        <div class="medialeft">
                                            <a href="<?php echo $article['alink']; ?>" target="_blank">
                                                <img src="<?php print $publicroot; ?>/img/general/media/<?php echo $article['logo']; ?>" width="88" height="88" class="alignleft" alt=""/>
                                            </a>
                                        </div>

                                        <div class="mediatitle">
                                            <strong><?php echo $article['title']; ?></strong><br/>
                                            <?php echo date_format(new DateTime($article['date_posted']), 'jS M Y') ?>
                                        </div>


                                        <?php if ($article['audio'] ==1 ) {?>
                                            <div  class="mediaright player">
                                                <audio controls >
                                                    <source src="<?php print $publicroot; ?>/img/general/audio/<?php echo $article['alink']; ?>.mp3" type="audio/mpeg">
                                                    <embed height="50" width="100" src="<?php print $publicroot; ?>/img/general/audio/<?php echo $article['alink']; ?>.mp3">
                                                </audio>
                                            </div>

                                        <?php } else { ?>
                                            <div  class="mediaright">
                                                <a href="<?php echo $article['alink']; ?>"
                                                   target="_blank" class="shortcode_button btn_small btn_type6">
                                                    Read more</a>
                                            </div>
                                        <?php } ?>

                                        <div class="clear"></div>
                                    </div>
                                    <br/>

                                <?php } ?>



                            </div><!-- .row-fluid -->



                            <div class="row-fluid">



                            </div><!-- .row-fluid -->





                        </div> <!--contentarea-->







                    </div>  <!--post block span12-->



                    <div class="left-sidebar-block span3">

                        <!-- Left Sidebar Text -->

                    </div><!-- .left-sidebar -->





                </div>  <!-- row -->

                <div class="clear"><!-- ClearFix --></div>





            </div><!-- .fl-container -->



            <div class="right-sidebar-block span3">

                <aside class="sidebar">



                </aside>

            </div><!-- .right-sidebar -->







            <div class="clear"><!-- ClearFix --></div>





        </div>  <!-- content-block no-sidebar row -->

    </div><!-- .container -->

</div><!-- .content_wrapper -->









<?php

include($_SERVER['DOCUMENT_ROOT'].$rootpath."/prefooter.php");
include($_SERVER['DOCUMENT_ROOT'].$rootpath."/footer.php");

?>





</body>

</html>