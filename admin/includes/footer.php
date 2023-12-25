<footer>
    <div class="designer">
        <span>Made By <a href="#">Purushottam Sah</a></span>
    </div>
    <div class="distributed">
        <span>Distributed by: <a href="#">PurushottamSah</a></span>
    </div>
</footer>
</main>




<!-- Bootstrap JS -->

<!-- <script src="js/main.js"></script> -->

<script src="js/sidebars.js"></script>
<script src="js/lielement.js"></script>
<script src="../js/jquery.js"></script>
<script src="../js/jquery.bxslider.min.js"></script>
<script src="../js/owl.carousel.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
<!-- <script src="js/bootstrap.min.js"></script> -->
<script src="../js/popper.min.js"></script>
<script src="../js/main.js"></script>

<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
<!-- Bootstrap 5.3 JS Link End here-->
<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<script>
    // Text Editor

    ClassicEditor.create(document.querySelector("#catbodydesc"))
        .then((editor) => {
            console.log(editor);
        })
        .catch((error) => {
            console.error(error);
        });

    // Text Editor
</script>

<script>
    // ALertify
    <?php
    if (isset($_SESSION['message'])) 
        { ?>
        alertify.set("notifier", "position", "top-right");
        alertify.success("Categories added Successfull..");
        <?php
        unset($_SESSION['message']);
    }
    ?>


    // ALertify
</script>

</body>

</html>