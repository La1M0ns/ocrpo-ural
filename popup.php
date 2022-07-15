<div id="popup" class="popup">
    <a href="#container" class="popup_area"></a>
    <div class="popup_body">
        <div class="popup_content">
            <a href="#container" class="popup_close">X</a>
            <div class="popup_title"><?=$program['name']?></div>
            <div class="popup_text">
                <form action="mail.php" method="POST">
                    <p>Личные данные участника</p>
                    <input class="form_input" type="text" name="name" placeholder="ФИО участника" required>
                    <input class="form_input" type="date" name="date" required>
                    <p>Контактная информация заказчика</p>
                    <input class="form_input" type="text" name="name2" placeholder="ФИО заказчика" required>
                    <input class="form_input" type="text" name="name3" placeholder="Название организации"><br><br>
                    <input class="form_input" type="text" name="number" placeholder="Контактный номер телефона" required>
                    <input class="form_input" type="text" name="email" placeholder="Электронная почта" required><br><br>
                    <input class="form_btn1" type="submit" value="Отправить заявку">
                </form>
            </div>
        </div>
    </div>
</div>