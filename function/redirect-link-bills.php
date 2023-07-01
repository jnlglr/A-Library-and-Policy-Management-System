<!DOCTYPE html>

<html>
    <head>
        <?php 
                    // connect to database
                        include ('/home/u174976054/domains/nyclibraryandpolicy.website/public_html/nyclibrary/function/connection.php');
                        $query = "SELECT * FROM `senatebill` ORDER BY title";
                        $result = mysqli_query($db, $query);
                        
                       
                    ?>
                    <?php
                        while($row = mysqli_fetch_array($result)):
                            ?>
                            <?=$url = $row["link"];?> 
                        
                   
        <meta http-equiv="refresh" content="0; url= <?= $url;?>" />
        <?php endwhile; ?>
    </head>
    <body>

    </body>
</html>