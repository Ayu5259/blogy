<?php
// Login(true) validation
if (isset($_GET['loginned'])) {
?>
    <script>
        Swal.fire({
            title: "Good job!",
            text: "You login to Blogy!",
            icon: "success"
        });
    </script>
<?php
    // Login(false) validation
} else if (isset($_GET['notuser'])) {
?>
    <script>
        Swal.fire({
            title: "Oh!",
            text: "user is not availabe!",
            icon: "error"
        });
    </script>
<?php
    //logout validation
} else if (isset($_GET['not user'])) {
?>
    <script>
        Swal.fire({
            title: "logout!",
            text: "logout form Blogy!",
            icon: "info"
        });
    </script>
<?php
}
?>