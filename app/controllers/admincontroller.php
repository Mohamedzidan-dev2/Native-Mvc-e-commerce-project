<?php 

namespace MVC\controllers;

use MVC\core\controller;

use MVC\models\products;

class admincontroller extends controller {
    
    /* index page Dashboard*/
    public function index(){
        $this->view("dashboard/index",["title"=>"Dashboard"]);
    }

    /*Products design page*/
    public function Products(){
        $obj  = new products();
 
        // products
        $data = $obj->getAllProducts();

        // category
        $category = $obj->getAllCategory();
        $this->view("dashboard/products",['title'=>"Products Page","data"=>$data,"category"=>$category]);
    }
    
    /*Post ADD Product */
    public function postAddProducts(){
        // print_r($_POST);
        // print_r($_FILES);die;


    // check img details
     $img_name =$_FILES['image']['name'];
     $img_size =$_FILES['image']['size'];
     $img_tmp =$_FILES['image']['tmp_name'];
    //  check img name
    $ex = explode(".",$img_name);
    $end = end($ex);
    $arr =["jpg","jpeg","jfif","png"];
    if(!in_array($end,$arr)){
        echo "wrong extention";
        die;
    }

    // check img size
    if($img_size >=3000000){
        echo "wrong size";
        die;
    }

    $new_img_name = time().rand(10,1000).$img_name;
    move_uploaded_file($img_tmp,"images/".$new_img_name);

        $data = ["name"=>$_POST['name'],"price"=>$_POST['price'],"category"=>$_POST['category'],"description"=>$_POST['description'],"img"=>$new_img_name,"rate"=>"10","stars"=>"<i class='fas fa-star small text-danger'></i> <i class='fas fa-star small text-danger'></i> <i class='fas fa-star small text-danger'></i>  "];      


        $obj  = new products();
        $d = $obj->AddProduct($data);     
       echo $d;
       

      
    }

    // test of edit product details
    public function getDataForEdit(){
        $arr =$_POST['id'];
        $obj  = new products();
        $res  = $obj->getProductForEdit($arr);

       print_r($res);


    }

    public function postEdit(){
        // print_r($_POST);
        // echo("wehsash");
        // print_r($_FILES);
        if(!empty($_FILES['img2']['name'])){

            /*check img name*/
            $img_name = $_FILES['img2']['name'];
            $ex =explode(".", $img_name);
            $end=end($ex);
            $arr=["jpg","jpeg"];
            if (!in_array($end, $arr)) {
                echo "wrong extentions";
                die;
            }

            /*check img size*/
            $img_size = $_FILES['img2']['size'];
            if ($img_size >=3000000) {
                echo "wrong size";
                die;
            }

            /*change img_tmp*/
            $img_tmp  = $_FILES['img2']['tmp_name'];
            $new_name_image =time().rand(1, 1000).$img_name;
            move_uploaded_file($img_tmp, "images/$new_name_image");


            $data = ["img"=>$new_name_image];
            $id =["id"=>$_POST['id']];

            $obj = new products();
            $data  = $obj->PostEditproducts($data,$id);
    
        }

        $data =["name"=>$_POST['name2'],"price"=>$_POST['price2'],"category"=>$_POST["category2"],"description"=>$_POST['description2'],"rate"=>"10","stars"=>"10"];
        $id   =["id"=>$_POST['id']];

        $obj  = new products();
        $res  = $obj->PostEditproducts($data,$id);
        echo $res;

     
    }

}