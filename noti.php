<?php
require('top.inc.php');
?>

<main>
    <style>
        /* Styles for notifications */
        .notification-container {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            justify-content: center;
        }

        .notification {
            display: flex;
            align-items: center;
            padding: 20px;
            border-radius: 8px;
            background-color: #dff0d8;
            color: #3c763d;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .notification i {
            margin-right: 10px;
            color: #3c763d;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .notification-container {
                padding: 20px;
            }

            .notification {
                width: 100%;
            }
        }
    </style>

    <div class="notification-container">
        <?php
        $noti_res = mysqli_query($con, "SELECT * FROM `noti` ORDER BY `id` DESC");
        while ($noti_row = mysqli_fetch_assoc($noti_res)) {
        ?>
            <p><?php echo $noti_row['date'] ?></p>
            <div class="notification">
                <i class="fas fa-check-circle"></i>
                <p><?php echo $noti_row['desc'] ?></p>
            </div>
        <?php } ?>
    </div>
</main>



<!-- Your other JavaScript code -->
<script src="./assets/js/script.js"></script>

<!-- Ionicon link -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
