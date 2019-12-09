<?php

namespace Code;

Class Produto{
    private $name;
    private $price;
    private $slug;

    public function setName($name){
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }

    public function setPrice($price){
        $this->price = $price;
    }

    public function getPrice(){
        return $this->price;
    }

    public function setSlug($slug){
        if(!$slug){
            throw new \InvalidArgumentException('Parâmetro inválido, informe um slug válido');
        }
        $this->slug = $slug;
    }

    public function getSlug(){
        return $this->slug;
    }

}

