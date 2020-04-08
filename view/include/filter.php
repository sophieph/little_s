<section id="filter">

            <form action="" method="" id="form-filter">
                <input type="hidden" value="<?php echo $_GET['category']; ?>" id="category" name="category" >
                <label for="filter-color">Filter</label>
                <select name="filter-color" id="filter-color">

                    <option value="recommanded">Couleur</option>
                    <option value="lowToHigh">Prix croissant</option>
                    <option value="highToLow">Prix décroissant</option>
                </select>
            </form>

        <!-- <div class="form-sort"> -->
            <form action="" method="" id="form-sort">
                <label for="sort">Sort by</label>
                <select name="sort" id="sort" onChange="orderProduct(this.value);">

                    <option value="recommanded">Recommandé</option>
                    <option value="asc">Prix croissant</option>
                    <option value="desc">Prix décroissant</option>
                </select>
            </form>
        <!-- </div> -->



    </section>

<hr />