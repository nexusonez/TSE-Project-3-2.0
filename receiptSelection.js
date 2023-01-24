
function getInvoiceData() {
    document.getElementById('selectionInvoiceID').addEventListener('change', function() {
        console.log();
        var selectedOption = this.value;
        fetch('vendor_submitReceipt.php?choice=', {
            method: 'GET',
            body: JSON.stringify({ option: selectedOption })
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById('paymentID').value = data[0].paymentID;
            document.getElementById('companyID').value = data[0].companyID;
            document.getElementById('companyName').value = data[0].companyName;
            // document.getElementById('paymentDate').value = data[0].paymentDate;
        });
    });
}