<?php include '../view/header.php'; ?>
<main>
    <h1>Database Error</h1>
    <p class="first_paragraph">There was an error connecting to the database.</p>
    <p>The application user should see a comprehensive error message,
        instead of just a list of particular response codes, that maybe hard for the user to understand / correct.</p>
    <p>However, we can appreciate the PDO will disclose the following particulars:</p>
    <p class="last_paragraph">Error message: <?php echo $error_message; ?></p>
</main>
<?php include '../view/footer.php'; ?>