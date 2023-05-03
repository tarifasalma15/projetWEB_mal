<?php include_once "errorMsgModal.php";
if(!isset($_COOKIE["acceptCookies"])){ ?>
<!-- START Cookie Alert -->
<div class="alert text-center cookiealert" role="alert">
    <b>Do you like cookies?</b> &#x1F36A; We use cookies to ensure you get the best experience on our site.
 <a href="https://www.dailymotion.com/embed/video/x16lt53" target="_blank">Learn more.</a>
    <button type="button" class="btn btn-primary btn-sm acceptcookies" aria-label="Close">
        I accept
    </button>
</div>
<!-- END Cookie Alert -->
<?php } ?>
<footer class="">
    <div class=" ftZone ftLinks bg-danger mobile">
        <div class="container">
            <div class="col-lg-12"> <a href=#>Delivery areas</a> - <a href=#>Take away</a> - <a href=#>Mentions
                    Legal</a> - <a href=#> C.G.V.</a> - <a href="contact.php" title="Erreur 404"><!-- la page n'existe pas -->Contact</a> - <a href=#>charter
                    Quality</a> -
                <a href=#>Your Appreciation</a> - <a href=#>Loyalty program</a>
            </div>
        </div>
    </div>
    <div class="ftDes">
        <div class="container">
            <div class="col-lg-12 mobile">
            For your health, eat at least five fruits and vegetables a day <a
                    href="http://www.mangerbouger.fr">www.mangerbouger.fr</a>
            </div>
            <div class="col-lg-12"> © 2023 - <a href="index.php">Mario Pizza</a>. All rights reserved.</div>
        </div>
    </div>
</footer>

<script src="assets/jquery/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>

<?php if (!isset($_COOKIE["acceptCookies"])) { ?>
<script src="assets/cookies/cookiealert.js"></script>
<?php } ?>

<?php if (isset($_SESSION['errorMsg'])) {?>
    <script>$('#errorMsgModal').modal('show'); </script>
<?php unset($_SESSION['errorMsg']);
} ?>

<script>
$('a[href="#"]').click(function(e) {
    e.preventDefault ? e.preventDefault() : e.returnValue = false;
});
</script>

</body>
</html>
