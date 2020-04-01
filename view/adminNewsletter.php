<?php 
session_start();
ob_start(); 
?>

<section id="wrapper">

<?php 
    if (isset($_SESSION['user']) && $_SESSION['user'] == 'administrateur') { 
?>

    <div class="admin-list">

        <h3> Liste : <b>Newsletter</b> </h3>
        <p><?php echo $response; ?></p>
        <table class="admin-list-table">
            <tr>
                <th>Email</th>
                <th></th>
            </tr> 
            <?php
                foreach($liste as $mail) {
                ?>

                <tr>
                <td><?php echo $mail['id'];?></td>
                <td><?php echo $mail['email'];?></td> 
                <td class="admin-hover"> <a href="?action=delete-newsletter&id=<?php echo $mail['id']; ?>">delete </a></td>
                </tr>

            <?php 
                }
            ?>
            
        </table>

        <p id="demo"> </p>
    </div>

    <?php 
        } else {
            http_response_code(404);
            include 'include/error404.php';
        }
    ?>

</section>



<?php $content = ob_get_clean(); ?>
<?php require 'template.php'; ?>
