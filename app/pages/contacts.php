<section class="main-container">
    <div class="main-container-header">
        <h3 class="container-header-text">У вас интересный проект? Напишите мне</h3>
    </div>
    <div class="main-container-body">
        <div class="form-wrapper">
            <div class="error-msg">
                <div class="error-msg__header clearfix">
                    <div class="error-msg__title">Ошибка!</div>
                    <div class="error-msg__close"></div>     

            </div>
            <div class="error-msg__text">Письмо не получилось доставить</div> 

            </div>
            <div class="success-msg">
                <div class="success-msg__header clearfix">
                    <div class="success-msg__title">Ура</div>
                    <div class="success-msg__close"></div>     
                </div>
                <div class="success-msg__text">Письмо успешно доаставлено</div>
            </div>
            <form id="form" action="#" method="post">
                <div class="input-form-container clearfix">
                    <div class="input-name-wrapper">
                        <label  class="form-title">Имя</label>
                        <input type="text" name="name" id="name" data-validation="name" class="input-form" placeholder="Как к вам обратиться?">
                    </div>
                    <div class="input-mail-wrapper">
                        <label class="form-title">Email</label>
                        <input type="text" name="mail" id="mail" data-validation="mail" class="input-form" placeholder="Куда мне писать?">

                    </div>
                </div>
                <div class="text-aria-wrapper">
                    <label class="form-title">Сообщение</label>
                    <textarea class="textarea-form" name="text" id="text" data-validation="question" placeholder="Кратко в чем суть"></textarea>
                </div>
                <div class="captcha-wrapper clearfix">
                    <!--<label class="form-title">Введите код указанный на картинке</label>
                    <div class="captcha-img">
                        <img src="img/temp_captcha.png" alt="">
                    </div>
                    <div class="captcha-input">
                        <input type="text" name="captcha" id="captcha" class="input-form-captcha" placeholder="Введите код">
                    </div> -->
                    <div class="g-recaptcha" data-sitekey="<?php echo PUBLIC_KEY; ?>"></div>
                </div>
                <div class="buttons-wrapper clearfix">
                    <input type="submit" class="submit-form" value="Отправить">
                    <input type="reset" class="reset-form" value="Отчистить">
                </div>
            </form>
        </div>
    </div>
</section>