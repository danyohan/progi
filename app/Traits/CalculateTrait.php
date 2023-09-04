<?php

namespace App\Traits;

trait CalculateTrait {

    public function getValueBasic($budget, $minValue, $maxValue, $percent )
     {
        $result = $this->getValueSpecial($budget, $percent);
        return ($result <  $minValue) ?  $minValue : (($result >  $maxValue) ? $maxValue : $result);
     }

     public function getValueSpecial($budget, $percent ): float|int
     {
        return ($budget * $percent / 100);
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

     private function isInRange(float $amount, $min, $max): bool
     {

        if(is_null($max))
        {
            return $amount > $min;
        }
        else
        {
            return ($amount >= $min) && ($amount <= $max);
        }

     }

}
