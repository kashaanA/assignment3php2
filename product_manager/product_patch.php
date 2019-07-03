<?php include '../view/header.php';
require('../model/database.php');
require('../model/product_db.php');
?>

    <main>
        <h1>Patch Product</h1>
        <br>

        <form action="index.php" method="post" id="update_product_form">
            <input type="hidden" name="action" value="update_product">

            <?php
            $product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
            $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
            $product = get_product($product_id);
            ?>

            <input type="hidden" name="product_id" value="<?php echo $product['productID']; ?>">
            <input type="hidden" name="category_id" value="<?php echo $product['categoryID']; ?>">

            <label>Code:</label>
            <input type="text" name="code" value="<?php echo $product['productCode'] ?>" />

            <label>Name:</label>
            <input type="text" name="name" value="<?php echo $product['productName'] ?>" />

            <label>List Price:</label>
            <input type="text" name="price" value="<?php echo $product['listPrice'] ?>"/>

            <label>&nbsp;</label>
            <input type="submit" value="Patch Product"/>

        </form>

        <p class="last_paragraph"><a href="index.php?action=list_products">View Product List</a></p>

    </main>

<?php include '../view/footer.php'; ?>