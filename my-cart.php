<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('includes/config.php');

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Retrieve user details
$userId = $_SESSION['user_id'];
$sql = "SELECT name, billingAddress, shippingAddress FROM users WHERE id = :userId";
$query = $pdo->prepare($sql);
$query->bindParam(':userId', $userId, PDO::PARAM_INT);
$query->execute();
$user = $query->fetch(PDO::FETCH_ASSOC);

// Initialize cart if not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Process cart actions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['update_cart'])) {
        // Update quantities and remove items
        foreach ($_POST['quantity'] as $pid => $quantity) {
            if (isset($_POST['remove_code']) && in_array($pid, $_POST['remove_code'])) {
                unset($_SESSION['cart'][$pid]); // Remove item from cart
            } else {
                $_SESSION['cart'][$pid]['quantity'] = intval($quantity); // Update quantity
            }
        }
    }

    if (isset($_POST['checkout'])) {
        header('Location: login.php');
        exit;
    }
}

// Retrieve cart items
$cartItems = array();
if (!empty($_SESSION['cart'])) {
    $ids = implode(',', array_keys($_SESSION['cart']));
    $sql = "SELECT pid, paintingTitle, paintingPrice, paintingImage FROM paintings WHERE pid IN ($ids)";
    $stmt = $pdo->query($sql);
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $row['quantity'] = $_SESSION['cart'][$row['pid']]['quantity'];
        $cartItems[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">
    <title>My Cart</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/green.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/owl.transitions.css">
    <link href="assets/css/lightbox.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/rateit.css">
    <link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.js"></script>
        <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>
<body class="cnt-home">

<header class="header-style-1">
    <?php include('includes/top-header.php');?>
    <?php include('includes/main-header.php');?>
    <?php include('includes/menu-bar.php');?>
</header>

<div class="body-content outer-top-xs">
    <div class="container">
        <div class="row inner-bottom-sm">
            <div class="shopping-cart">
                <div class="col-md-12 col-sm-12 shopping-cart-table">
                    <div class="table-responsive">
                        <form name="cart" method="post">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="cart-romove item">Remove</th>
                                        <th class="cart-description item">Image</th>
                                        <th class="cart-product-name item">Painting Title</th>
                                        <th class="cart-qty item">Quantity</th>
                                        <th class="cart-sub-total item">Price Per Unit</th>
                                        <th class="cart-sub-total item">Shipping Charge</th>
                                        <th class="cart-total last-item">Grand Total</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <td colspan="7">
                                            <div class="shopping-cart-btn">
                                                <span class="">
                                                    <a href="index.php" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
                                                    <input type="submit" name="update_cart" value="Update Shopping Cart" class="btn btn-upper btn-primary pull-right outer-right-xs">
                                                    <input type="submit" name="checkout" value="Proceed to Checkout" class="btn btn-upper btn-primary pull-right">
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php if ($cartItems): ?>
                                        <?php foreach ($cartItems as $item): ?>
                                            <tr>
                                                <td class="romove-item">
                                                    <input type="checkbox" name="remove_code[]" value="<?php echo $item['pid']; ?>" />
                                                </td>
                                                <td class="cart-image">
                                                    <img src="admin/paintingImages/<?php echo htmlentities($item['paintingImage']); ?>" alt="" width="114" height="146">
                                                </td>
                                                <td class="cart-product-name-info">
                                                    <h4 class='cart-product-description'>
                                                        <?php echo htmlentities($item['paintingTitle']); ?>
                                                    </h4>
                                                </td>
                                                <td class="cart-product-quantity">
                                                    <div class="quant-input">
                                                        <div class="arrows">
                                                            <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
                                                            <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
                                                        </div>
                                                        <input type="text" value="<?php echo intval($item['quantity']); ?>" name="quantity[<?php echo $item['pid']; ?>]">
                                                    </div>
                                                </td>
                                                <td class="cart-product-sub-total">
                                                    <span class="cart-sub-total-price">
                                                        $<?php echo number_format($item['paintingPrice'], 2); ?>
                                                    </span>
                                                </td>
                                                <td class="cart-product-sub-total">
                                                    <span class="cart-sub-total-price">
                                                        $0.00 <!-- Assuming no shipping charge for simplicity -->
                                                    </span>
                                                </td>
                                                <td class="cart-product-grand-total">
                                                    <span class="cart-grand-total-price">
                                                        $<?php echo number_format($item['quantity'] * $item['paintingPrice'], 2); ?>
                                                    </span>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="7">
                                                <h4>No items in the cart.</h4>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
                <!-- Display User Info -->
                <div class="col-md-12">
                    <h3>User Information</h3>
                    <p><strong>Full Name:</strong> <?php echo htmlentities($user['name']); ?></p>
                    <p><strong>Billing Address:</strong> <?php echo htmlentities($user['billingAddress']); ?></p>
                    <p><strong>Shipping Address:</strong> <?php echo htmlentities($user['shippingAddress']); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php');?>

<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/echo.min.js"></script>
<script src="assets/js/jquery.easing-1.3.min.js"></script>
<script src="assets/js/bootstrap-slider.min.js"></script>
<script src="assets/js/jquery.rateit.min.js"></script>
<script type="text/javascript" src="assets/js/lightbox.min.js"></script>
<script src="assets/js/bootstrap-select.min.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/scripts.js"></script>
<script src="switchstylesheet/switchstylesheet.js"></script>
<script>
    $(document).ready(function(){ 
        $(".changecolor").switchstylesheet({ seperator: "color" });
        $('.show-theme-options').click(function(){
            $(this).parent().toggleClass('open');
            return false;
        });
    });

    $(window).bind("load", function() {
       $('.show-theme-options').delay(2000).trigger('click');
    });
</script>

</body>
</html>