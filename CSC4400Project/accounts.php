<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="accounts_styles.css" rel="stylesheet">
  </head>
  <body>
  
	<div id="logo_space">
		<div class="navbar">
				<ul>
					<p id="logo_text">Quick-serve</p></a>
					<li><a href="manager_page.html">Home</a></li>
					<li><a href="accounts.html">Accounts</a></li>
					<li><a href="#edit_menu">Edit Menu</a></li>
					<li><a href="#order_history">Orders</a></li>
					<li><a href="#payments">Payments</a></li>
				</ul>
		</div>
	</div>
  
	<div id="container">
		<div id="accounts_space">
			<p class="list_font">Active accounts: </p>
			<?php 
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "test";
                            
                            // Create connection
                            $conn = new mysqli($servername, $username, $password, $dbname);

                            // Check connection
                            if ($conn->connect_error) {
                              die("Connection failed: " . $conn->connect_error);
                            }
                            //   3. Generate an SQL statement
                            $sql = "SELECT Username, Password FROM login";
                            $result = $conn->query($sql);
                            $num_rows = mysqli_num_rows($result);
                            
                            if ($result !== false) {
                                //Snagging database info based on passed in parameters
                                $access_result = mysqli_query($conn, $sql);
                                $result_arr = mysqli_fetch_all($access_result, MYSQLI_NUM);
                                $length = count($result_arr);
                                //echo $length;
                                for($i = 0; $i < $length; $i++)
                                {
                                    //echo '<p class="sublist-font">' . $key . '</p>';
                                    echo 
                                    '<p class="sublist_font">Name: ' . $result_arr[$i][0] . '    Pass: ' . $result_arr[$i][1] . '</p>';
                                }
                            }

                            //shut down connection
                            $conn->close();
                            
                        ?>	
		</div>
		<div>
			<p class="list_font">Terminated accounts:</p>
			<p>None</p>
		</div>
		<div>
			<div class="account_action">
                            <form id="button_form">
				<input type="button" name="create_btn" id="create_btn" value="C R E A T E" class="button_form">
				<input type="button" name="del_btn" value="T E R M I N A T E" class="button_form">
				<input type="button" name="edit_btn" value="E D I T" class="button_form">
                            </form>
			</div>
		</div>
	</div>

  </body>
</html>
