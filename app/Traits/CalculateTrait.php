<?php

namespace App\Traits;

trait CalculateTrait {

    public function getValueBasic($budget, $minValue, $maxValue, $porcent )
     {
        $result = $this->getValueSpecial($budget, $porcent);
        return ($result <  $minValue) ?  $minValue : (($result >  $maxValue) ? $maxValue : $result);
     }

     public function getValueSpecial($budget, $porcent ) {
        return ($budget * $porcent / 100);
     }

     public function getAssociatedFees($budget, $associatedFees )  {

        $chosenAssociationFee = 0;
        foreach ($associatedFees as $fee) {
            $range = $this->isInRange($budget, $fee->minimum, $fee->maximum);
            if ($range) {
                $chosenAssociationFee = $fee->value;
                break;
            }
        }

        return $chosenAssociationFee;
     }

     private function isInRange(float $amount, $min, $max)
     {

        if(is_null($max)) 
        {
            return ($amount > $min) ? true: false;
        }
        else
        {
            return ($amount >= $min) && ($amount <= $max);
        }

     }

}