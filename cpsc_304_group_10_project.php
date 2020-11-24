<html>
    <head>
        <title>CPSC 304 Group 10 Project</title>
            <style>
                body  {background-color:#FFFFFF;}
                h1    {font-family:helvetica;color:#002145;}
                h2    {font-family:helvetica;color:#002145;}
                p     {font-family:helvetica;color:#002145;}
                input {font-family:helvetica;color:#002145;}
                hr    {font-family:helvetica;color:#002145;}
            </style>
    </head>
    <body>
    <script language="javascript">
    function copy_over() {
      document.all["text_2"].value=document.all["text_1"].value
    }
    </script>
        <img src="ubc.jpg" width="589" height="137">
        <h1>CPSC 304 Group 10 Project - Game Café Manager</h1>

        <h2>reset</h2>
        <form method="POST" action="cpsc_304_group_10_project.php">
            <input type="hidden" id="resetTablesRequest" name="resetTablesRequest">
            <p><input type="submit" value="reset" name="reset"></p>
        </form>

        <hr />

        <h2>insert a new customer</h2>
        <form method="POST" action="cpsc_304_group_10_project.php">
            <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
                INSERT INTO customer <br /><br />
                VALUES      <input type="number" name="insCID" placeholder="cid (e.g. 304)">
                            <input type="text" name="insCNAME" placeholder="cname (e.g. CPSC)">
                            <input type="number" name="insAGE" placeholder="age (e.g. 20)">
                            <br /><br />
            <p><input type="submit" value="insert" name="insertSubmit"></p>
        </form>

        <hr />

        <h2>insert a new order and reserve a seat</h2>
        <form method="POST" action="cpsc_304_group_10_project.php">
            <input type="hidden" id="insertQuery2Request" name="insertQuery2Request">
              INSERT INTO make_orders <br /><br />
              VALUES      <input type="number" id="text_1" onkeyup="copy_over()" name="insOID" placeholder="order_id (e.g. 1)">
                          <input type="number" name="insOCID" placeholder="cid (e.g. 304)">
                          <input type="text" name="insDate" value="<?php echo date("Y-m-d");?>"/>
                          <!-- <input type="text" name="insMethod" placeholder="method (e.g. VISA)"> -->
                          <select name="insMethod" placeholder="method (e.g. VISA)">
                                <option value=""disabled selected>select a payment method</option>
                                <option value="CASH">CASH</option>
                                <option value="UBCcard">UBCcard</option>
                                <option value="VISA">VISA</option>
                                <option value="MASTERCARD">MASTERCARD</option>
                                <option value="AMERICAN EXPRESS">AMERICAN EXPRESS</option>
                                <option value="PAYPAL">PAYPAL</option>
                                <option value="BITCOIN">BITCOIN</option>
                                <option value="WECHAT PAY">WECHAT PAY</option>
                                <option value="ALIPAY">ALIPAY</option>
                          </select>
                          <br /><br />
             INSERT INTO reserves <br /><br />
             VALUES       <input type="number" id="text_2" disabled placeholder="order_id (e.g. 1)">
                          <input type="number" name="insSeat#" min="1" max="9" placeholder="seat# (e.g. 1)">
                          <input type="number" name="insHrs" placeholder="hours (e.g. 5)">
                          <br /><br />
            <p><input type="submit" value="insert" name="insertSubmit2"></p>
        </form>

        <hr />

        <h2>insert a food order</h2>
        <p>note: only to an existing order made above.</p>
        <form method="POST" action="cpsc_304_group_10_project.php">
            <input type="hidden" id="insertQuery3Request" name="insertQuery3Request">
            INSERT INTO food_order <br /><br />
            VALUES        <input type="text" name="insFoodName" placeholder="fname (e.g. Hotdog)">
                          <input type="number" name="insFOID" placeholder="order_id (e.g. 1)">
                          <input type="number" name="insQTY" placeholder="food_qty (e.g. 1)">
                          <br /><br />
            <p><input type="submit" value="insert" name="insertSubmit3"></p>
        </form>

        <hr />

        <h2>delete an order</h2>
        <form method="POST" action="cpsc_304_group_10_project.php">
            <input type="hidden" id="deleteQueryRequest" name="deleteQueryRequest">
                DELETE FROM make_orders <br /><br />
                WHERE order_id = <input type="number" name="delOrderID" placeholder="order_id (e.g. 304)">
            <p><input type="submit" value="delete" name="deleteSubmit"></p>
        </form>

        <hr />

        <h2>update a customer's age</h2>
        <form method="POST" action="cpsc_304_group_10_project.php">
            <input type="hidden" id="updateQueryRequest" name="updateQueryRequest">
                UPDATE customer <br /><br />
                SET    age = <input type="number" name="updateAge" placeholder="age (e.g. 20)"> <br /><br />
                WHERE  cid = <input type="number" name="updateCID" placeholder="cid (e.g. 304)"> <br /><br />
            <p><input type="submit" value="update" name="updateSubmit"></p>
        </form>

        <hr />

        <h2>selection</h2>
        <p> display the list of games for a console.
        <form method="GET" action="cpsc_304_group_10_project.php">
            <input type="hidden" id="selectQueryRequest" name="selectQueryRequest">
                SELECT * <br /><br />
                FROM Game <br /><br />
                WHERE platform = <select name="selPlatform">
                                      <option value="PC">PC</option>
                                      <option value="Switch">Switch</option>
                                      <option value="PS4">PS4</option>
                                      <option value="PS5">PS5 (coming soon!)</option>
                                 </select> <br /><br />
            <p><input type="submit" value="select" name="selectQuery"></p>
        </form>

        <hr />

        <h2>projection</h2>
        <form method="GET" action="cpsc_304_group_10_project.php">
            <input type="hidden" id="projectQueryRequest" name="projectQueryRequest">
                SELECT o.cid AS cid, c.cname AS name, o.orderid AS orderid, o.odate AS date <br /><br />
                FROM make_orders o, reserves r, customer c <br /><br />
                WHERE c.cid = o.cid AND o.orderid = r.orderid AND o.cid = <input type="number" name="projectCID" placeholder="cid (e.g. 304)"> <br /><br />
            <p><input type="submit" value="project" name="projectQuery"></p>
        </form>

        <!-- <hr />

        <h2>join</h2>
        <form method="GET" action="cpsc_304_group_10_project.php">
            <input type="hidden" id="joinQueryRequest" name="joinQueryRequest">
                SELECT * <br /><br />
                FROM   member m, customer c <br /><br />
                WHERE  c.cid = m.cid AND c.age >= <input type="number" name="joinAge" placeholder="age (e.g. 20)"> <br /><br />
            <p><input type="submit" value="join" name="joinQuery"></p>
        </form> -->

        <hr />

        <h2>aggregation with group by</h2>
        <p> shows the number of games for each console.
        <form method="GET" action="cpsc_304_group_10_project.php">
            <input type="hidden" id="groupByQueryRequest" name="groupByQueryRequest">
                SELECT platform, COUNT (*) <br /><br />
                FROM game <br /><br />
                GROUP BY platform <br /><br />
            <p><input type="submit" value="groupBy" name="groupByQuery"></p>
        </form>

        <hr />

        <h2>aggregation with having</h2>
        <p> shows the number of reservations per platform with at least 1 reservation.
        <form method="GET" action="cpsc_304_group_10_project.php">
            <input type="hidden" id="havingQueryRequest" name="havingQueryRequest">
                SELECT c.platform as platform, COUNT (*) AS numReservations <br /><br />
                FROM reserves r, has h, consoleSystem c <br /><br />
                WHERE r.seat# = h.seat# AND h.console# = c.console# <br /><br />
                GROUP BY c.platform <br /><br />
                HAVING COUNT (*) >= 1 <br /><br />
            <p><input type="submit" value="having" name="havingQuery"></p>
        </form>

        <hr />

        <h2>nested aggregation with group by</h2>
        <form method="GET" action="cpsc_304_group_10_project.php">
            <input type="hidden" id="nestedQueryRequest" name="nestedQueryRequest">
                SELECT platform, AVG(numReservations) as AvgPerDay <br /><br />
                FROM <br /><br />
                ( <br /><br />
                    SELECT c.platform, o.odate, COUNT (*) AS numReservations <br /><br />
                    FROM make_orders o, reserves r, has h, consoleSystem c <br /><br />
                    WHERE o.orderid = r.orderid AND r.seat# = h.seat# AND h.console# = c.console# <br /><br />
                    GROUP BY c.platform, o.odate <br /><br />
                ) <br /><br />
                GROUP BY temp.platform <br /><br />
            <p><input type="submit" value="nested" name="nestedQuery"></p>
        </form>

        <hr />

        <h2>division</h2>
        <form method="GET" action="cpsc_304_group_10_project.php">
            <input type="hidden" id="divisionQueryRequest" name="divisionQueryRequest">
                SELECT c.cid AS ID, c.cname AS SuperEater <br /><br />
                FROM customer c <br /><br />
                WHERE NOT EXISTS <br /><br />
                ( <br /><br />
                SELECT f.fname <br /><br />
                FROM food f <br /><br />
                WHERE NOT EXISTS <br /><br />
                ( <br /><br />
                SELECT o.orderid <br /><br />
                FROM make_orders o, food_order fo <br /><br />
                WHERE c.cid = o.cid AND o.orderid = fo.orderid AND f.fname = fo.fname )) <br /><br />
            <p><input type="submit" value="division" name="divisionQuery"></p>
        </form>

        <hr />

        <h2>count the tuples in customer</h2>
        <form method="GET" action="cpsc_304_group_10_project.php">
            <input type="hidden" id="countTupleRequest" name="countTupleRequest">
            <input type="submit" value="count" name="countTuples"></p>
        </form>

        <hr />

        <h2>display the tuples in customer</h2>
        <form method="GET" action="cpsc_304_group_10_project.php">
            <input type="hidden" id="displayCustomerRequest" name="displayCustomerRequest">
            <input type="submit" value="displayCustomer" name="displayCustomer"></p>
        </form>

        <hr />

        <h2>display the tuples in make_orders</h2>
        <form method="GET" action="cpsc_304_group_10_project.php">
            <input type="hidden" id="displayMakeOrdersRequest" name="displayMakeOrdersRequest">
            <input type="submit" value="displayMakeOrders" name="displayMakeOrders"></p>
        </form>

        <hr />

        <h2>display the tuples in reserves</h2>
        <form method="GET" action="cpsc_304_group_10_project.php">
            <input type="hidden" id="displayReservesRequest" name="displayReservesRequest">
            <input type="submit" value="displayReserves" name="displayReserves"></p>
        </form>

        <hr />

        <h2>display the tuples in food_order</h2>
        <form method="GET" action="cpsc_304_group_10_project.php">
            <input type="hidden" id="displayFoodOrderRequest" name="displayFoodOrderRequest">
            <input type="submit" value="displayFoodOrder" name="displayFoodOrder"></p>
        </form>

        <hr />

        <?php
		    //this tells the system that it's no longer just parsing html; it's now parsing PHP

        $success = True; //keep track of errors so it redirects the page only if there are no errors
        $db_conn = NULL; // edit the login credentials in connectToDB()
        $show_debug_alert_messages = False; // set to True if you want alerts to show you which methods are being triggered (see how it is used in debugAlertMessage())

        function debugAlertMessage($message) {
            global $show_debug_alert_messages;

            if ($show_debug_alert_messages) {
                echo "<script type='text/javascript'>alert('" . $message . "');</script>";
            }
        }

        function executePlainSQL($cmdstr) { //takes a plain (no bound variables) SQL command and executes it
            //echo "<br>running ".$cmdstr."<br>";
            global $db_conn, $success;

            $statement = OCIParse($db_conn, $cmdstr);
            //There are a set of comments at the end of the file that describe some of the OCI specific functions and how they work

            if (!$statement) {
                echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
                $e = OCI_Error($db_conn); // For OCIParse errors pass the connection handle
                echo htmlentities($e['message']);
                $success = False;
            }

            $r = OCIExecute($statement, OCI_DEFAULT);
            if (!$r) {
                echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
                $e = oci_error($statement); // For OCIExecute errors pass the statementhandle
                echo htmlentities($e['message']);
                $success = False;
            }

			return $statement;
		}

        function executeBoundSQL($cmdstr, $list) {
            /* Sometimes the same statement will be executed several times with different values for the variables involved in the query.
		In this case you don't need to create the statement several times. Bound variables cause a statement to only be
		parsed once and you can reuse the statement. This is also very useful in protecting against SQL injection.
		See the sample code below for how this function is used */

			global $db_conn, $success;
			$statement = OCIParse($db_conn, $cmdstr);

            if (!$statement) {
                echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
                $e = OCI_Error($db_conn);
                echo htmlentities($e['message']);
                $success = False;
            }

            foreach ($list as $tuple) {
                foreach ($tuple as $bind => $val) {
                    //echo $val;
                    //echo "<br>".$bind."<br>";
                    OCIBindByName($statement, $bind, $val);
                    unset ($val); //make sure you do not remove this. Otherwise $val will remain in an array object wrapper which will not be recognized by Oracle as a proper datatype
				}

                $r = OCIExecute($statement, OCI_DEFAULT);
                if (!$r) {
                    echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
                    $e = OCI_Error($statement); // For OCIExecute errors, pass the statementhandle
                    echo htmlentities($e['message']);
                    echo "<br>";
                    $success = False;
                }
            }
        }

        function connectToDB() {
            global $db_conn;

            // Your username is ora_(CWL_ID) and the password is a(student number). For example,
			      // ora_platypus is the username and a12345678 is the password.
            $db_conn = OCILogon("ora_ryanzhxu", "a51501690", "dbhost.students.cs.ubc.ca:1522/stu");

            if ($db_conn) {
                debugAlertMessage("Database is Connected");
                return true;
            } else {
                debugAlertMessage("Cannot connect to Database");
                $e = OCI_Error(); // For OCILogon errors pass no handle
                echo htmlentities($e['message']);
                return false;
            }
        }

        function disconnectFromDB() {
            global $db_conn;

            debugAlertMessage("Disconnect from Database");
            OCILogoff($db_conn);
        }

        function handleResetRequest() {
            global $db_conn;
            // Drop old table
            // executePlainSQL("DROP TABLE demoTable");

            // $db_conn = OCILogon("ora_ryanzhxu", "a51501690", "dbhost.students.cs.ubc.ca:1522/stu");

            // $query = file_get_contents("s.sql");

            // $stmt = $db_conn->prepare($query);

            // if ($stmt->execute())
            //     echo "Success";
            // else
            //     echo "Fail";

            // Create new table
            // echo "<br> creating new table <br>";
            // executePlainSQL("CREATE TABLE demoTable (id int PRIMARY KEY, name char(30))");
            OCICommit($db_conn);
        }

        function handleInsertRequest() {
            global $db_conn;

            $tuple = array (
                ":bind1" => $_POST['insCID'],
                ":bind2" => $_POST['insCNAME'],
                ":bind3" => $_POST['insAGE']
            );

            $alltuples = array (
                $tuple
            );

            executeBoundSQL("insert into customer (cid, cname, age) values (:bind1, :bind2, :bind3)", $alltuples);

            echo "a new customer has been added.";
            OCICommit($db_conn);
        }

        function handleReservesRequest() {
            global $db_conn;

            $tuple = array (
                ":bind1" => $_POST['insOID'],
                ":bind2" => $_POST['insOCID'],
                ":bind3" => $_POST['insMethod'],
                ":bind4" => $_POST['insSeat#'],
                ":bind5" => $_POST['insHrs'],
                ":bind6" => $_POST['insDate']
            );

            $alltuples = array (
              $tuple
            );

            $seatNum = $_POST['insSeat#'];
            $order_date = $_POST['insDate'];

            $query = executePlainSQL("select rate from seat where seat# = $seatNum");
            $row = OCI_Fetch_array($query, OCI_BOTH);
            $amount = $_POST['insHrs'] * $row[0];

            // insert a new order
            executeBoundSQL("insert into make_orders values (:bind1, :bind2, DATE '$order_date', $amount, ('$_POST[insMethod]'))", $alltuples);
            // reserve a seat
            executeBoundSQL("insert into reserves (orderid, seat#, hrs) values  (:bind1, :bind4, :bind5)", $alltuples);

            echo "a new order has been made and a seat has been reserved.";
            OCICommit($db_conn);
        }

        function handleFoodRequest() {
          global $db_conn;

          $tuple = array (
            ":bind1" => $_POST['insFoodName'],
            ":bind2" => $_POST['insFOID'],
            ":bind3" => $_POST['insQTY']
          );

          $alltuples = array (
            $tuple
          );

          $foodName  = $_POST['insFoodName'];
          $order_id  = $_POST['insFOID'];
          $order_qty = $_POST['insQTY'];

          // insert new food order
          executeBoundSQL("insert into food_order values (:bind1, :bind2, :bind3)", $alltuples);

          $query1 = executePlainSQL("select price from food where fname = ('$foodName')");
          $query2 = executePlainSQL("select amount from make_orders where orderid = $order_id");

          $food_price = OCI_Fetch_array($query1, OCI_BOTH);
          $old_amount = OCI_Fetch_array($query2, OCI_BOTH);

          $new_amount = $old_amount[0] + $order_qty * $food_price[0];

          // update customer's order
          executeBoundSQL("update make_orders set amount = $new_amount where orderid = $order_id", $alltuples);

          echo "a new food order has been made and customer's order has been updated.";
          OCICommit($db_conn);

        }

        function handleDeleteRequest() {
            global $db_conn;

            $tuple = array (
                ":bind1" => $_POST['delOrderID']
            );

            $alltuples = array (
                $tuple
            );

            executeBoundSQL("delete from make_orders where orderid = :bind1", $alltuples);
            echo "an order has been deleted.";
            OCICommit($db_conn);
        }

        function handleUpdateRequest() {
            global $db_conn;

            $tuple = array (
                ":bind1" => $_POST['updateAge'],
                ":bind2" => $_POST['updateCID']
            );

            $alltuples = array (
                $tuple
            );

            executeBoundSQL("update customer set age = (:bind1) where cid = (:bind2)", $alltuples);
            echo "a customer's age has been updated.";
            OCICommit($db_conn);

        }

        function handleCountRequest() {
            global $db_conn;

            $result = executePlainSQL("SELECT Count(*) FROM customer");

            if (($row = oci_fetch_row($result)) != false) {
                echo "<br> The number of tuples in customer: " . $row[0] . "<br>";
            }
        }

        function printCustomerResult($result) {
            echo "<br>Retrieved data from table customer:<br>";
            echo "<table><br>";
            echo "<tr><th>cid</th><th>cname</th><th>age</th></tr>";
            while ($row = OCI_Fetch_array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td></tr>"; //or just use "echo $row[0]"
            }
            echo "</table>";
        }

        function handleDisplayCustomerRequest() {
            global $db_conn;
            $result = executePlainSQL("SELECT * FROM customer");
            printCustomerResult($result);
        }

        function printSelectResult($result) {
            echo "<br>Retrieved data from table game:<br>";
            echo "<table>";
            echo "<tr><th>title</th><th>platform</th><th>publishDate</th></tr>";
            while ($row = OCI_Fetch_array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td></tr>"; //or just use "echo $row[0]"
            }
            echo "</table>";
        }

        function handleSelectRequest() {
            global $db_conn;

            $tuple = array (
                ":bind1" => $_GET['selPlatform']
            );

            $alltuples = array (
                $tuple
            );

            // $result = executeBoundSQL("select * from game where platform = ($_GET[selPlatform])", $alltuples);
            $result = executePlainSQL("select * from game where platform = ('$_GET[selPlatform]')");
            printSelectResult($result);
        }

        function printProjectResult($result) {
            echo "<br>Retrieved data from table make_orders, reserves, and customer:<br>";
            echo "<table>";
            echo "<tr><th>cid</th><th>name</th><th>orderid</th><th>date</th></tr>";
            while ($row = OCI_Fetch_array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td></tr>"; //or just use "echo $row[0]"
            }
            echo "</table>";
        }

        function handleProjectRequest() {
            global $db_conn;

            $tuple = array (
                ":bind1" => $_GET['projectCID']
            );

            $alltuples = array (
                $tuple
            );

            $project_cid = $_GET['projectCID'];

            $result = executePlainSQL("select o.cid, c.cname, o.orderid, o.odate from make_orders o, reserves r, customer c where c.cid = o.cid and o.orderid = r.orderid and o.cid = $_GET[projectCID]");
            printProjectResult($result);
        }

        // function printJoinResult($result) {
        //     echo "<br>Retrieved data from table customer, member:<br>";
        //     echo "<table>";
        //     echo "<tr><th>m.cid</th><th>m.mid</th><th>m.since</th><th>m.hours_spent</th><th>c.cid</th><th>c.cname</th><th>c.age</th></tr>";
        //     while ($row = OCI_Fetch_array($result, OCI_BOTH)) {
        //         echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td><td>" . $row[4] . "</td><td>" . $row[5] . "</td><td>" . $row[6] . "</td></tr>"; //or just use "echo $row[0]"
        //     }
        //     echo "</table>";
        // }
        //
        // function handleJoinRequest() {
        //     global $db_conn;
        //
        //     $tuple = array (
        //         ":bind1" => $_GET['joinAge']
        //     );
        //
        //     $alltuples = array (
        //         $tuple
        //     );
        //
        //     // $result = executeBoundSQL("select * from member m, customer c where m.cid = c.cid and c.age >= ('$_GET[joinAge]')", $alltuples);
        //     $result = executePlainSQL("select * from member m, customer c where m.cid = c.cid and c.age >= ('$_GET[joinAge]')");
        //     printJoinResult($result);
        // }

        function printGroupByResult($result) {
            echo "<br>Retrieved data from table game:<br>";
            echo "<table>";
            echo "<tr><th>platform</th><th>COUNT (*)</th></tr>";
            while ($row = OCI_Fetch_array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td></tr>"; //or just use "echo $row[0]"
            }
            echo "</table>";
        }

        function handleGroupByRequest() {
            global $db_conn;
            $result = executePlainSQL("select platform, count (*) from game group by platform");
            printGroupByResult($result);
        }

        function printHavingResult($result) {
            echo "<br>Retrieved data from table reserves, has, consoleSystem:<br>";
            echo "<table>";
            echo "<tr><th>c.platform</th><th>numReservations</th></tr>";
            while ($row = OCI_Fetch_array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td></tr>"; //or just use "echo $row[0]"
            }
            echo "</table>";
        }

        function handleHavingRequest() {
            global $db_conn;
            $result = executePlainSQL("select c.platform as platform, count (*) as numReservations from reserves r, has h, consoleSystem c where r.seat# = h.seat# and h.console# = c.console# group by c.platform having count (*) >= 1");
            printHavingResult($result);
        }

        function printNestedResult($result) {
            echo "<br>Retrieved data from table temp:<br>";
            echo "<table>";
            echo "<tr><th>platform</th><th>AvgPerDay</th></tr>";
            while ($row = OCI_Fetch_array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td></tr>"; //or just use "echo $row[0]"
            }
            echo "</table>";
        }

        function handleNestedRequest() {
            global $db_conn;
            $result = executePlainSQL("select platform, AVG(numReservations) as AvgPerDay from (select C.platform as platform, O.odate, Count (*) as numReservations from Make_Orders O, Reserves R, Has H, ConsoleSystem C where O.orderid = R.orderid and R.seat# = H.seat# and H.console# = C.console# group by C.platform, O.odate) group by platform");
            printNestedResult($result);
        }

        function printDivisionResult($result) {
            echo "<br>Retrieved data from table customer:<br>";
            echo "<table>";
            echo "<tr><th>ID</th><th>SuperEater</th></tr>";
            while ($row = OCI_Fetch_array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td></tr>"; //or just use "echo $row[0]"
            }
            echo "</table>";
        }

        function handleDivisionRequest() {
            global $db_conn;
            $result = executePlainSQL("select Cu.cid as ID, Cu.cname as SuperEater from Customer Cu where not exists (select F.fname from Food F where not exists (select O.orderid from Make_Orders O, Food_Order FO where Cu.cid = O.cid and O.orderid = FO.orderid and F.fname = FO.fname))");
            printDivisionResult($result);
        }

        function printMakeOrdersResult($result) {
            echo "<br>Retrieved data from table make_orders:<br>";
            echo "<table>";
            echo "<tr><th>order_id</th><th>cid</th><th>odate</th><th>amount</th><th>method</th></tr>";
            while ($row = OCI_Fetch_array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td><td>" . $row[4] ."</td></tr>"; //or just use "echo $row[0]"
            }
            echo "</table>";
        }

        function handlePrintMakeOrdersRequest() {
            global $db_conn;
            $result = executePlainSQL("select * from make_orders");
            printMakeOrdersResult($result);
        }

        function printReservesResult($result) {
            echo "<br>Retrieved data from table reserves:<br>";
            echo "<table>";
            echo "<tr><th>order_id</th><th>seat#</th><th>hours</th></tr>";
            while ($row = OCI_Fetch_array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td></tr>"; //or just use "echo $row[0]"
            }
            echo "</table>";
        }

        function handlePrintReservesRequest() {
            global $db_conn;
            $result = executePlainSQL("select * from reserves");
            printReservesResult($result);
        }

        function printFoodOrderResult($result) {
            echo "<br>Retrieved data from table food_order:<br>";
            echo "<table>";
            echo "<tr><th>food_name</th><th>order_id</th><th>qty</th></tr>";
            while ($row = OCI_Fetch_array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td></tr>"; //or just use "echo $row[0]"
            }
            echo "</table>";
        }

        function handlePrintFoodOrderRequest() {
            global $db_conn;
            $result = executePlainSQL("select * from food_order");
            printFoodOrderResult($result);
        }

    // HANDLE ALL POST ROUTES
	// A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
        function handlePOSTRequest() {
            if (connectToDB()) {
                if (array_key_exists('resetTablesRequest', $_POST)) {
                    handleResetRequest();
                } else if (array_key_exists('updateQueryRequest', $_POST)) {
                    handleUpdateRequest();
                } else if (array_key_exists('insertQueryRequest', $_POST)) {
                    handleInsertRequest();
                } else if (array_key_exists('deleteQueryRequest', $_POST)) {
                    handleDeleteRequest();
                } else if (array_key_exists('insertQuery2Request', $_POST)) {
                    handleReservesRequest();
                } else if (array_key_exists('insertQuery3Request', $_POST)) {
                    handleFoodRequest();
                }

                disconnectFromDB();
            }
        }

        // HANDLE ALL GET ROUTES
	    // A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
        function handleGETRequest() {
            if (connectToDB()) {
                if (array_key_exists('countTuples', $_GET)) {
                    handleCountRequest();
                } else if (array_key_exists('displayCustomer', $_GET)) {
                    handleDisplayCustomerRequest();
                } else if (array_key_exists('selectQuery', $_GET)) {
                    handleSelectRequest();
                } else if (array_key_exists('projectQuery', $_GET)) {
                    handleProjectRequest();
                } else if (array_key_exists('joinQuery', $_GET)) {
                    handleJoinRequest();
                } else if (array_key_exists('groupByQuery', $_GET)) {
                    handleGroupByRequest();
                } else if (array_key_exists('displayMakeOrders', $_GET)) {
                    handlePrintMakeOrdersRequest();
                } else if (array_key_exists('havingQuery', $_GET)) {
                    handleHavingRequest();
                } else if (array_key_exists('nestedQuery', $_GET)) {
                    handleNestedRequest();
                } else if (array_key_exists('divisionQuery', $_GET)) {
                    handleDivisionRequest();
                } else if (array_key_exists('displayReserves', $_GET)) {
                    handlePrintReservesRequest();
                } else if (array_key_exists('displayFoodOrder', $_GET)) {
                    handlePrintFoodOrderRequest();
                }

                disconnectFromDB();
            }
        }

		if (isset($_POST['reset']) || isset($_POST['updateSubmit'])
    || isset($_POST['insertSubmit']) || isset($_POST['deleteSubmit']) || isset($_POST['insertSubmit2']) || isset($_POST['insertSubmit3'])) {
            handlePOSTRequest();
        } else if (isset($_GET['countTupleRequest'])
                || isset($_GET['displayCustomerRequest'])
                || isset($_GET['selectQueryRequest'])
                || isset($_GET['projectQueryRequest'])
                || isset($_GET['joinQueryRequest'])
                || isset($_GET['groupByQueryRequest'])
                || isset($_GET['displayMakeOrders'])
                || isset($_GET['havingQueryRequest'])
                || isset($_GET['nestedQueryRequest'])
                || isset($_GET['divisionQueryRequest'])
                || isset($_GET['displayReserves'])
                || isset($_GET['displayFoodOrder'])) {
            handleGETRequest();
        }
		?>
	</body>
</html>
