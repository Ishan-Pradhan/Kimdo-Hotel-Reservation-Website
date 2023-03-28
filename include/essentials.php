<?php
function bookingsucessalert()
{
    echo "<div id='sucessalert' class='sucessalert'>
        <p class='alert-heading'>Booking Successful!</p>
        <button class='close-btn'  onclick='closeCustomAlert()'>&times;</button>
    </div>

    <script>

    function closeCustomAlert() {
        document.getElementById('sucessalert').style.display = 'none';
    }
</script>";
}

function bookingerroralert()
{
    echo "<div id='erroralert' class='sucessalert'>
        <p class='alert-heading'>Error Occured while booking</p>
        <button class='close-btn'  onclick='closeCustomAlert()'>&times;</button>
    </div>

    <script>

    function closeCustomAlert() {
        document.getElementById('sucessalert').style.display = 'none';
    }
</script>";
}

function adminsuccessalert()
{
    echo "<div id='sucessalert' class='sucessalert'>
        <p class='alert-heading'>Update Successful!</p>
        <button class='close-btn'  onclick='closeCustomAlert()'>&times;</button>
    </div>

    <script>

    function closeCustomAlert() {
        document.getElementById('sucessalert').style.display = 'none';
    }
</script>";
}
