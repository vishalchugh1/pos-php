<?php    
    //Final total price
    $total = 0;
    //convert the input string into array
	$inputProducts='ABCDABAA'; // Product code
    $inputArray = str_split($inputProducts, 1);	
    //convert the input array into array, which each item as key, and the number of item as value
    $counts = array_count_values($inputArray);
	
    //Building Product price with array 
    $products = array('A'=>array('1'=>2.00, '4'=>7.00), 'B'=>array('1'=>12.00), 'C'=>array('1'=>1.25, '6'=>6.00), 'D'=>array('1'=>0.15));
    foreach($counts as $code=>$qunatity) {
        echo "Code : " . $code . " - Qunatity : ".$qunatity."\n ";		
		
        if(isset($products[$code]) && count($products[$code]) > 1) {  // check bulk price quantity is setup
            $groupUnit = max(array_keys($products[$code]));        
		    $subtotal = intval($qunatity / $groupUnit) * $products[$code][$groupUnit] + fmod($qunatity, $groupUnit) * $products[$code]['1'];
            $total += $subtotal; 
        }
        elseif (isset($products[$code])) {
            $subtotal = $qunatity * $products[$code]['1'];
            $total += $subtotal;
        }
        echo "Subtotal: " . $subtotal . "\n <br/>";
    }
    echo 'Final Total: $' . number_format($total, 2). "\n"; 
?>
