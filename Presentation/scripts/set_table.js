function selectTable(tableNumber) {
    console.log('Table number: ', tableNumber);
    window.location.href = `cashierSystem.php?tableNumber=${tableNumber}`;
}