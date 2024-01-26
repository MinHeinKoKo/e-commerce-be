<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        p {
            color: #666;
        }

        .approval-status {
            margin-top: 20px;
            padding: 10px;
            text-align: center;
            border-radius: 5px;
        }

        .approved {
            background-color: #4CAF50;
            color: #fff;
        }

        .denied {
            background-color: #f44336;
            color: #fff;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Order Confirmation</h2>
    <p>Dear {{ $user->name }},</p>
    <p>Your order has been {{ $order->process }} by the admin of our website. Here are the details:</p>

    <!-- Order details can be added here -->
    @if($order->process == "Approved")
    <div class="approval-status approved">
        <p>Your order has been <strong>approved</strong>! Thank you for shopping with us.</p>
    </div>

    @else
    <!-- OR -->

    <div class="approval-status denied">
        <p>Unfortunately, your order has been <strong>denied</strong> by the admin. If you have any questions, please contact our support.</p>
    </div>
    @endif

    <p>Thank you for choosing our e-commerce website. If you have any questions or concerns, feel free to contact us.</p>
</div>

</body>
</html>
