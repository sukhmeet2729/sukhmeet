<?php
    session_start();
    if(isset($_SESSION['admin'])){
        require('config.php');    
        function time_elapsed_string($datetime, $full = false) {
            $now = new DateTime;
            $ago = new DateTime($datetime);
            $diff = $now->diff($ago);
        
            $diff->w = floor($diff->d / 7);
            $diff->d -= $diff->w * 7;
        
            $string = array(
                'y' => 'year',
                'm' => 'month',
                'w' => 'week',
                'd' => 'day',
                'h' => 'hour',
                'i' => 'minute',
                's' => 'second',
            );
            foreach ($string as $k => &$v) {
                if ($diff->$k) {
                    $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
                } else {
                    unset($string[$k]);
                }
            }
        
            if (!$full) $string = array_slice($string, 0, 1);
            return $string ? implode(', ', $string) . ' ago' : 'just now';
        }        
    ?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php print(WEBSITE_NAME." - ".WEBSITE_TITLE); ?></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/assets/style.css">
        <link rel="stylesheet" type="text/css" href="/assets/font-awesome.min.css">        
        <script src="/assets/function.js"></script>
    </head>
    <body>
        <div class="sidebar bg-cus h-100 position-fixed">
            <?php include("sidebar.php"); ?>
        </div>
        <div class="main position-relative">
            <?php include("header.php"); ?>

            <div class="container-fluid m-4 w-auto p-0 bg-light rounded">
                <?php
                    $SQLLINKS = "SELECT * FROM `TEXT`";
                    $resultLinks = mysqli_query($connection, $SQLLINKS);
                    if(mysqli_num_rows($resultLinks)>0){ ?>

                        <table class="table table-hover">
                          <thead class="thead-light">
                            <tr>
                              <th scope="col">Title</th>
                              <th scope="col">Original Text</th>
                              <th scope="col">Short Link</th>
                              <th scope="col">Visits</th>
                              <th scope="col">Reads</th>
                              <th scope="col">Last Visit</th>
                              <th scope="col">Last Read</th>
                            </tr>
                          </thead>
                          <tbody class="table-striped">


                    <?php
                        while($rowLinks = mysqli_fetch_assoc($resultLinks)){
                            print('<tr>');
                            print('<td>'.$rowLinks['title'].'</td>');

                            if(strlen($rowLinks['long']) > 50){
                                print('<td>'.substr($rowLinks['long'],0,50).'...</td>');
                            }else{
                                print('<td>'.$rowLinks['long'].'</td>');
                            }

                            print('<td><a href="http://'.$_SERVER['HTTP_HOST'].'/p/'.$rowLinks['short'].'" target="_blank">http://'.$_SERVER['HTTP_HOST'].'/p/'.$rowLinks['short'].'</a></td>');
                            print('<td>'.$rowLinks['views'].'</td>');
                            print('<td>'.$rowLinks['hits'].'</td>');

                            if($rowLinks['views'] > 0){
                                $lastview = time($rowLinks['lastview']);
                                print('<td class="position-relative hover-time-c">'.time_elapsed_string($rowLinks['lastview']).'<span class="hover-time">'.date('l, F dS Y, h:i:s a',$lastview).'</span></td>');
                            }else{
                                print('<td>NEVER</td>');
                            }

                            if($rowLinks['hits'] > 0){
                                $lastredirected = time($rowLinks['lasthit']);
                                print('<td  class="position-relative hover-time-cc">'.time_elapsed_string($rowLinks['lasthit']).'<span class="hover-timec">'.date('l, F dS Y, h:i:s a',$lastredirected ).'</span></td>');
                            }else{
                                print('<td>NEVER</td>');
                            }
                            print('</tr>');
                        }
                        ?>
                            </tbody>
                        </table>

                        <?php
                    }else{
                        print('<div class="my-4 text-center p-4">You Have No Text Pages Yet</div>');
                    }
                
                ?>            
            </div>


        </div>

        <div style="clear:both;"></div>

    </body>
    </html>

            

    <?php

}else{
    header("Location:/login");
}
?>


?>
