<?php
/**
 * @Author
 * Falua Temitope Oyewole.
 * faluatemitopeo@gmail.com
 * Web Developer
 * Date: 4/27/2018
 */
?>
<!--<script src="<?/*= LINK_PREFIX .'assets/js/jquery-1.11.3.min.js' */?>"></script>-->
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<!--<script src="<?/*= LINK_PREFIX .'assets/js/bootstrap.min.js' */?>"></script>-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
    <script>
        baguetteBox.run('.tz-gallery');
    </script>
<script src="<?= LINK_PREFIX .'assets/js/dropzone.js'; ?>"></script>
<script src="<?= LINK_PREFIX .'assets/js/main.js'; ?>"></script>
<script src="<?= LINK_PREFIX .'assets/js/wow.min.js'; ?>"></script>
<script>

    // Script to open and close sidebar
    function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
        document.getElementById("myOverlay").style.display = "block";
    }

    function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
        document.getElementById("myOverlay").style.display = "none";
    }
</script>

</body>

</html>