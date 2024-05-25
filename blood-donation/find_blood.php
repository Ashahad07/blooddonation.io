    <?php
    ob_start();
    session_start();
    require "db_connection.php";

    ?>



    <!DOCTYPE html>
    <html>

    <head>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="main.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" src="script.js"></script>



    </head>

    <body>

        <div class="col-12" style="height: 50px">
            <!-- Output a div element with an "comname" ID -->
            <div id="comname">
            </div>

            <!-- Output a div element with a "nav" ID and a "col-12" class -->
            <div id="nav" class="col-12">
                <!-- Output an unordered list -->
                <ul>

                    <?php

                    //include header file
                    include('include/header.php');

                    ?>
                    <?php
                    // Check if the session variable "sess_user_id" is set and not empty
                    if (isset($_SESSION['sess_user_id']) && !empty($_SESSION['sess_user_id'])) {
                        // Output a list item with a link to the "logout.php" page
                        echo '<li style="background-color: rgba(255,0,0,0.5);"><a href="logout.php">Logout</a></ul>';
                    }
                    ?>
                </ul>
            </div>


        </div>
        <div style="margin: 0; padding: 0 3% 0 7%; text-align: center;">
            <!-- Output a div element with a "col-11" class and some inline styles -->
            <div class="col-11" style="background-color: rgba(82, 127, 99,0.5); border-radius: 10px;
    padding: 0">
                <!-- Output a div element with some inline styles -->
                <div style="background-color: rgb(5 85 92);border-radius: 10px; overflow: auto;width: 100%; padding: 5px;">
                    <!-- Output a form element -->
                    <form>
                        <!-- Output a select element with some inline JavaScript -->
                        <select name="bloodgroup" onchange="showUser(this.value)" id="sel">
                            <option value="">Select Blood Group</option>
                            <option value="A pos">A+</option>
                            <option value="A neg">A-</option>
                            <option value="B pos">B+</option>
                            <option value="B neg">B-</option>
                            <option value="O pos">O+</option>
                            <option value="O neg">O-</option>
                            <option value="AB pos">AB+</option>
                            <option value="AB neg">AB-</option>
                        </select>
                    </form>
                </div>
                <!-- Output a div element with some inline styles and an "txtHint" ID -->
                <div id="txtHint" style="padding: 5% 0 5% 0; width: 100%; overflow: auto;"></div>
            </div>

        </div>

        <?php

        // Check if the GET superglobal variable is set
        if (isset($_GET)) {
            // Set $a to the value of the "bloodgroup" parameter in the GET request, or to "A pos" if it is not set
            $a = $_GET["bloodgroup"] ?? "A pos";
        } else {
            // Set $a to an empty string if the GET superglobal is not set
            $a = "";
        }

        ?>

        <script>
            // When the page finishes loading
            window.onload = function() {
                // Get the value of the PHP variable $a
                var val = '<?php echo $a; ?>';
                // Get the element with the "sel" ID
                var sel = document.getElementById('sel');
                // Get the options in the element
                var opts = sel.options;
                // Loop through the options
                for (var opt, j = 0; opt = opts[j]; j++) {
                    // If the option value matches the value of $a
                    if (opt.value == val) {
                        // Set the selected index of the element to the current option
                        sel.selectedIndex = j;
                        // Break out of the loop
                        break;
                    }
                }
                // Get the value of the PHP variable $a
                var va = '<?php echo $a; ?>';
                // Call the showUser function with the value of $a as an argument
                showUser(va);
            }
        </script>


    </body>

    </html>