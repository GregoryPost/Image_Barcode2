<?php
/* vim: set expandtab tabstop=4 softtabstop=4 shiftwidth=4: */

/**
 * Image_Barcode2_Driver_Code39_Extended class
 */

require_once 'Image/Barcode2/Driver/Code39.php';
require_once 'Image/Barcode2/Exception.php';

/**
 * Code 3 of 9 Extended
 
 * @author    Gregory Post
 * @copyright 2025
 * 
 */

class Image_Barcode2_Driver_Code39_Extended extends Image_Barcode2_Driver_Code39
{

    /**
     * Class constructor
     *
     * @param Image_Barcode2_Writer $writer Library to use.
     */
    public function __construct(Image_Barcode2_Writer $writer) 
    {
        parent::__construct($writer);
        $this->setBarcodeHeight(50);
        $this->setBarcodeWidthThin(1);
        $this->setBarcodeWidthThick(3);

        $this->_codingmap = array_merge( $this->_codingmap,
            array(
            /** 
            chr(0) => $this->_codingmap['%'] . '0' . $this->_codingmap['U'],
            chr(1) => $this->_codingmap['$'] . '0' . $this->_codingmap['A'],  
            chr(2) => $this->_codingmap['$'] . '0' . $this->_codingmap['B'], 
            chr(3) => $this->_codingmap['$'] . '0' . $this->_codingmap['C'], 
            chr(4) => $this->_codingmap['$'] . '0' . $this->_codingmap['D'], 
            chr(5) => $this->_codingmap['$'] . '0' . $this->_codingmap['E'], 
            chr(6) => $this->_codingmap['$'] . '0' . $this->_codingmap['F'], 
            chr(7) => $this->_codingmap['$'] . '0' . $this->_codingmap['G'], 
            chr(8) => $this->_codingmap['$'] . '0' . $this->_codingmap['H'], 
            chr(9) => $this->_codingmap['$'] . '0' . $this->_codingmap['I'], 
            chr(10) => $this->_codingmap['$'] . '0' . $this->_codingmap['J'], 
            chr(11) => $this->_codingmap['$'] . '0' . $this->_codingmap['K'], 
            chr(12) => $this->_codingmap['$'] . '0' . $this->_codingmap['L'], 
            chr(13) => $this->_codingmap['$'] . '0' . $this->_codingmap['M'], 
            chr(14) => $this->_codingmap['$'] . '0' . $this->_codingmap['N'], 
            chr(15) => $this->_codingmap['$'] . '0' . $this->_codingmap['O'], 
            chr(16) => $this->_codingmap['$'] . '0' . $this->_codingmap['P'], 
            chr(17) => $this->_codingmap['$'] . '0' . $this->_codingmap['Q'], 
            chr(18) => $this->_codingmap['$'] . '0' . $this->_codingmap['R'], 
            chr(19) => $this->_codingmap['$'] . '0' . $this->_codingmap['S'], 
            chr(20) => $this->_codingmap['$'] . '0' . $this->_codingmap['T'], 
            chr(21) => $this->_codingmap['$'] . '0' . $this->_codingmap['U'], 
            chr(22) => $this->_codingmap['$'] . '0' . $this->_codingmap['V'], 
            chr(23) => $this->_codingmap['$'] . '0' . $this->_codingmap['W'], 
            chr(24) => $this->_codingmap['$'] . '0' . $this->_codingmap['X'], 
            chr(25) => $this->_codingmap['$'] . '0' . $this->_codingmap['Y'], 
            chr(26) => $this->_codingmap['$'] . '0' . $this->_codingmap['Z'], 
            chr(27) => $this->_codingmap['%'] . '0' . $this->_codingmap['A'], 
            chr(28) => $this->_codingmap['%'] . '0' . $this->_codingmap['B'], 
            chr(29) => $this->_codingmap['%'] . '0' . $this->_codingmap['C'], 
            chr(30) => $this->_codingmap['%'] . '0' . $this->_codingmap['D'], 
            chr(31) => $this->_codingmap['%'] . '0' . $this->_codingmap['E'],
            */
            '!' => $this->_codingmap['/'] . '0' . $this->_codingmap['A'],	
            '"' => $this->_codingmap['/'] . '0' . $this->_codingmap['B'],	
            '#' => $this->_codingmap['/'] . '0' . $this->_codingmap['C'],	
            '&' => $this->_codingmap['/'] . '0' . $this->_codingmap['F'],	
            "'" => $this->_codingmap['/'] . '0' . $this->_codingmap['G'],	
            '(' => $this->_codingmap['/'] . '0' . $this->_codingmap['H'],	
            ')' => $this->_codingmap['/'] . '0' . $this->_codingmap['I'],	
            ',' => $this->_codingmap['/'] . '0' . $this->_codingmap['L'],	
            ':' => $this->_codingmap['/'] . '0' . $this->_codingmap['Z'],	
            ';' => $this->_codingmap['%'] . '0' . $this->_codingmap['F'],	
            '<' => $this->_codingmap['%'] . '0' . $this->_codingmap['G'],	
            '=' => $this->_codingmap['%'] . '0' . $this->_codingmap['H'],	
            '>' => $this->_codingmap['%'] . '0' . $this->_codingmap['I'],	
            '?' => $this->_codingmap['%'] . '0' . $this->_codingmap['J'],
            '@' => $this->_codingmap['%'] . '0' . $this->_codingmap['V'],	
            '[' => $this->_codingmap['%'] . '0' . $this->_codingmap['K'],
            "\\" => $this->_codingmap['%'] . '0' . $this->_codingmap['L'],
            ']' => $this->_codingmap['%'] . '0' . $this->_codingmap['M'],
            '^' => $this->_codingmap['%'] . '0' . $this->_codingmap['N'], 
            '_' => $this->_codingmap['%'] . '0' . $this->_codingmap['O'],
            '`' => $this->_codingmap['%'] . '0' . $this->_codingmap['W'],
            'a' => $this->_codingmap['+'] . '0' . $this->_codingmap['A'],
            'b' => $this->_codingmap['+'] . '0' . $this->_codingmap['B'],
            'c' => $this->_codingmap['+'] . '0' . $this->_codingmap['C'],
            'd' => $this->_codingmap['+'] . '0' . $this->_codingmap['D'],
            'e' => $this->_codingmap['+'] . '0' . $this->_codingmap['E'],
            'f' => $this->_codingmap['+'] . '0' . $this->_codingmap['F'],
            'g' => $this->_codingmap['+'] . '0' . $this->_codingmap['G'],
            'h' => $this->_codingmap['+'] . '0' . $this->_codingmap['H'],
            'i' => $this->_codingmap['+'] . '0' . $this->_codingmap['I'],
            'j' => $this->_codingmap['+'] . '0' . $this->_codingmap['J'],
            'k' => $this->_codingmap['+'] . '0' . $this->_codingmap['K'],
            'l' => $this->_codingmap['+'] . '0' . $this->_codingmap['L'],
            'm' => $this->_codingmap['+'] . '0' . $this->_codingmap['M'],
            'n' => $this->_codingmap['+'] . '0' . $this->_codingmap['N'],
            'o' => $this->_codingmap['+'] . '0' . $this->_codingmap['O'],
            'p' => $this->_codingmap['+'] . '0' . $this->_codingmap['P'],
            'q' => $this->_codingmap['+'] . '0' . $this->_codingmap['Q'],
            'r' => $this->_codingmap['+'] . '0' . $this->_codingmap['R'],
            's' => $this->_codingmap['+'] . '0' . $this->_codingmap['S'],
            't' => $this->_codingmap['+'] . '0' . $this->_codingmap['T'],
            'u' => $this->_codingmap['+'] . '0' . $this->_codingmap['U'],
            'v' => $this->_codingmap['+'] . '0' . $this->_codingmap['V'],
            'w' => $this->_codingmap['+'] . '0' . $this->_codingmap['W'],
            'x' => $this->_codingmap['+'] . '0' . $this->_codingmap['X'],
            'y' => $this->_codingmap['+'] . '0' . $this->_codingmap['Y'],
            'z' => $this->_codingmap['+'] . '0' . $this->_codingmap['Z'],
            '{' => $this->_codingmap['%'] . '0' . $this->_codingmap['P'],
            '|' => $this->_codingmap['%'] . '0' . $this->_codingmap['Q'],
            '}' => $this->_codingmap['%'] . '0' . $this->_codingmap['R'],
            '~' => $this->_codingmap['%'] . '0' . $this->_codingmap['S']
            //chr(127) => $this->_codingmap['%'] . '0' . $this->_codingmap['T']
            )
        );

    }

    /**
     * Validate barcode
     *
     * @return void
     * @throws Image_Barcode2_Exception
     */
    public function validate()
    {
        // Check barcode for invalid characters
        if (preg_match("/[^ -~]/", $this->getBarcode())) {
            throw new Image_Barcode2_Exception('Invalid barcode');
        }
    }
}
