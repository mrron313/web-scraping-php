<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title></title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        
        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        
        tr:nth-child(even) {
            background-color: #dddddd;
        }
        
        .div1 {
            margin-top: 4px;
        }
        
        .div2 {
            margin-left: 50px;
            font-size: 22px;
            margin-top: 10px;
            color: white;
            font-weight: bold;
        }
        
        .div3 {
            margin-top: 8px;
        }
        
        .div4 {
            color: white;
            font-weight: bold;
            margin-top: 10px;
            font-size: 22px;
        }

        #transfer3, #transfer2, #transfer{
            color: black
        }
    </style>
</head>

<body>


    <?php

        include_once 'simple_html_dom.php';
        include_once 'functions.php';

        $allData = array();

        // Site One
        $url = 'https://www.uaeexchange.com/uae-currency-rates';
        $allData = getTableData($url);

        echo '<h2>Site One : ' . $url . '</h2>';


        $url = 'http://lm-exchange.com/rates.html';
        $allData2 = getTableData($url);

        // echo '<h2>Site Two : ' . $url . '</h2>';

        // echo '<table>';
        // echo '<tr>';
        //     echo '<td>Country</td><td>Sell (DD/TT)</td><td>Buy (Bank Notes)</td><td>Sell (Bank Notes)</td>';
        // echo '</tr>';

        // echo $allData;

        // // Site Three
        $url = 'http://www.algiex.ae/en/our-exchange-rates';
        $allData3 = getTableData($url);

        // echo '<h2>Site Three : ' . $url . '</h2>';

        // echo '<table>';
        // echo '<tr>';
        //     echo '<td>Code</td><td>Currency Name</td><td>Transfer</td><td>FC Buy</td><td>FC Sell</td>';
        // echo '</tr>';

        // echo $allData;

    ?>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="#">Rxchange Rate Conversions</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

        </nav>

        <main role="main">

            <!-- Main jumbotron for a primary marketing message or call to action -->
            <div class="jumbotron">
                <div class="container">
                    <!-- Site One -->
                    <div class="row bg-info">
                        <div class="col-md-12 bg-dark text-white text-center">
                            <h3>UAE Exchange Centre LLC</h3> <strong>website:</strong> <a href="https://www.uaeexchange.com/uae-currency-rates" target="_blank">https://www.uaeexchange.com/uae-currency-rates</a> 
                        </div>
                        <div class="col-md-3 div1">
                            <img src="img/logo-1.png" alt="" class="img-responsive">
                        </div>
                        <div class="col-md-2 div2">
                            <p> 1 UAE TO</p>
                        </div>
                        <div class="col-md-4 div3">

                            <select name="" id="list" onchange="GetSelectedTextValue(this)" class="form-control">
                            <?php
                            $length = count($allData);
                            echo '<option value=""> Select a country </option>';

                            for($i=2; $i<$length; $i++) {
                                ?>
                                <option value="<?php echo $i ?>"><?php echo ($allData[$i][0]); ?> </option>
                            <?php
                            }
                            ?>
                            </select>

                        </div>
                        <div class="col-md-2 div4">
                            <span>Transfer Rate: </span>
                            <span id="transfer"> </span>
                        </div>
                    </div>
                   

                    <!-- Site two -->
                    <div class="row bg-info mt-5">
                        <div class="col-md-12 bg-dark text-white text-center">
                            <h3>Leela Megh (LM) Exchange Limited</h3> <strong>website:</strong> <a href="http://lm-exchange.com/rates.html" target="_blank">http://lm-exchange.com/rates.html</a> 

                        </div>
                        <div class="col-md-3 div1">
                            <img src="img/logo-2.png" alt="" class="img-responsive" width="200" height="50">
                        </div>
                        <div class="col-md-2 div2">
                            <p>1 UAE TO</p>
                        </div>
                        <div class="col-md-4 div3">
                            <select name="" id="list" onchange="GetSelectedTextValue2(this)" class="form-control">
                                <?php
                                $length = count($allData2);
                                echo '<option value=""> Select a country </option>';

                                for($i=2; $i<$length; $i++) {
                                    ?>
                                    <option value="<?php echo $i ?>"><?php echo ($allData2[$i][0]); ?> </option>
                                <?php

                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-2 div4">
                            <span>Transfer Rate: </span>
                            <span id="transfer2"> </span>
                        </div>
                    </div>
                   
                    <!-- Site three -->
                    <div class="row bg-info mt-5">
                        <div class="col-md-12 bg-dark text-white text-center">
                            <h3></h3>
                            <h3>Al Ghurair International Exchange </h3> <strong>website:</strong> <a href="http://www.algiex.ae/en/our-exchange-rates" target="_blank">http://www.algiex.ae/en/our-exchange-rates</a>

                        </div>
                        <div class="col-md-3 div1">
                            <img src="img/logo-3.png" alt="" class="img-responsive" width="200" height="50">
                        </div>
                        <div class="col-md-2 div2">
                            <p>1 UAE TO</p>
                        </div>
                        <div class="col-md-4 div3">

                            <select name="" id="list" onchange="GetSelectedTextValue3(this)" class="form-control">
                                <?php
                                $length = count($allData3);
                                echo '<option value=""> Select a country </option>';

                                for($i=2; $i<$length; $i++) {
                                    ?>
                                    <option value="<?php echo $i ?>"><?php echo ($allData3[$i][1]); ?> </option>
                                <?php

                                }
                                ?>
                            </select>

                        </div>
                        <div class="col-md-2 div4">
                            <span>Transfer Rate: </span>
                            <span id="transfer3"> </span>
                        </div>
                    </div>
                   
                </div>
            </div>

        </main>


        <script type="text/javascript">
            var selectedText;

            function GetSelectedTextValue(list) {
                selectedText = list.options[list.selectedIndex].value;
                var jarray = <?php echo json_encode($allData); ?>;

                if(selectedText)
                    document.getElementById("transfer").innerHTML = jarray[selectedText][2];
                else
                    document.getElementById("transfer").innerHTML = '';
            }

            var selectedText2;

            function GetSelectedTextValue2(list) {
                selectedText2 = list.options[list.selectedIndex].value;
                var jarray = <?php echo json_encode($allData); ?>;

                if(selectedText2)
                    document.getElementById("transfer2").innerHTML = jarray[selectedText2][2];
                else
                    document.getElementById("transfer2").innerHTML = '';

            }

            var selectedText3;

            function GetSelectedTextValue3(list) {
                selectedText3 = list.options[list.selectedIndex].value;
                var jarray = <?php echo json_encode($allData); ?>;
                
                if(selectedText3)
                    document.getElementById("transfer3").innerHTML = jarray[selectedText3][2];
                else
                    document.getElementById("transfer3").innerHTML = '';

            }
        </script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>