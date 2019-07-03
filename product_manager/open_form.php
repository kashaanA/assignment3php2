<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Form Sample</title>
    <link rel="stylesheet" href="normalize.css" />
    <link rel="stylesheet" href="mystyle.css" />

    <!--[if lt IE 8]>
    <style>
        legend {
            display: block;
            padding: 0;
            padding-top: 30px;
            font-weight: bold;
            font-size: 1.25em;
            color: #FFD98D;
            margin: 0 auto;
        }
    </style>
    <![endif]-->

</head>
<body>


<form id="myform" name="theform" class="group" action="index.php" method="POST">
    <fieldset id="login" title="Car Info">
        <legend>Login Info</legend>

        <!-- THERE IS AN ADDITIONAL SPAN HERE:-->

        <!--<span id="mynamehint" class="hint"></span>-->

        <!-- UNCOMMENT THE FOLLOWING:-->

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
                <input type="text" name="code" required id="code" autocomplete="off" />
            </li>
            <li>
                <label for="price">List Price</label>
                <input type="text" name="price" id="price" />
            </li>

<!--                <input type="tel" name="mytelephone" id="mytelephone" pattern="\d{10}" placeholder="xxx-xxx-xxxx"/>-->
                    </ol><input type="submit" value="Add Product" />
    </fieldset>

</form>

<!-- ADDING A SCRIPT:-->

<!--<script>-->
<!--document.theform.myname.onclick=function() {-->
<!--document.getElementById('mynamehint').innerHTML = "(Enter last name, then first)";-->
<!--}-->

<!--document.theform.myname.onblur=function() {-->
<!--document.getElementById('mynamehint').innerHTML = "";-->
<!--}-->
<!--</script>-->

<script src="myscript.js"></script>
<p class="last_paragraph">
    <a href="index.php?action=list_products">View Product List</a>
</p>

<?php include '../view/footer.php'; ?>
