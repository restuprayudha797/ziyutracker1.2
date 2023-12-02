<!-- ====== All Javascript Files ====== -->
<script src="<?= base_url('assets/') ?>home/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/') ?>home/js/wow.min.js"></script>
<script src="<?= base_url('assets/') ?>home/js/main.js"></script>
<script>
    // ==== for menu scroll
    const pageLink = document.querySelectorAll(".ud-menu-scroll");
    pageLink.forEach((elem) => {
        elem.addEventListener("click", (e) => {
            e.preventDefault();
            document.querySelector(elem.getAttribute("href")).scrollIntoView({
                behavior: "smooth",
                offsetTop: 1 - 60,
            });
        });
    });
    // section menu active
    function onScroll(event) {
        const sections = document.querySelectorAll(".ud-menu-scroll");
        const scrollPos =
            window.pageYOffset ||
            document.documentElement.scrollTop ||
            document.body.scrollTop;
        for (let i = 0; i < sections.length; i++) {
            const currLink = sections[i];
            const val = currLink.getAttribute("href");
            const refElement = document.querySelector(val);
            const scrollTopMinus = scrollPos + 73;
            if (
                refElement.offsetTop <= scrollTopMinus &&
                refElement.offsetTop + refElement.offsetHeight > scrollTopMinus
            ) {
                document
                    .querySelector(".ud-menu-scroll")
                    .classList.remove("active");
                currLink.classList.add("active");
            } else {
                currLink.classList.remove("active");
            }
        }
    }
    window.document.addEventListener("scroll", onScroll);
</script>
<!-- DragNDrop Image -->
<script>
    function fileValue(value) {
        var path = value.value;
        var extenstion = path.split('.').pop();
        document.getElementById('image-preview').src = window.URL.createObjectURL(value.files[0]);
        var filename = path.replace(/^.*[\\\/]/, '').split('.').slice(0, -1).join('.');
        document.getElementById("filename").innerHTML = filename;
    }

    function removeUpload() {
        $('#preview').hide();
    }
</script>

<script>
    setInterval(function() {
        document.getElementById("notification").className = "d-none";
    }, 6000);
</script>

<script>
    function askUsers() {

        Swal.fire({
            icon: "question",
            title: "KONFIRMASI",
            text: "Apakah anda yakin ingin melakukan pembayaran secara cash",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#FF0000",
            confirmButtonText: '<a href="url" style="color: white;">Lanjutkan</a>',
            cancelButtonText: "Batalkan"

        })
    }
</script>