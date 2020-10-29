<tr id="counter<?php echo $_POST['counter']; ?>" class="counter">
                			<td><input class="form-control item_name" id="item_name<?php echo $_POST['counter']; ?>" name="item_name[]" placeholder="Iten-Name"></td><br>

					        <td><input class="form-control item_brand" name="item_brand[]" id="item_brand<?php echo $_POST['counter']; ?>" placeholder="Brand-Name" ></td> </select><br>
					        
					       <td><input class="form-control price" type="text" name="price[]" placeholder="price" autocomplete="off" id="price<?php echo $_POST['counter']; ?>" ></td>

                			<td><input type="text" name="item_qunt[]" class="form-control item_qunt" id="item_qunt<?php echo $_POST['counter']; ?>" autocomplete="off" placeholder="Quantity" ></td>

                			<td><input type="text" name="item_total[]" placeholder="total" autocomplete="off" class="form-control item_total" id="item_total<?php echo $_POST['counter']; ?>" autocomplete="off"  ></td>

               			    <td><button class="remove" style="background-color: red"> - </button></td>
                            <br>
        </tr>
