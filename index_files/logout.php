<?php
session_start();
session_unset();
session_destroy();
?>
<script>
    history.go(-1);
</script>