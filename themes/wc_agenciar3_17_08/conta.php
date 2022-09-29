<?php
if (!$Read):
    $Read = new Read;
endif;

if (!ACC_MANAGER):
    require REQUIRE_PATH . '/404.php';
else:
    ?>
    <div class="container post_single" id="acc">
        <div class="content">
            <?php require '_cdn/widgets/account/account.php'; ?>
            <div class="clear"></div>
        </div>
    </div>
                <div><!-- Chat do Movidesk -->
<script type="text/javascript">var mdChatClient="C3B33E00FA0E4F2F837358900CA1414F";</script>
<script src="https://chat.movidesk.com/Scripts/chat-widget.min.js"></script>

<!-- Chat do Movidesk fim --></div>
<?php
endif;