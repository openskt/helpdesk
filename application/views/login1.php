<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Learning CI</title>
</head>
<body>
    <?php if(isset($_SESSION)) {
        echo $this->session->flashdata('flash_data');
    } ?>

    <form action="<?= site_url('login1') ?>" method="post">
        <label for="email">Email</label>
        <input type="text" name="email" />
        <label for="password"></label>
        <input type="text" name="password" />
        <button type="submit">Login</button>
    </form>
</body>
</html>
