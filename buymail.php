<?php
    $id = $_POST['buy_id'];
    $name = $_POST['contact_name'];
    $email = $_POST['contact_mail'];
    $phone = $_POST['contact_phone'];
    $msg = $_POST['contact_msg'];
    $link = mysqli_connect("flatshuntdb.cwhxcsv9iwaa.us-east-2.rds.amazonaws.com","admin","admin123","Flatshunt");
    $query = mysqli_query($link,"SELECT Email_Id,Name from sale_table where ID = '$id'");
    while($row = mysqli_fetch_array($query)){
        $to = $row['Email_Id'];
        $body = "<html>
                    <head>
                        <style>
                        table{
                            border-collapse: collapse;
                            border-spacing: 0;
                        }
                        td,th {
                            padding: 0;
                        }
                        table, th, td {
                          border: none;
                        }

                        table {
                          width: 100%;
                          display: table;
                        }

                        table.bordered > thead > tr,
                        table.bordered > tbody > tr {
                          border-bottom: 1px solid #d0d0d0;
                        }

                        table.striped > tbody > tr:nth-child(odd) {
                          background-color: #f2f2f2;
                        }

                        table.striped > tbody > tr > td {
                          border-radius: 0;
                        }
                        thead {
                          border-bottom: 1px solid #d0d0d0;
                        }

                        td, th {
                          padding: 15px 5px;
                          display: table-cell;
                          text-align: left;
                          vertical-align: middle;
                          border-radius: 2px;
                        }
                        </style>
                    </head>
                    <body>
                        <p>Hello ".$row['Name'].",</p>
                        <p>You've Got an Inquiry The details for the same are below:-</p>
                        <p>
                            <table class='responsive-table striped'>
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email ID</th>
                                        <th>Contact No.</th>
                                        <th>Message</th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td>".$name."</td>
                                    <td>".$email."</td>
                                    <td>".$phone."</td>
                                    <td>".$msg."</td>
                                </tr>
                            </table>
                        </p>
                        <p>Your Regards,</p>
                        <p>Romil Shah(CEO of Flatshunt)</p>
                    </body>
                </html>";
    }
    $from = 'Admin of Flatshunt<admin@flatshunt.com>';
    $subject = "You've Got an Inquiry!";
    $crlf = "\n";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: ' . $from . "\r\n";

    if (!mail($to, $subject, $body, $headers)) {
        echo('<p>Unable to send mail</p>');
    } else {
        echo("<div class='card-panel teal lighten-2'><p class='white-text center'>Message successfully sent!</p></div>");
    }
?>