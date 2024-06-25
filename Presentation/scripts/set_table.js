function selectTable(tableNumber) {
    console.log('Table number: ', tableNumber);
    window.location.href = `order.twig?tableNumber=${tableNumber}`;
}