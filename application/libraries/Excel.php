<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Excel Library for CodeIgniter 3
 * Uses PHP built-in functions to create Excel files
 */
class Excel {
    
    protected $CI;
    
    public function __construct() {
        $this->CI =& get_instance();
    }
    
    /**
     * Generate Excel file from data array
     * 
     * @param string $filename The filename for the exported file
     * @param array $data Array of data rows
     * @param array $header_rows Array of header rows
     * @return void
     */
    public function generate($filename, $data, $header_rows = []) {
        // Set headers for Excel download
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xls"');
        header('Cache-Control: max-age=0');
        
        // Start output buffering
        ob_start();
        
        // Begin Excel file
        echo '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">';
        echo '<head>';
        echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
        echo '<title>' . $filename . '</title>';
        echo '<!--[if gte mso 9]>';
        echo '<xml>';
        echo '<x:ExcelWorkbook>';
        echo '<x:ExcelWorksheets>';
        echo '<x:ExcelWorksheet>';
        echo '<x:Name>Sheet1</x:Name>';
        echo '<x:WorksheetOptions>';
        echo '<x:DisplayGridlines/>';
        echo '</x:WorksheetOptions>';
        echo '</x:ExcelWorksheet>';
        echo '</x:ExcelWorksheets>';
        echo '</x:ExcelWorkbook>';
        echo '</xml>';
        echo '<![endif]-->';
        echo '</head>';
        
        echo '<body>';
        echo '<table border="1">';
        
        // Add header rows if provided
        if (!empty($header_rows)) {
            foreach ($header_rows as $header_row) {
                echo '<tr>';
                foreach ($header_row as $header_cell) {
                    echo '<th style="background-color: #CCCCCC; font-weight: bold; text-align: center;">' . $header_cell . '</th>';
                }
                echo '</tr>';
            }
        }
        
        // Add data rows
        foreach ($data as $row) {
            echo '<tr>';
            foreach ($row as $cell) {
                echo '<td>' . $cell . '</td>';
            }
            echo '</tr>';
        }
        
        echo '</table>';
        echo '</body>';
        echo '</html>';
        
        // End output buffering and flush
        ob_end_flush();
        exit;
    }
}
