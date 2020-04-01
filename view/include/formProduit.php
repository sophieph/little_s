<form action="" class="form-product">
    <table>
        <tr>
            <td><label for="name">Nom du produit</label></td>
            <td><input type="text" name="name" id="name"> </td>
        </tr>

        <tr>
            <td><label for="date">Date du produit</label></td>
            <td><input type="date" name="date" id="date" value="<?php echo date('Y-m-d')?>"> </td>
        </tr>

        <tr>
            <td><label for="stock">Nombre de stock</label></td>
            <td><input type="text" name="stock" id="stock"></td>
        </tr>

        <tr>
            <td><label for="category">Catégorie</label></td>
            <td>
            <select name="category" id="category">
            <option value="onepiece">Une pièce</option>
            <option value="bikini">Bikini</option>
            <option value="accessoire">Accessoire</option>
            </select>
            </td>
        </tr>

    </table>

    <input type="submit" value="Ajouter">


</form>