<?php
require('../model/database.php');
require('../model/product_db.php');
require('../model/category_db.php');

            //  ACTION
$action = filter_input(INPUT_POST, 'action');
            //  SIMPLE VALIDATION
    if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
        if ($action == NULL) {
            //  SET THE DEFAULT ACTION
        $action = 'list_products';
    }
}
            //  READ
    if ($action == 'list_products') {
        $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
        if ($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
    }

    echo "The category ID of Trains is $category_id.";

            //  GET THE PRODUCT AND CATEGORY DATA
    $category_name = get_category_name($category_id);
    $categories = get_categories();
    $products = get_products_by_category($category_id);
            //  DISPLAY THE PRODUCT LIST
    include('product_list.php');
}

            //  DELETE
    else if ($action == 'delete_product') {
            //  REQUEST METHOD:

            $method = $_SERVER['REQUEST_METHOD'];
            //  DETERMINE IF PUT OR DELETE
        if ('PUT' === $method || 'DELETE'=== $method) {

        if ('category_id' == NULL || 'category_id' == FALSE ||
            'product_id' == NULL || 'product_id' == FALSE) {
            $error = "Missing or incorrect product id or category id.";
            include('../errors/error.php');
    }   else {
            //  PROCEED WITH DELETE
            delete_product($params['product_id']);
            header("Location: .?category_id=".$params['category_id']);
             }
    }

        //  POST - DELETE
    else if ('POST' == $method) {
            $product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
            $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);

         if ($category_id == NULL || $category_id == FALSE || $product_id == NULL || $product_id == FALSE) {
             $error = "Missing or incorrect product id or category id.";
             include('../errors/error.php');
            }
         else {
             delete_product($product_id);
             header("Location: .?category_id=$category_id");
            }
        }

            //  ADD
}
    else if ($action == 'show_add_form') {
        $categories = get_categories();
        include('product_add.php');
}

    else if ($action == 'add_product') {
        $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
        $code = filter_input(INPUT_POST, 'code');
        $name = filter_input(INPUT_POST, 'name');
        $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);

        if ($category_id == NULL || $category_id == FALSE || $code == NULL ||
        $name == NULL || $price == NULL || $price == FALSE) {
        $error = "Invalid product data. Check all fields and try again.";
        include('../errors/error.php');
    }
        else {
        add_product($category_id, $code, $name, $price);
        header("Location: .?category_id=$category_id");
    }
}

        // PATCH

else
    if ($action == 'update_product') {
        $product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
        $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
        $code = filter_input(INPUT_POST, 'code');
        $name = filter_input(INPUT_POST, 'name');
        $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);

        if ($category_id == NULL || $category_id == FALSE || $product_id == NULL ||
            $product_id == FALSE) {
            $error = "Invalid product data. Check all fields and try again.";
            include('../errors/error.php');
        } else {
            update_product($category_id, $product_id, $code, $name, $price);
            header("Location: .?category_id=$category_id");
        }

    }
?>