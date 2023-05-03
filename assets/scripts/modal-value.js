// modal passing values
$('a[data-toggle="modal"]').click(function () {
    var userId = $(this).attr('data-pid')
    var productName = $(this).parent().siblings("#prodName").text();
    var productPrice = $(this).parent().siblings("#prodPrice").text();
    document.getElementById("productID_edit").value = userId;
    document.getElementById("productName_edit").value = productName;
    document.getElementById("productPrice_edit").value = productPrice;
    document.getElementById("productID_delete").value = userId;
    document.getElementById("insertName_edit").innerHTML = productName;
    document.getElementById("insertName_delete").innerHTML = productName;
});