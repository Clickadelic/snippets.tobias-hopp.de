<?php

class EntityBase
{
    protected $id;
    protected $createdAt;
    protected $updatedAt;
    protected $deletedAt;

    /**
     * Die arrayToObject-Methode ist eine selbstdefinierte Methode,
     * die ein Array als Parameter erwartet und das Objekt selbstständig mithilfe des Arrays befüllt
     *
     * Fill the current object with values from an array
     *
     * @param array $datas
     * @return void
     * 
     * The arrayToObject-method is a selfdefined method, which expects an array as parameter and fills the object by itself with the array
     */
    public function arrayToObject(array $datas) {
        foreach ($datas as $key => $value) {
            $setter = 'set' . ucfirst($key);
            if (method_exists($this, $setter)) {
                $this->$setter($value);
            }
        }
    }
}