<?php

function getTableData($url)
{
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


    // $firstRowIgnore = false;
    // $tableData = '';
    
    // foreach ($allData as $row => $tr) {

    //     if (!$firstRowIgnore) {
    //         $firstRowIgnore = true;
    //         continue;
    //     }

    //     $tableData .= '<tr>';
    //     foreach ($tr as $td) {
    //         $tableData .= '<td>' . $td . '</td>';
    //     }

    //     $tableData .= '</tr>';

    // }
    // $tableData .= '</table>';

    // return $tableData;
    return $allData;
}

?>