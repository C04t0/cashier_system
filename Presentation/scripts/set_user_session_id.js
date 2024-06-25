function setSessionUserId(userId) {
    console.log(userId)
    let xhr = new XMLHttpRequest();
    xhr.open("POST", '../Presentation/scripts/set_session.php', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        console.log("Ready state: " + xhr.readyState + ", Status: " + xhr.status);

        if (xhr.readyState === 4 && xhr.status === 200) {
            let response = JSON.parse(xhr.responseText);
            console.log(response)

            if (response.status === 'success') {
                console.log("User ID set in session: " + response.user_id);
                window.location.href = "cashierSystem.php";
            } else {
                console.error("Error setting user ID in session: " + response.message);
            }
        }
    };
    xhr.send("user_id=" + encodeURIComponent(userId))
}