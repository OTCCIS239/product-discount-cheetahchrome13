 
 // sets default price and quantity field values
 function setInitialValues() {
    var name = document.getElementById("name").value;
    var price = document.getElementById("price");
    var qty = document.getElementById("qty");
    price.value = products[name];
    qty.value = 1;
}

// updates price field when a different product is selected
function updatePrice() {
    var name = document.getElementById("name").value;
    var price = document.getElementById("price");
    price.value = products[name].toFixed(2);
    //console.log(products[name]);
}