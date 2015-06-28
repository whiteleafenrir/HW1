<aside class="sidebar">
    <!-- навигация -->
    <nav class="navigation">
        <ul class="navigation-list">
            <li class="navigation-item <? if($page=='index') echo 'current'; ?>">
                <a href="/" class="navigation-link">Обо мне</a>
            </li>
            <li class="navigation-item <? if($page=='portfolio') echo 'current'; ?>">
                <a href="/portfolio" class="navigation-link">Мои работы</a>
            </li>
            <li class="navigation-item <? if($page=='contacts') echo 'current'; ?>">
                <a href="/contacts" class="navigation-link">Связаться со мной</a>
            </li>
        </ul>
    </nav>
    <!-- /навигация -->
    <!-- Контакты -->
    <address class="contacts">
        <div class="contacts-header">
            <span class="header-inner-text">Контакты</span>
        </div>
        <ul class="contacts-list">
            <li class="contacts-item contacts-item-mail">
                <a href="mailto:fenrir.90@mail.ru" class="contacts-link">
                <span class="contact-text">fenrir.90@mail.ru</span></a>
            </li>
            <li class="contacts-item contacts-item-phone">
                <a href="tel:+79643901672" class="contacts-link">
                    <span class="contact-text">+79643901672</span>
                </a>
            </li>
            <li class="contacts-item contacts-item-skype">
                <a href="skype:whiteleafenrir" class="contacts-link">
                    <span class="contact-text">whiteleafenrir</span>
                </a>
            </li>                       
        </ul>
    </address>
    <!-- /контакты -->
</aside>