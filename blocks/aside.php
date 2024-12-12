<aside>
    <div class="info">
        <h2>Интересные факты</h2>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Enim modi veritatis repellendus pariatur omnis molestias alias a sit expedita quae, inventore recusandae vel praesentium. Aliquid corrupti recusandae quos excepturi distinctio!</p>
    </div>
    <img src="https://itproger.com/img/courses/x1717670972.jpg.pagespeed.ic.qHBWfJ0VuS.webp" alt="img">

     <!-- Чат -->
     <div class="chat-container">
        <div class="chat-box" id="chat-box">
            <p>Пока сообщений еще нет</p>
        </div>
        <div class="form-input">
            <input type="text" id="message" placeholder="Сообщение">
            <button onclick="sendMessage()">Отправить</button>
        </div>
    </div>

    <script>
        // Функция для отправки сообщений
    function sendMessage() {
    const message = document.getElementById("message").value;

    if (message.trim() === "") {
        alert("Введите сообщение");
        return;
    }

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../ajax/add_message.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function () {
        if (xhr.status === 200) {
            console.log(xhr.responseText);
            document.getElementById("message").value = "";
            fetchMessages();
        }
    };
    xhr.send("message=" + encodeURIComponent(message));
}

    // Функция для получения сообщений
    function fetchMessages() {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "../ajax/get_messages.php", true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            const messages = JSON.parse(xhr.responseText);
            const chatBox = document.getElementById("chat-box");
            chatBox.innerHTML = "";

            if (messages.length > 0) {
                messages.forEach(function (message) {
                    const messageElement = document.createElement("div");
                    messageElement.className = "message";
                    messageElement.innerHTML = `<p>${message.message}</p>`;
                    chatBox.appendChild(messageElement);
                });
            } else {
                chatBox.innerHTML = "<p>Пока сообщений еще нет</p>";
            }
        }
    };
    xhr.send();
}

// Установим интервал для автоматического обновления чата
setInterval(fetchMessages, 3000);

// Первоначальная загрузка сообщений
fetchMessages();

</script>
</aside>