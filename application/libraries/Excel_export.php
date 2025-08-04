<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Excel Export Library
 * 
 * A simple library to export data to CSV format
 */
class Excel_export {
    
    protected $CI;
    
    /**
     * Constructor
     */
    public function __construct() {
        $this->CI =& get_instance();
    }
    
    /**
     * Export data to CSV file
     * 
     * @param string $filename The filename for the exported file
     * @param array $headers Array of column headers
     * @param array $data Array of data rows
     * @return void
     */
    public function export_csv($filename, $headers, $data) {
        // Set headers to force download
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=' . $filename);
        
        // Create a file pointer
        $output = fopen('php://output', 'w');
        
        // Add UTF-8 BOM for Excel compatibility
        fputs($output, "\xEF\xBB\xBF");
        
        // Add headers
        fputcsv($output, $headers);
        
        // Add data rows
        foreach ($data as $row) {
            fputcsv($output, $row);
        }
        
        // Close the file pointer
        fclose($output);
        exit;
    }
}
