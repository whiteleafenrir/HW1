<div class="page-footer">
    <div class="footer-container clearfix">

       
            <div class="lock">
                 <?php if($_SESSION['auth'] != true): ?>
                    <a href="/auth" class="lock-inner"><span class="hid-text">Войти</span></a>
                <?php else: ?>
                   <a href="/logout" class="unlock-inner"><span class="hid-text">Выйти</span></a>
                <?php endif; ?>
            </div>
        



        <div class="copyright">© 2015, Это мой сайт, пожалуйства, не копируйте и не воруйте его</div>
    </div>
</div>


<!-- JS -->
<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
<!--<script>window.jQuery || document.write('<script src="bower/jquery/dist/jquery.min.js"><\/script>')</script>-->
<script src="bower/jquery/dist/jquery.min.js"></script>
<?php if($page == "portfolio"): ?>
    <script src="bower/jquery-file-upload/js/vendor/jquery.ui.widget.js"></script>
    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
    <script src="bower/jquery-file-upload/js/jquery.iframe-transport.js"></script>
    <!-- The basic File Upload plugin -->
    <script src="bower/jquery-file-upload/js/jquery.fileupload.js"></script>
    <script src="js/add_project.js"></script>
<?php endif; ?>
<?php if($page == "contacts"): ?>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="js/mail.js"></script>
<?php endif; ?>
<script src="js/common.js"></script>
<script src="js/tooltip.js"></script>
</body>
</html>