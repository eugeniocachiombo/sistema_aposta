<?php include "../inc/headHTML.php"; ?>

<?php
    session_destroy();
?>

<div class="mt-4" style="background: khaki"> <i class="fas fa-futbol pt-1"></i> ...</div>
<div class="d-flex justify-content-center align-items-center" style="height: 85vh">
    <h3>Terminando</h3>
    <div>
        <span class="spinner-grow text-dark spinner-grow-sm m-1" role="status" aria-hidden="true"></span>
        <span class="spinner-grow text-dark spinner-grow-sm m-1" role="status" aria-hidden="true"></span>
        <span class="spinner-grow text-dark spinner-grow-sm m-1" role="status" aria-hidden="true"></span>
    </div>
</div>
<div class="mb-4" style="background: khaki">... <i class="fas fa-futbol pt-1"></i></div>

<script>
    setTimeout(() => {
        window.location = "../inicio";
    }, 3000);
</script>