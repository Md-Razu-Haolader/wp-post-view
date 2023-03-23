<form action="<?php echo $url ?>" method="post">
    <table class="form-table">
        <tr>
            <th scope="row">
                <label for="numberposts">Number of Posts: </label>
            </th>
            <th scope="row">
                <select name="numberposts" id="numberposts">
                    <option disabled="true" selected>Select</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label for="order">Order posts by Views: </label>
            </th>
            <th scope="row">
                <select name="order" id="order">
                    <option disabled="true" selected>select</option>
                    <option value="ASC">Ascending</option>
                    <option value="DESC">Descending</option>
                </select>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label for="category">View posts by Category: </label>
            </th>
            <th scope="row">
                <?php foreach ($terms as $term) { ?>
                    <input type="checkbox" name="category[]" id="category" value="<?php echo $term->term_id; ?>"> <?php echo $term->name; ?><br />
                <?php } ?>
            </th>
        </tr>
    </table>
    <button type="submit" class="submit" id="submit" name="wppv-submit">Submit</button>
</form>
