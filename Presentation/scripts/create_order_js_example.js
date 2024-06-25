function create_order_js_example() {
    const user_id = document.getElementById("waiter_id").value;
    const table_id = document.getElementById("table_id").value;

    const xml_http_req = new XMLHttpRequest();
    xml_http_req.open("POST", "orders.php", true);
    xml_http_req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xml_http_req.onreadystatechange = function () {
        if (xml_http_req.readyState === 4 && xml_http_req.status === 200) {
            alert(xml_http_req.responseText);
        }
    };
    xml_http_req.send("action=create_order&user_id=" + user_id + "table_id=" + table_id);
}