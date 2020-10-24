
<?php

require ('config.php');

if(isset($_POST['checkUrl'])){
    $url = trim(strtolower($_POST['checkUrl']));
    $SQL = "SELECT * FROM links WHERE short = '$url'";

    if(mysqli_num_rows(mysqli_query($connection, $SQL)) > 0){
        print('<span class="text-danger">This link is not available</span>');
    }else{
        print('<span class="text-success">This link is available</span>');
    }
}

if(isset($_POST['longUrl']) && isset($_POST['shortUrl']) && isset($_POST['title'])){
    $longUrl = $_POST['longUrl'];
    $shortUrl = trim(strtolower($_POST['shortUrl']));
    if(empty($shortUrl)){
        $shortUrl = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 6);
    }

    if(strlen($shortUrl)>6){
        $shortUrl = substr($shortUrl,0,6);
    }


    $title = $_POST['title'];
    if(empty($title)){
        $title = "Short link";
    }
    
    $SQL = "INSERT INTO links(`long`, `short`, `title`)VALUES('$longUrl','$shortUrl','$title')";
    
    if(mysqli_query($connection,$SQL)){
        print('<div class="rounded-pill text-white d-inline-block" style="background-color:rgba(0,0,0,0.75); padding:10px 20px;">Link Shorted as: &nbsp; http://'.$_SERVER['HTTP_HOST']."/a/".$shortUrl.'</div>');
    }else{
        print(mysqli_error($connection));
        print('<span class="text-danger">Opps, Something went wrong!!</span>');
    }

}


if(isset($_POST['checkText'])){
    $textUrl = trim(strtolower($_POST['checkText']));
    $SQL = "SELECT * FROM links WHERE short = '$textUrl'";

    if(mysqli_num_rows(mysqli_query($connection, $SQL)) > 0){
        print('<span class="text-danger">This link is not available</span>');
    }else{
        print('<span class="text-success">This link is available</span>');
    }
}

if(isset($_POST['longText']) && isset($_POST['shortText']) && isset($_POST['Texttitle'])){
    $longText = $_POST['longText'];
    $shortText = trim(strtolower($_POST['shortText']));
    if(empty($shortText)){
        $shortText = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 6);
    }
    if(strlen($shortText)>6){
        $shortText = substr($shortText,0,6);
    }
    $title = $_POST['Texttitle'];
    if(empty($title)){
        $title = "Short Text";
    }
    $SQL = "INSERT INTO `text`(`long`, `short`, `title`)VALUES('$longText','$shortText','$title')";
    
    if(mysqli_query($connection,$SQL)){
        print('<div class="rounded-pill text-white d-inline-block" style="background-color:rgba(0,0,0,0.75); padding:10px 20px">Text Shorted at: &nbsp; http://'.$_SERVER['HTTP_HOST'].'/p/'.$shortText.'</div>');
    }else{
        print(mysqli_error($connection));
        print('<span class="text-danger">Opps, Something went wrong!!</span>');
    }
}

?>
