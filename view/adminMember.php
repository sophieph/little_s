<?php 
session_start();
ob_start(); 
?>

<section id="wrapper">

<?php 
    if (isset($_SESSION['user']) && $_SESSION['user'] == 'administrateur') { 
?>

    <div class="admin-list">

        <h3> Liste : <b>Membres</b> </h3>

        <table class="admin-list-table">
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Email</th>
                <th></th>
            </tr> 
            <?php
                foreach($liste as $member) {
                ?>

                <tr>
                <td><?php echo $member['id'];?></td>
                <td><?php echo $member['name'];?></td>
                <td><?php echo $member['email'];?></td> 
                <td class="admin-hover"> <a href="?action=delete-member&id=<?php echo $member['id']; ?>">delete </a></td>
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
