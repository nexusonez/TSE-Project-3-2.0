let productId = 1;
function addRow() {
  productId++;
  const table = document.getElementById("tableId"); // this element is missing
  const row = table.insertRow();
  const productIdCell = row.insertCell(0);
  const productNameCell = row.insertCell(1);
  const priceCell = row.insertCell(2);
  const quantityCell = row.insertCell(3);
  const totalPriceCell = row.insertCell(4);

  productIdCell.innerHTML = productId;
  productNameCell.innerHTML = '<input type="text" id="productName' + productId + '">';
  priceCell.innerHTML = '<input type="text" id="price' + productId + '">';
  quantityCell.innerHTML = '<input type="text" id="quantity' + productId + '">';


}


function calculateTotal() {
    const table = document.getElementById("tableId"); // this element is missing
    let totalPrice = 0;
    for (let i = 1; i < table.rows.length; i++) {
    const productPrice = parseFloat(table.rows[i].cells[2].getElementsByTagName("input")[0].value);
    const productQuantity = parseFloat(table.rows[i].cells[3].getElementsByTagName("input")[0].value);
    totalPrice += productPrice * productQuantity;
    table.rows[i].cells[4].innerHTML = productPrice * productQuantity;
    }
    console.log("Total price: " + totalPrice);
}