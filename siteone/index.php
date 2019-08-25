<!DOCTYPE html>
<html>
    <head>

        <title></title>
        <style>
        table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        }

        tr:nth-child(even) {
        background-color: #dddddd;
        }
        </style>
    </head>

    <body>

    <h2>Site One : https://www.uaeexchange.com/uae-currency-rates</h2>

    <?php

        include_once 'simple_html_dom.php';

        $url = 'https://www.uaeexchange.com/uae-currency-rates';
        $context = stream_context_create(array('http' => array('header' => 'User-Agent: Mozilla compatible')));
        $response = file_get_contents($url, false, $context);
        $html = str_get_html($response);

        $table = $html->find('table', 0);
        $allData = array();

        foreach ($table->find('tr') as $row) {
            $eachRow = array();
            foreach ($row->find('td') as $cell) {
                $eachRow[] = $cell->plaintext;
            }

            $allData[] = $eachRow;
        }

        $firstRowIgnore = false;

        echo '<table>';

        //header
        echo '<tr>';
            echo '<td>Country Name</td><td>Code</td><td>Bank Transfer</td>';
        echo '</tr>';
        
        foreach ($allData as $row => $tr) {

            if (!$firstRowIgnore) {
                $firstRowIgnore = true;
                continue;
            }

            echo '<tr>';
            foreach ($tr as $td) {
                echo '<td>' . $td . '</td>';
            }

            echo '</tr>';

        }
        echo '</table>';

    ?>

    </body>
</html>
