 <?php include '../view/header1.php'; ?>
<fieldset>
    <h1>Add Product</h1>

    <form class="group" action="index.php" method="post" id="myform" name="theform">
        <input type="hidden" name="action" value="add_product">
        <fieldset id="login" title="Car Info">
            <legend>Login Info</legend>

            <span id="formerror" class="error"></span>


        <ol>
            <li>
                <label for="category_id">Category: *</label>
                <select name="category_id">
                    <?php foreach ( $categories as $category ) : ?>
                        <option value="<?php echo $category['categoryID']; ?>">
                            <?php echo $category['categoryName']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </li>
            <li>
                <label for="name">Name *</label>
                <input type="text" name="name" id="name" title="Please enter your name" pattern="[A-Za-z ]+" autofocus required placeholder="Enter Vehicle Name" />

            </li>
            <li>
                <label for="code">Code *</label>
                <input type="text" name="code" required id="code" autocomplete="off"/>
                </li>
            <li>
                <label for="price">List Price</label>
                <input type="text" name="price" id="price" />
            </li>
 </ol>
        <input type="submit" value="Add Product" />
    </form>

    <script src="myscript.js"></script>

    <p class="last_paragraph">
        <a href="index.php?action=list_products">View Product List</a>
    </p>
</fieldset>
</main>
<?php include '../view/footer.php'; ?>