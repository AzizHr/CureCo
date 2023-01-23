<?php

function message($message , $class) {
    echo '<div class="alert alert-' . $class .'">' . $message . '</div>';
}