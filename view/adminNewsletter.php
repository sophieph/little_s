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
        <table class="admin-list-table">
            <tr>
                <th>Email</th>
                <th></th>
            </tr> 
            <?php
                foreach($liste as $mail) {
                ?>

                <tr>
                <td><?php echo $mail['email'];?></td> 
                <td class="admin-hover"> delete </td>
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
            include("404.php");
        }
    ?>

</section>



<?php $content = ob_get_clean(); ?>
<?php require 'template.php'; ?>
