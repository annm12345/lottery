        <?php require('connection.php') ?>
                <?php
                    if(isset($_GET['amount'])&& isset($_GET['date']) && isset($_GET['type']) && isset($_GET['alpha'])) {
                        $amount = $_GET['amount'];
                        $date = $_GET['date'];
                        $type = $_GET['type'];
                        $alpha = $_GET['alpha'];
                        $res = mysqli_query($con, "SELECT DISTINCT `lottery`.`alpha`, `lottery`.`list_id`, `lottery`.`alpha`, `list`.* 
                            FROM `list`, `lottery` 
                            WHERE `list`.`amount`='$amount' 
                            AND `list`.`date`='$date' 
                            AND `list`.`type`='$type' 
                            AND `lottery`.`list_id`=`list`.`id` 
                            AND `lottery`.`alpha`='$alpha'  
                            AND `list`.`sell`=''");

                        while ($row = mysqli_fetch_assoc($res)) {
                            $list_id=$row['id'];
                            $lot_row=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `lottery` Where `list_id`='$list_id' "));
                            $lot_simple_row=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `lottery` Where `list_id`='$list_id'"));
                        ?>
                        <div class="list_container" style="border-bottom:1px dashed #000 ;">
                            
                            <div class="first_lottery">
                                <div class="" style="display:flex;flex-direction:column;gap:0.5rem;">
                                    <?php
                                    // Assuming $row is defined earlier in your code
                                    if ($row['type'] == 'alpha' || $row['type'] == 'num') {
                                        $lot_last_row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `lottery` WHERE `list_id`='$list_id' ORDER BY `id` DESC LIMIT 1"));
                                        echo '<div class="" style="display:grid;grid-template-columns: 45% 75%;gap:0.5rem;">';
                                        echo '<span class="Aname">';
                                        echo $lot_row['alpha'] . '   ';

                                        if ($row['type'] == 'alpha') {
                                            echo '-';
                                            echo $lot_last_row['alpha'];
                                        }
                                        echo '</span>';
                                        echo '<span class="Aname">';
                                        echo $lot_row['num1'] . ' ' . $lot_row['num2'] . ' ' . $lot_row['num3'] . ' ' . $lot_row['num4'] . ' ' . $lot_row['num5'] . ' ' . $lot_row['num6'];

                                        if ($row['type'] == 'num') {
                                            echo '-';
                                            echo $lot_last_row['num6'];
                                        }

                                        echo '</span>';
                                        echo '</div>';
                                    }

                                    if ($row['type'] == 'int') {
                                        $lot_int_res = mysqli_query($con, "SELECT * FROM `lottery` WHERE `list_id`='$list_id' ORDER BY `id` ASC LIMIT 3");
                                        while ($lot_int_row = mysqli_fetch_assoc($lot_int_res)) {
                                            echo '<div class="" style="display:grid;grid-template-columns: 45% 75%;gap:0.5rem;">';
                                            echo '<span class="Aname">';
                                            echo $lot_int_row['alpha'] ;
                                            echo '</span>';
                                            echo '<span class="Aname">';
                                            echo  $lot_int_row['num1'] . ' ' . $lot_int_row['num2'] . ' ' . $lot_int_row['num3'] . ' ' . $lot_int_row['num4'] . ' ' . $lot_int_row['num5'] . ' ' . $lot_int_row['num6'];
                                            echo '</span>';
                                            echo '</div>';
                                        }
                                    }
                                    ?>

                                    <?php
                                        $lot_simple_res=mysqli_query($con,"SELECT * FROM `lottery` Where `list_id`='$list_id'");
                                        while($lot_simple_row=mysqli_fetch_assoc($lot_simple_res)){
                                    ?>
                                    <span style="display:none" id="pname"><?php echo $row['type'] ?></span>
                                    <!-- <span class="Aname" style="display:none">
                                        <?php
                                            echo $lot_simple_row['alpha'];
                                            echo $lot_simple_row['num1'];
                                            echo $lot_simple_row['num2'];
                                            echo $lot_simple_row['num3'];
                                            echo $lot_simple_row['num4'];
                                            echo $lot_simple_row['num5'];
                                            echo $lot_simple_row['num6'];
                                        ?>
                                    </span> -->
                                    <?php } ?>
                                    



                                </div>
                                <a href="lottery.php?list_id=<?php echo $row['id'] ?>">ဝယ်မည်</a>
                            </div>
                        </div>
                <?php
                        }
                    }else if(isset($_GET['amount'])&& isset($_GET['date']) && isset($_GET['alpha'])) {
                        $amount = $_GET['amount'];
                        $date = $_GET['date'];
                        $alpha = $_GET['alpha'];
                        $res = mysqli_query($con, "SELECT `lottery`.`alpha`,`lottery`.`list_id`,`list`.* FROM `list`,`lottery` WHERE `list`.`amount`='$amount'AND `list`.`date`='$date' AND `lottery`.`list_id`=`list`.`id` AND `lottery`.`alpha`='$alpha'  AND `list`.`sell`=''");
                        while ($row = mysqli_fetch_assoc($res)) {
                            $list_id=$row['list_id'];
                            $lot_row=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `lottery` Where `list_id`='$list_id' limit 1"));
                            $lot_simple_row=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `lottery` Where `list_id`='$list_id'"));
                        ?>
                        <div class="list_container" style="border-bottom:1px dashed #000 ;">
                            
                            <div class="first_lottery">
                                <div class="" style="display:flex;flex-direction:column;gap:0.5rem;">
                                    <?php
                                    // Assuming $row is defined earlier in your code
                                    if ($row['type'] == 'alpha' || $row['type'] == 'num') {
                                        $lot_last_row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `lottery` WHERE `list_id`='$list_id' ORDER BY `id` DESC LIMIT 1"));
                                        echo '<div class="" style="display:grid;grid-template-columns: 45% 75%;gap:0.5rem;">';
                                        echo '<span class="Aname">';
                                        echo $lot_row['alpha'] . '   ';

                                        if ($row['type'] == 'alpha') {
                                            echo '-';
                                            echo $lot_last_row['alpha'];
                                        }
                                        echo '</span>';
                                        echo '<span class="Aname">';
                                        echo $lot_row['num1'] . ' ' . $lot_row['num2'] . ' ' . $lot_row['num3'] . ' ' . $lot_row['num4'] . ' ' . $lot_row['num5'] . ' ' . $lot_row['num6'];

                                        if ($row['type'] == 'num') {
                                            echo '-';
                                            echo $lot_last_row['num6'];
                                        }

                                        echo '</span>';
                                        echo '</div>';
                                    }

                                    if ($row['type'] == 'int') {
                                        $lot_int_res = mysqli_query($con, "SELECT * FROM `lottery` WHERE `list_id`='$list_id' ORDER BY `id` ASC LIMIT 3");
                                        while ($lot_int_row = mysqli_fetch_assoc($lot_int_res)) {
                                            echo '<div class="" style="display:grid;grid-template-columns: 45% 75%;gap:0.5rem;">';
                                            echo '<span class="Aname">';
                                            echo $lot_int_row['alpha'] ;
                                            echo '</span>';
                                            echo '<span class="Aname">';
                                            echo  $lot_int_row['num1'] . ' ' . $lot_int_row['num2'] . ' ' . $lot_int_row['num3'] . ' ' . $lot_int_row['num4'] . ' ' . $lot_int_row['num5'] . ' ' . $lot_int_row['num6'];
                                            echo '</span>';
                                            echo '</div>';
                                        }
                                    }
                                    ?>

                                    <?php
                                        $lot_simple_res=mysqli_query($con,"SELECT * FROM `lottery` Where `list_id`='$list_id'");
                                        while($lot_simple_row=mysqli_fetch_assoc($lot_simple_res)){
                                    ?>
                                    <span style="display:none" id="pname"><?php echo $row['type'] ?></span>
                                    <!-- <span class="Aname" style="display:none">
                                        <?php
                                            echo $lot_simple_row['alpha'];
                                            echo $lot_simple_row['num1'];
                                            echo $lot_simple_row['num2'];
                                            echo $lot_simple_row['num3'];
                                            echo $lot_simple_row['num4'];
                                            echo $lot_simple_row['num5'];
                                            echo $lot_simple_row['num6'];
                                        ?>
                                    </span> -->
                                    <?php } ?>
                                    



                                </div>
                                <a href="lottery.php?list_id=<?php echo $row['id'] ?>">ဝယ်မည်</a>
                            </div>
                        </div>
                <?php
                        }
                    }else if(isset($_GET['amount'])&& isset($_GET['date']) && isset($_GET['type'])) {
                        $amount = $_GET['amount'];
                        $date = $_GET['date'];
                        $type = $_GET['type'];
                        $res = mysqli_query($con, "SELECT * FROM `list` WHERE `amount`='$amount'AND `date`='$date' AND `type`='$type' AND `sell`=''");
                        while ($row = mysqli_fetch_assoc($res)) {
                            $list_id=$row['id'];
                            $lot_row=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `lottery` Where `list_id`='$list_id' limit 1"));
                            $lot_simple_row=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `lottery` Where `list_id`='$list_id'"));
                        ?>
                        <div class="list_container" style="border-bottom:1px dashed #000 ;">

                            <div class="first_lottery">
                                <div class="" style="display:flex;flex-direction:column;gap:0.5rem;">
                                    <?php
                                    // Assuming $row is defined earlier in your code
                                    if ($row['type'] == 'alpha' || $row['type'] == 'num') {
                                        $lot_last_row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `lottery` WHERE `list_id`='$list_id' ORDER BY `id` DESC LIMIT 1"));
                                        echo '<div class="" style="display:grid;grid-template-columns: 45% 75%;gap:0.5rem;">';
                                        echo '<span class="Aname">';
                                        echo $lot_row['alpha'] . '   ';

                                        if ($row['type'] == 'alpha') {
                                            echo '-';
                                            echo $lot_last_row['alpha'];
                                        }
                                        echo '</span>';
                                        echo '<span class="Aname">';
                                        echo $lot_row['num1'] . ' ' . $lot_row['num2'] . ' ' . $lot_row['num3'] . ' ' . $lot_row['num4'] . ' ' . $lot_row['num5'] . ' ' . $lot_row['num6'];

                                        if ($row['type'] == 'num') {
                                            echo '-';
                                            echo $lot_last_row['num6'];
                                        }

                                        echo '</span>';
                                        echo '</div>';
                                    }

                                    if ($row['type'] == 'int') {
                                        $lot_int_res = mysqli_query($con, "SELECT * FROM `lottery` WHERE `list_id`='$list_id' ORDER BY `id` ASC LIMIT 3");
                                        while ($lot_int_row = mysqli_fetch_assoc($lot_int_res)) {
                                            echo '<div class="" style="display:grid;grid-template-columns: 45% 75%;gap:0.5rem;">';
                                            echo '<span class="Aname">';
                                            echo $lot_int_row['alpha'] ;
                                            echo '</span>';
                                            echo '<span class="Aname">';
                                            echo  $lot_int_row['num1'] . ' ' . $lot_int_row['num2'] . ' ' . $lot_int_row['num3'] . ' ' . $lot_int_row['num4'] . ' ' . $lot_int_row['num5'] . ' ' . $lot_int_row['num6'];
                                            echo '</span>';
                                            echo '</div>';
                                        }
                                    }
                                    ?>

                                    <?php
                                        $lot_simple_res=mysqli_query($con,"SELECT * FROM `lottery` Where `list_id`='$list_id'");
                                        while($lot_simple_row=mysqli_fetch_assoc($lot_simple_res)){
                                    ?>
                                    <span style="display:none" id="pname"><?php echo $row['type'] ?></span>
                                    <!-- <span class="Aname" style="display:none">
                                        <?php
                                            echo $lot_simple_row['alpha'];
                                            echo $lot_simple_row['num1'];
                                            echo $lot_simple_row['num2'];
                                            echo $lot_simple_row['num3'];
                                            echo $lot_simple_row['num4'];
                                            echo $lot_simple_row['num5'];
                                            echo $lot_simple_row['num6'];
                                        ?>
                                    </span> -->
                                    <?php } ?>
                                    



                                </div>
                                <a href="lottery.php?list_id=<?php echo $row['id'] ?>">ဝယ်မည်</a>
                            </div>
                        </div>
                <?php
                        }
                    }else if(isset($_GET['amount'])&& isset($_GET['date']) && isset($_GET['num'])) {
                        $amount = $_GET['amount'];
                        $date = $_GET['date'];
                        
                        // Check if six numbers are provided
                        if (isset($_GET['num']) && strlen($_GET['num']) == 6) {
                            $numbers = str_split($_GET['num']);
                            $num1s = $numbers[0];
                            $num2s = $numbers[1];
                            $num3s = $numbers[2];
                            $num4s = $numbers[3];
                            $num5s = $numbers[4];
                            $num6s = $numbers[5];
                        
                            $res = mysqli_query($con, "SELECT DISTINCT `lottery`.`alpha`, `lottery`.`list_id`, `lottery`.`alpha`, `list`.* 
                                                        FROM `list`, `lottery` 
                                                        WHERE `list`.`amount`='$amount' 
                                                        AND `list`.`date`='$date' 
                                                        AND `lottery`.`list_id`=`list`.`id` 
                                                        AND `lottery`.`num1`='$num1s'  
                                                        AND `lottery`.`num2`='$num2s'  
                                                        AND `lottery`.`num3`='$num3s'  
                                                        AND `lottery`.`num4`='$num4s'  
                                                        AND `lottery`.`num5`='$num5s'  
                                                        AND `lottery`.`num6`='$num6s'  
                                                        AND `list`.`sell`=''");
                        }else if (isset($_GET['num']) && strlen($_GET['num']) == 2) {
                            $numbers = str_split($_GET['num']);
                            $num1s = $numbers[0];
                            $num2s = $numbers[1];
                        
                            $res = mysqli_query($con, "SELECT DISTINCT `lottery`.`alpha`, `lottery`.`list_id`, `lottery`.`alpha`, `list`.* 
                                                        FROM `list`, `lottery` 
                                                        WHERE `list`.`amount`='$amount' 
                                                        AND `list`.`date`='$date' 
                                                        AND `lottery`.`list_id`=`list`.`id` 
                                                        AND `lottery`.`num1`='$num1s'  
                                                        AND `lottery`.`num2`='$num2s'  
                                                        AND `list`.`sell`!='true'");
                        } else if (isset($_GET['num']) && strlen($_GET['num']) == 3) {
                            $numbers = str_split($_GET['num']);
                            $num1s = $numbers[0];
                            $num2s = $numbers[1];
                            $num3s = $numbers[2];
                        
                            $res = mysqli_query($con, "SELECT DISTINCT `lottery`.`alpha`, `lottery`.`list_id`, `lottery`.`alpha`, `list`.* 
                                                        FROM `list`, `lottery` 
                                                        WHERE `list`.`amount`='$amount' 
                                                        AND `list`.`date`='$date' 
                                                        AND `lottery`.`list_id`=`list`.`id` 
                                                        AND `lottery`.`num1`='$num1s'  
                                                        AND `lottery`.`num2`='$num2s'  
                                                        AND `lottery`.`num3`='$num3s'  
                                                        AND `list`.`sell`!='true'");
                        } else if (isset($_GET['num']) && strlen($_GET['num']) == 4) {
                            $numbers = str_split($_GET['num']);
                            $num1s = $numbers[0];
                            $num2s = $numbers[1];
                            $num3s = $numbers[2];
                            $num4s = $numbers[3];
                            $res = mysqli_query($con, "SELECT DISTINCT `lottery`.`alpha`, `lottery`.`list_id`, `lottery`.`alpha`, `list`.* 
                                                        FROM `list`, `lottery` 
                                                        WHERE `list`.`amount`='$amount' 
                                                        AND `list`.`date`='$date' 
                                                        AND `lottery`.`list_id`=`list`.`id` 
                                                        AND `lottery`.`num1`='$num1s'  
                                                        AND `lottery`.`num2`='$num2s'  
                                                        AND `lottery`.`num3`='$num3s'  
                                                        AND `lottery`.`num4`='$num4s'  
                                                        AND `list`.`sell`!='true'");
                        } else if (isset($_GET['num']) && strlen($_GET['num']) == 5) {
                            $numbers = str_split($_GET['num']);
                            $num1s = $numbers[0];
                            $num2s = $numbers[1];
                            $num3s = $numbers[2];
                            $num4s = $numbers[3];
                            $num5s = $numbers[4];
                            $res = mysqli_query($con, "SELECT DISTINCT `lottery`.`alpha`, `lottery`.`list_id`, `lottery`.`alpha`, `list`.* 
                                                        FROM `list`, `lottery` 
                                                        WHERE `list`.`amount`='$amount' 
                                                        AND `list`.`date`='$date' 
                                                        AND `lottery`.`list_id`=`list`.`id` 
                                                        AND `lottery`.`num1`='$num1s'  
                                                        AND `lottery`.`num2`='$num2s'  
                                                        AND `lottery`.`num3`='$num3s'  
                                                        AND `lottery`.`num4`='$num4s'  
                                                        AND `lottery`.`num5`='$num5s'  
                                                        AND `list`.`sell`!='true'");
                        }
                        else if (isset($_GET['num']) && strlen($_GET['num']) == 1) {
                            $num1s = $_GET['num'];
                        
                            $res = mysqli_query($con, "SELECT DISTINCT `lottery`.`alpha`, `lottery`.`list_id`, `lottery`.`alpha`, `list`.* 
                                                        FROM `list`, `lottery` 
                                                        WHERE `list`.`amount`='$amount' 
                                                        AND `list`.`date`='$date' 
                                                        AND `lottery`.`list_id`=`list`.`id` 
                                                        AND `lottery`.`num1`='$num1s'  
                                                        AND `list`.`sell`!='true'");
                        } 
                        while ($row = mysqli_fetch_assoc($res)) {
                            $list_id=$row['id'];
                            $lot_row=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `lottery` Where `list_id`='$list_id' limit 1"));
                            $lot_simple_row=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `lottery` Where `list_id`='$list_id'"));
                        ?>
                        <div class="list_container" style="margin-bottom:0.6rem;width: 360px;margin-left:10px;">
                            
                            <div class="first_lottery">
                                <div class="" style="display:flex;flex-direction:column;gap:0.5rem;">
                                    <span style="display:none" id="pname"><?php echo $row['type'] ?></span>
                                    <?php
                                    // Assuming $row is defined earlier in your code
                                    if ($row['type'] == 'alpha' || $row['type'] == 'num') {
                                        $lot_last_row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `lottery` WHERE `list_id`='$list_id' ORDER BY `id` DESC LIMIT 1"));

                                        echo '<span class="Aname">';
                                        echo $lot_row['alpha'] . '   ';

                                        if ($row['type'] == 'alpha') {
                                            echo '-';
                                            echo $lot_last_row['alpha'];
                                        }

                                        echo $lot_row['num1'] . ' ' . $lot_row['num2'] . ' ' . $lot_row['num3'] . ' ' . $lot_row['num4'] . ' ' . $lot_row['num5'] . ' ' . $lot_row['num6'];

                                        if ($row['type'] == 'num') {
                                            echo '-';
                                            echo $lot_last_row['num6'];
                                        }

                                        echo '</span>';
                                    }

                                    if ($row['type'] == 'int') {
                                        $lot_int_res = mysqli_query($con, "SELECT * FROM `lottery` WHERE `list_id`='$list_id' ORDER BY `id` ASC LIMIT 3");
                                        while ($lot_int_row = mysqli_fetch_assoc($lot_int_res)) {
                                            echo '<span class="Aname">';
                                            echo $lot_int_row['alpha'] . ' ' . $lot_int_row['num1'] . ' ' . $lot_int_row['num2'] . ' ' . $lot_int_row['num3'] . ' ' . $lot_int_row['num4'] . ' ' . $lot_int_row['num5'] . ' ' . $lot_int_row['num6'];
                                            echo '</span>';
                                        }
                                    }
                                    ?>

                                    <?php
                                        $lot_simple_res=mysqli_query($con,"SELECT * FROM `lottery` Where `list_id`='$list_id'");
                                        while($lot_simple_row=mysqli_fetch_assoc($lot_simple_res)){
                                    ?>
                                    <span style="display:none" id="pname"><?php echo $row['type'] ?></span>
                                    <span class="Aname" style="display:none">
                                        <?php
                                            echo $lot_simple_row['alpha'];
                                            echo $lot_simple_row['num1'];
                                            echo $lot_simple_row['num2'];
                                            echo $lot_simple_row['num3'];
                                            echo $lot_simple_row['num4'];
                                            echo $lot_simple_row['num5'];
                                            echo $lot_simple_row['num6'];
                                        ?>
                                    </span>
                                    <?php } ?>
                                    



                                </div>
                                <a href="lottery.php?list_id=<?php echo $row['id'] ?>">ယူမည်</a>
                            </div>
                        </div>
                <?php
                        } 
                    }else if(isset($_GET['amount'])&& isset($_GET['date'])) {
                        $amount = $_GET['amount'];
                        $date = $_GET['date'];
                        $res = mysqli_query($con, "SELECT * FROM `list` WHERE `amount`='$amount'AND `date`='$date' AND `sell`=''");
                        while ($row = mysqli_fetch_assoc($res)) {
                            $list_id=$row['id'];
                            $lot_row=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `lottery` Where `list_id`='$list_id' limit 1"));
                            $lot_simple_row=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `lottery` Where `list_id`='$list_id'"));
                        ?>
                        <div class="list_container" style="border-bottom:1px dashed #000 ;">
                            
                            <div class="first_lottery">
                                <div class="" style="display:flex;flex-direction:column;gap:0.5rem;">
                                    <?php
                                    // Assuming $row is defined earlier in your code
                                    if ($row['type'] == 'alpha' || $row['type'] == 'num') {
                                        $lot_last_row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `lottery` WHERE `list_id`='$list_id' ORDER BY `id` DESC LIMIT 1"));
                                        echo '<div class="" style="display:grid;grid-template-columns: 45% 75%;gap:0.5rem;">';
                                        echo '<span class="Aname">';
                                        echo $lot_row['alpha'] . '   ';

                                        if ($row['type'] == 'alpha') {
                                            echo '-';
                                            echo $lot_last_row['alpha'];
                                        }
                                        echo '</span>';
                                        echo '<span class="Aname">';
                                        echo $lot_row['num1'] . ' ' . $lot_row['num2'] . ' ' . $lot_row['num3'] . ' ' . $lot_row['num4'] . ' ' . $lot_row['num5'] . ' ' . $lot_row['num6'];

                                        if ($row['type'] == 'num') {
                                            echo '-';
                                            echo $lot_last_row['num6'];
                                        }

                                        echo '</span>';
                                        echo '</div>';
                                    }

                                    if ($row['type'] == 'int') {
                                        $lot_int_res = mysqli_query($con, "SELECT * FROM `lottery` WHERE `list_id`='$list_id' ORDER BY `id` ASC LIMIT 3");
                                        while ($lot_int_row = mysqli_fetch_assoc($lot_int_res)) {
                                            echo '<div class="" style="display:grid;grid-template-columns: 45% 75%;gap:0.5rem;">';
                                            echo '<span class="Aname">';
                                            echo $lot_int_row['alpha'] ;
                                            echo '</span>';
                                            echo '<span class="Aname">';
                                            echo  $lot_int_row['num1'] . ' ' . $lot_int_row['num2'] . ' ' . $lot_int_row['num3'] . ' ' . $lot_int_row['num4'] . ' ' . $lot_int_row['num5'] . ' ' . $lot_int_row['num6'];
                                            echo '</span>';
                                            echo '</div>';
                                        }
                                    }
                                    ?>

                                    <?php
                                        $lot_simple_res=mysqli_query($con,"SELECT * FROM `lottery` Where `list_id`='$list_id'");
                                        while($lot_simple_row=mysqli_fetch_assoc($lot_simple_res)){
                                    ?>
                                    <span style="display:none" id="pname"><?php echo $row['type'] ?></span>
                                    <!-- <span class="Aname" style="display:none">
                                        <?php
                                            echo $lot_simple_row['alpha'];
                                            echo $lot_simple_row['num1'];
                                            echo $lot_simple_row['num2'];
                                            echo $lot_simple_row['num3'];
                                            echo $lot_simple_row['num4'];
                                            echo $lot_simple_row['num5'];
                                            echo $lot_simple_row['num6'];
                                        ?>
                                    </span> -->
                                    <?php } ?>
                                    



                                </div>
                                <a href="lottery.php?list_id=<?php echo $row['id'] ?>">ဝယ်မည်</a>
                            </div>
                        </div>
                <?php
                        }
                    }
                ?>
                