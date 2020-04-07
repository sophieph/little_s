<form action="" method="POST" class="form-product">
    <table>
        <tr>
            <td><input type="hidden" name="codeProduit" id="codeProduit" value="<?php echo $product['codeProduit']; ?>"></td>
            <td></td>
        </tr>
        <tr>
            <td><label for="name">Nom du produit</label></td>
            <td><input type="text" name="name" id="name" value="<?php echo $product['name']; ?>" onKeyPress="nameProduct()" onKeyUp="nameProduct()"> </td>
        </tr>

        <tr>
            <td><label for="stock">Nombre de stock</label></td>
            <td><input type="text" name="stock" id="stock" value="<?php echo $product['stock']; ?>" onKeyPress="stockProduct()" onKeyUp="stockProduct()"></td>
        </tr>

        <tr>
            <td><label for="price">Prix</label></td>
            <td><input type="text" name="price" id="price" value="<?php echo $product['price']; ?>" onKeyPress="priceProduct()" onKeyUp="priceProduct()"></td>
        </tr>

        <tr>
            <td><label for="category">Catégorie</label></td>
            <td>
            <select name="category" id="category" >
            <option value="onePiece">Une pièce</option>
            <option value="bikini">Bikini</option>
            <option value="accessoire">Accessoire</option>
            </select>
            </td>
        </tr>

    </table>

    <input type="submit" value="Modifier" class="button" id="button"  onclick="return(edit())" >

    <p id="text-product"></p>


</form>