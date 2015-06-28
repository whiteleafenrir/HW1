<section class="aboutbox">
    <h2 class="aboutbox-header">Мои работы</h2>
    <div class="aboutbox-body clearfix">
        <ul class="works-list">
            <?php foreach($projects as $project): ?>
                <li class="works-list-item">
                    <div class="work-image">
                        <div class="image-wrapper">
                            <img src="img/work/<?php echo $project['thumb']; ?>" alt="">
                            <div class="image-overlay">
                                <a href="<?php echo $project['link']; ?>" class="link-into-overlay"><?php echo $project['title']; ?></a>
                            </div>
                        </div>

                        <div class="image-name">
                            <a href="<?php echo $project['link']; ?>" class="url-style"><?php echo $project['title']; ?></a>
                        </div>
                    </div>
                    <div class="work-preview"><?php echo $project['description']; ?></div>
                </li>
            <?php endforeach; ?>

           <?php if($_SESSION['auth'] == true): ?>
            <li class="works-list-item">
                <div class="work-image">
                    <div class="image-wrapper">
                        <img src="img/add_project.png" alt="">
                    </div>
                    <div class="image-name">
                        <a href="#" class="url-style">www.site.ru</a>
                    </div>
                </div>
                <div class="work-preview">Информация о проекте 5 превью 2 строчки</div>
            </li>
            <?php endif; ?>
        </ul>
    </div>
</section>
    <div class="grey-fon-wrapper"></div>
        <div class="popap-container">
            <div class="popap-container-header">
                <h3 class="popap-container-header-text">Добавление проекта</h3>
            </div>
            <div class="popap-container-body">
                <div class="popap-form-wrapper">
                    <div class="error-msg">
                        <div class="error-msg__header clearfix">
                            <div class="error-msg__title">Ошибка!</div>
                            <div class="error-msg__close"></div>     

                        </div>
                        <div class="error-msg__text">Невозможно добавить проект</div> 
                  
                    </div>
                    <div class="success-msg">
                    <div class="success-msg__header clearfix">
                        <div class="success-msg__title">Ура</div>
                        <div class="success-msg__close"></div>     

                    </div>
                        <div class="success-msg__text">Проект успешно добавлен</div>
                    </div>
                    <form id="form" action="#" method="post">
                        <div class="popap-input-form-container">
                            <div class="popap-input-name-wrapper">
                                <label class="popap-form-title">Название проекта</label>
                                <input type="text" id="progect-title" data-validation="title" name="project-title" class="popap-input-form" placeholder="Введите название">
                            </div>
                            <div class="popap-input-name-wrapper">
                         <!--       <label class="popap-form-title">Картинка проекта</label>
                                <input type="text" data-validation="img" class="popap-input-form" placeholder="Загрузите изображение"> -->
                             <div id="uploadfile" class="fileupload-wrapper"><span class="popap-form-title">Картинка проекта</span>
                                <label class="fileupload-lable">
                                    <input id="fileupload" type="file" name="files[]" class="fileupload">
                                    <input id="fileurl" type="hidden" name="fileurl">
                                </label>
                            
                                <input id="filename" type="text" data-validation="img" name="filename" placeholder="Загрузите изображение" disabled qtip-content="Вы не выбрали изображение" class="popap-input-form">
                            </div>
                            <div class="popap-input-password-wrapper">
                                <label class="popap-form-title">URL проекта</label>
                                <input type="text" id="project-link" name="project-link" data-validation="url" class="popap-input-form" placeholder="Добавьте ссылку">
                            </div>
                            <div class="popap-input-password-wrapper">
                                <label class="popap-form-title">Описание</label>
                                <textarea data-validation="text" id="project-text" name="project-text" class="popap-textarea-form" placeholder="Пара слов о проекте"></textarea>
                            </div>
                        </div>
                        <div class="popap-button-wrapper">
                            <input type="submit" class="popap-submit-form" value="Добавить">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
