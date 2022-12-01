<?php
class Sepedamotor
{
    public $spedo_meter = '100KM',
        $stnk = '90HJ6789',
        $warna = 'PINK',
        $beli = '500000';

    public function getLabel()
    {
        return "Spedo : $this->spedo_meter <br>
                Stnk : $this->stnk<br>
                Warna : $this->warna<br>
                Beli : $this->beli";
    }
}
$sepeda = new Sepedamotor();
echo $sepeda->getLabel();

?>
