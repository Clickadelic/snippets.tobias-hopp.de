<?php

class EntityBase
{
    protected $id;
    protected $createdAt;
    protected $updatedAt;
    protected $deletedAt;

    /**
     * Fill the current object with values from an array
     *
     * @param array $data
     * @return void
     * 
     * Die arrayToObject-Methode ist eine selbstdefinierte Methode,
     * die ein Array als Parameter erwartet und das Objekt selbstständig mithilfe des Arrays befüllt
     */
    public function arrayToObject(array $datas) {
        // echo '<pre>';
        // var_dump($datas);
        // echo '</pre>';
        foreach ($datas as $key => $value) {
            $setter = 'set' . ucfirst($key);
            if (method_exists($this, $setter)) {
                $this->$setter($value);
            }
        }
    }
}