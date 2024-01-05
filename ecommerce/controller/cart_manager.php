<?php
// For controlling data flow and functions of 'Cart', 'Checkout' and 'Purchase History' page
use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;
        
        require 'C:\Users\zung\Desktop\ecommerce-php-main\test\email\phpmailer\src\PHPMailer.php';
        require 'C:\Users\zung\Desktop\ecommerce-php-main\test\email\phpmailer\src\SMTP.php';
        require 'C:\Users\zung\Desktop\ecommerce-php-main\test\email\phpmailer\src\Exception.php';
        
// Creating class
class Cart
{
    // Class function to delete from cart.php and purchased.php
    public function del($conn, $paid, $msg)
    {$delp = $_POST['delp'];
        $del = $conn->query("DELETE FROM cart WHERE pid ='$delp' AND paid='$paid'");
        echo $msg;
    }

    // Class function to make payment in checkout.php
    public function confirm($conn)
    {
        $id = $_POST['id'];
        $holder_name = $_POST['pname'];
        $totalQuery = $conn->query("SELECT total FROM checkout WHERE uid = '$id'");
    $totalRow = mysqli_fetch_assoc($totalQuery);
    $total = $totalRow['total'];
        
        $mail = new PHPMailer(true); // true enables exceptions
        
        try {
            $mail->isSMTP(); // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = 'dungbt.22itb@vku.udn.vn'; // SMTP username
            $mail->Password = 'Ti880716.'; // SMTP password
            $mail->SMTPSecure = 'tls'; // Enable TLS encryption, 'ssl' also accepted
            $mail->Port = 587; // TCP port to connect to
        
            $mail->setFrom('skiyrt2001@example.com', 'bui dksm');
            $mail->addAddress('trumeakao2001@gmail.com', 'Recipient Name');
        
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'Subject of your email';
            $mail->Body = 'Here is the total : '. $total;
        
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        




        $paid = 1;
        
            $payment = $conn->query("UPDATE cart SET paid='$paid' WHERE uid='$id'");
            if (!$payment) {
                echo "<script>alert('Due to an unexpected error you were unable to make the payment')</script>";
            } else {
                echo "<script>alert('Payment successfully');window.location.href='purchased.php';</script>";
            }
        
    }
    public function amount($conn)
    {echo "running function ";
        $total = $_POST['total'];
        $sub_total = $_POST['sub_total'];
        $ship = $_POST['ship'];
        $uname = $_SESSION['customer'];
        $uid = $conn->query("SELECT id FROM customer WHERE user_name = '$uname'");
        $checkout = $conn->query("INSERT INTO checkout(uid,shipping,sub_total,total) VALUES ('$uid','$ship','$sub_total','$total')");
        // $checkout = $conn->query("INSERT INTO customer(user_name,full_name,phone,email,pass) VALUES ('$uname','$fname','$phno','$email','$pass')");
        echo "added to checkout $ship, $sub_total, $total ";

    }
}

// Getting user session data
$uname = $_SESSION['customer'];
$query = "SELECT * FROM customer WHERE user_name = '$uname'";
$query_id = "SELECT id FROM customer WHERE user_name = '$uname'";
$query_run = mysqli_query($conn, $query);
$query_run_id = mysqli_query($conn, $query_id);

// Creating object
$cart = new Cart($conn);

// Remove item in cart.php
if (isset($_POST['remove'])) {
    $paid = 0;
    $msg = "<script>alert('Item deleted successfully');window.location.href='cart.php';</script>";
    $cart->del($conn, $paid, $msg);
}

// Remove purchase record in purchased.php
if (isset($_POST['delete'])) {
    $paid = 1;
    $msg = "<script>alert('Record deleted successfully');</script>";
    $cart->del($conn, $paid, $msg);
}

// Transfering data from cart.php to checkout.php
    if (isset($_POST['checkout'])) {
        while ($row = mysqli_fetch_array($query_run_id)) {
            $uid = $row['id'];
            $total = $_POST['total'];
            $sub_total = $_POST['sub_total'];
            $ship = $_POST['ship'];

            $check = $conn->query("SELECT * FROM checkout WHERE uid='$uid' AND paid='0'");
            if ($check->num_rows == 0) {
                $checkout = $conn->query("INSERT INTO checkout(uid,shipping,sub_total,total) VALUES ('$uid','$ship','$sub_total','$total')");
            }

            // $cart->amount($conn);
        }
    }

// Completing Payment in checkout.php
if (isset($_POST['confirm'])) {
    $cart->confirm($conn);
}
