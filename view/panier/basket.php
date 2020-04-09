<?php ob_start(); ?>

<section id="wrapper">

    <div class="list-basket">
        
        <table>
            <tr>
                <td>Image</td>
                <td>
                    <b>Nom :</b> <br>
                    <b>Quantité :</b> <br>
                    <b>Prix : </b><br>

                </td>
            </tr>
        </table>

        <div class="total">
            <p>Prix total :</p>

            <button id="add-to-bag">Check out</button>
        </div>
    </div>



</section>

<?php $content = ob_get_clean(); ?>

<?php require ROOT_PATH . 'view/template.php'; ?>
