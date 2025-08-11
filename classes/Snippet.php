<?php


class Snippet {
    private int $id = 0;
    private string $title;
    private string $description;
    private string $code;
    private string $language;
    private string $tags;
    private DateTime $createdAt;
    private DateTime $updatedAt;
    private DateTime $deleted;

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

