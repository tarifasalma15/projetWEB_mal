<footer class="footer footer-black footer-white ">
    <div class="row ftDes">
        <!--<div class="col-lg-12">
            Pour votre santé, mangez au moins cinq fruits et légumes par jour <a
                href="http://www.mangerbouger.fr">www.mangerbouger.fr</a>
        </div>-->
        <div class="col-lg-12"> © 2023 - <a href="index.php">Mario Pizza</a>. All rights reserved.</div>
    </div>
</footer>
</div>
</div>
</div>
</div>
<!-- Core JS Files -->
<script src="assets/jquery/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<!-- Datatables JS -->
<script src="assets/datatables/js/jquery.dataTables.min.js" type="text/javascript" charset="utf8" ></script>


<script>
// search bar
function research() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
</script>

</body>
</html>