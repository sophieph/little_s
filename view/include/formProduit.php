<form action="" method="POST" class="form-product">
    <table>
        <tr>
            <td><label for="name">Nom du produit</label></td>
            <td><input type="text" name="name" id="name" onKeyPress="nameProduct()" onKeyUp="nameProduct()"> </td>
        </tr>

        <tr>
            <td><label for="date">Date du produit</label></td>
            <td><input type="date" name="date" id="date" value="<?php echo date('Y-m-d')?>"> </td>
        </tr>

        <tr>
            <td><label for="stock">Nombre de stock</label></td>
            <td><input type="text" name="stock" id="stock" onKeyPress="stockProduct()" onKeyUp="stockProduct()"></td>
        </tr>

        <tr>
            <td><label for="price">Prix du produit </label></td>
            <td><input type="text" name="price" id="price" onKeyPress="priceProduct()" onKeyUp="priceProduct()"></td>
        </tr>

        <tr>
            <td><label for="category">Catégorie</label></td>
            <td>
            <select name="category" id="category">
            <option value="onePiece">Une pièce</option>
            <option value="bikini">Bikini</option>
            <option value="accessoire">Accessoire</option>
            </select>
            </td>
        </tr>

    </table>

    <input type="submit" value="Ajouter" class="button" id="button" onclick="return(addP())">

    <p id="text-product"></p>


</form>