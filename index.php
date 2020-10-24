<?php

    session_start();
    if(isset($_SESSION['admin'])){
        require('config.php');    
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

            <?php
            
            $SQLCOUNTLINKS = "SELECT SUM(id) as total FROM LINKS";
            $rowLinkCount = mysqli_fetch_assoc(mysqli_query($connection, $SQLCOUNTLINKS));

            $SQLCOUNTLINKVIEWS = "SELECT SUM(views) as total FROM LINKS";
            $rowLinkCountView = mysqli_fetch_assoc(mysqli_query($connection, $SQLCOUNTLINKVIEWS));

            $SQLCOUNTLINKHITS = "SELECT SUM(redirected) as total FROM LINKS";
            $rowLinkCountHits = mysqli_fetch_assoc(mysqli_query($connection, $SQLCOUNTLINKHITS));

            $SQLCOUNTPAGES = "SELECT SUM(id) as total FROM `TEXT`";
            $rowPageCount = mysqli_fetch_assoc(mysqli_query($connection, $SQLCOUNTPAGES));

            $SQLCOUNTPAGEVIEWS = "SELECT SUM(views) as total FROM `TEXT`";
            $rowPageCountView = mysqli_fetch_assoc(mysqli_query($connection, $SQLCOUNTPAGEVIEWS));

            $SQLCOUNTPAGEHITS = "SELECT SUM(hits) as total FROM `TEXT`";
            $rowPageCountHits = mysqli_fetch_assoc(mysqli_query($connection, $SQLCOUNTPAGEHITS));



            
            ?>

            <div class="container-fluid px-md-5 px-3 pt-4 mt-2 pb-3">
                <div class="row">

                    <div class="col-md-4 pb-4">
                        <div class="card shadow-sm p-4 border-cus">
                            <div class="d-flex flex-row flex-row-reverse">
                                <div class="d-flex align-self-center text-secondary">
                                   <i class="fa fa-link fa-2x"></i>
                                </div>
                                <div class="d-flex align-self-center flex-fill">
                                    <div class="text-left w-100">
                                        <span class="text-cus">TOTAL LINKS</span><br> <?php print($rowLinkCount['total']); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 pb-4">
                        <div class="card shadow-sm p-4 border-cus">
                            <div class="d-flex flex-row flex-row-reverse">
                                <div class="d-flex align-self-center text-secondary">
                                   <i class="fa fa-eye fa-2x"></i>
                                </div>
                                <div class="d-flex align-self-center flex-fill">
                                    <div class="text-left w-100">
                                        <span class="text-cus">TOTAL VIEWS</span><br> <?php print($rowLinkCountView['total']); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card shadow-sm p-4 border-cus">
                            <div class="d-flex flex-row flex-row-reverse">
                                <div class="d-flex align-self-center text-secondary">
                                   <i class="fa fa-download fa-2x"></i>
                                </div>
                                <div class="d-flex align-self-center flex-fill">
                                    <div class="text-left w-100">
                                        <span class="text-cus">TOTAL HITS</span><br> <?php print($rowLinkCountHits['total']); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>


            <div class="container-fluid px-md-5 px-3 pt-0 mt-0 pb-3">
                <div class="row">

                    <div class="col-md-4 pb-4">
                        <div class="card shadow-sm p-4 border-cus">
                            <div class="d-flex flex-row flex-row-reverse">
                                <div class="d-flex align-self-center text-secondary">
                                   <i class="fa fa-file-text fa-2x"></i>
                                </div>
                                <div class="d-flex align-self-center flex-fill">
                                    <div class="text-left w-100">
                                        <span class="text-cus">TOTAL PAGES</span><br> <?php print($rowPageCount['total']); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 pb-4">
                        <div class="card shadow-sm p-4 border-cus">
                            <div class="d-flex flex-row flex-row-reverse">
                                <div class="d-flex align-self-center text-secondary">
                                   <i class="fa fa-eye fa-2x"></i>
                                </div>
                                <div class="d-flex align-self-center flex-fill">
                                    <div class="text-left w-100">
                                        <span class="text-cus">TOTAL PAGE VIEWS</span><br> <?php print($rowPageCountView['total']); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card shadow-sm p-4 border-cus">
                            <div class="d-flex flex-row flex-row-reverse">
                                <div class="d-flex align-self-center text-secondary">
                                   <i class="fa fa-book fa-2x"></i>
                                </div>
                                <div class="d-flex align-self-center flex-fill">
                                    <div class="text-left w-100">
                                        <span class="text-cus">TOTAL PAGE READS</span><br> <?php print($rowPageCountHits['total']); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class="container-fluid px-md-5 px-3">
                <div class="row shadow mx-0">
                    <div class="col-12 text-cus bg-light px-4 py-3 border-bottom">
                        Link Shortener
                    </div>

                    <div class="col-12">
                        <div class="row py-4">
                            <div class="col-lg-6 col-md-7 col-12 mx-auto">
                                <form onsubmit="return generateLink();">
                                    <div class="input-group">
                                        <input type="url" class="form-control p-4" placeholder="shorten links..." id="longUrl" required>
                                        <input type="submit" class="btn btn-cus-2 px-4 rounded-0 text-white small" value="SHORTEN" onsubmit="generateLink();">
                                    </div>
                                    <div class="input-group pt-4">
                                        <input type="text" class="form-control p-4" placeholder="Title" id="title">
                                        <input type="text" class="form-control p-4" placeholder="Custom Link" id="shortUrl" oninput="checkLink(this.value);">
                                    </div>
                                    <div id="availability-status" class="text-right small py-2"></div>
                                </form>
                                <div id="link-status" class="py-2 text-center small"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid mt-5 px-md-5 px-3">
                <div class="row shadow mx-0">
                    <div class="col-12 text-cus bg-light px-4 py-3 border-bottom">
                        Text Shortner
                    </div>

                    <div class="col-12">
                        <div class="row py-4">
                            <div class="col-lg-6 col-md-7 col-12 mx-auto">
                                <form onsubmit="return generateText();">
                                    <textarea class="form-control p-4" placeholder="Enter long text here" id="longText" required></textarea>
                                    <div class="input-group pt-4">
                                        <input type="text" class="form-control p-4" placeholder="Title" id="Texttitle">
                                        <input type="text" class="form-control p-4" placeholder="Custom Link" id="shortText" oninput="checkText(this.value);">
                                    </div>
                                    <div id="availability-statusText" class="text-right small py-2"></div>
                                    <div class="text-center pt-4">
                                        <input type="submit" class="btn btn-cus-2 px-4 py-2 text-white small" value="SHORTEN" onsubmit="generateText();">
                                    </div>
                                </form>
                                <div id="Text-status" class="py-2 text-center small"></div>
                            </div>
                        </div>
                    </div>
                </div>
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