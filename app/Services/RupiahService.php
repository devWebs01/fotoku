<?php

namespace App\Services;

class RupiahService
{
    public function convertInput ($tarif) 
    {
        $tarif = preg_replace('/[^0-9,]/', '', $tarif);
        $tarif = floatval (preg_replace('/,/', '.', $tarif));
        return $tarif;
    }

    public function convertRupiah ($value) 
    {
        return $value ? "Rp " . number_format($value,2,',','.') : "-";
    }
    

}