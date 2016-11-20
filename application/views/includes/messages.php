<?php

// Loops on all messages types
foreach ($messages as $message_type => $messages_list) {
    
    // Sets the element class depending on messages type
    switch ($message_type) {
        case Message::TYPE_SUCCESS:
            $message_class = 'success';
            break;
        case Message::TYPE_INFO:
            $message_class = 'info';
            break;
        case Message::TYPE_WARNING:
            $message_class = 'warning';
            break;
        case Message::TYPE_ERROR:
        default:
            $message_class = 'danger';
            break;
    }
    
    // Loops on all messages in the current type
    foreach ($messages_list as $message) { ?>
        
    <div class="alert alert-<?= $message_class ?> alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?= $message ?>
    </div>

    <?php }
    
}
