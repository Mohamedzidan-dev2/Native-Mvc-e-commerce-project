<?php 

namespace MVC\models;

use MVC\core\model;

class products extends model{
    
    // Get All Products  
    public function getAllProducts(){
        $data = $this->db()->rows("SELECT * FROM products");
        return $data;
    }

    // Add New Products
    public function AddProduct($data){
        $data = $this->db()->insert('products', $data);
        if($data){
        $id =  $this->db()->lastInsertId();

        $data2 = $this->db()->getById('products', $id);

    
        $arr = [
            "id"=>$id,
            "name"=> $data2->name,
            "price"=> $data2->price,
            "category"=> $data2->category,
            "description"=>$data2->description,
            "rate"=> $data2->rate,
            "img"=> $data2->img,
            "stars"=> $data2->stars
        ];
        return json_encode($arr);
        // return $id;
        // $id          =  $data->id;
        // $name        =  $data->name;
        // $price       =  $data->price;
        // $category    =  $data->category;
        // $description =  $data->description;
        // $rate        =  $data->rate;
        // $img         =  $data->img;

        
     
    

        }
    }

    // get all category
    public function getAllCategory(){
        $data = $this->db()->rows("SELECT * FROM category");
        return $data;
    }

    // get product details
    public function getProductForEdit($id){
        $data2 = $this->db()->getById('products', $id);

        $arr = [
            "id"=>$data2->id,
            "name"=> $data2->name,
            "price"=> $data2->price,
            "category"=> $data2->category,
            "description"=>$data2->description,
            "rate"=> $data2->rate,
            "img"=> $data2->img,
            "stars"=> $data2->stars
        ];
        return json_encode($arr);

      
    }

    public function PostEditproducts($data,$id){

    $data = $this->db()->update('products', $data, $id);
    
    $ar = $id;
    $pr_id = $ar['id'];

    $data2 = $this->db()->getById('products', $pr_id);

    $arr2 = [
        "id"=>$data2->id,
        "name"=> $data2->name,
        "price"=> $data2->price,
        "category"=> $data2->category,
        "description"=>$data2->description,
        "rate"=> $data2->rate,
        "img"=> $data2->img,
        "stars"=> $data2->stars
    ];
    return json_encode($arr2);
    }

}