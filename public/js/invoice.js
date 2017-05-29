var counter = 0;
jQuery('#add-author').click(function(event){
    event.preventDefault();
    counter++;
    var newRow = jQuery('<tr><td><input type="text" class="input item_name" required name="item_name[]' +
        counter + '"/></td><td><input type="text" class="input items_no" required name="items_no[]' +
        counter + '"/></td><td><input type="text" class="input price" required name="price[]'+
        counter + '"/></td><td><input type="text" class="input item_total" required readonly name="item_total[]' +
        counter + '"/></td><td><input type="button" value="Delete Row" class="button is-primary" onclick="SomeDeleteRowFunction(this)"/></td></tr>');
    jQuery('.authors-list').append(newRow);
});

window.SomeDeleteRowFunction = function SomeDeleteRowFunction(o) {
    var p=o.parentNode.parentNode;
    p.parentNode.removeChild(p);
}

jQuery('#add-author1').click(function(event){
    event.preventDefault();
    counter++;
    var newRow = jQuery('<tr class="trclass"><td><input type="text" class="input" required name="item_name[]' +
        counter + '"/></td><td><input type="text" class="input val1" required name="items_no[]" onkeyup="add()' +
        counter + '"/></td><td><input type="text" class="input val2" required onkeyup="add()" name="price[]'+
        counter + '"/></td><td><input type="text" class="input plus" required  name="item_total[]" readonly' +
        counter + '"/></td><td><input type="button" value="Delete Row" class="button is-primary" onclick="SomeDeleteRowFunction(this)"/></td></tr>');
    jQuery('.authors-list1').append(newRow);
});