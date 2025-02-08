<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .email-container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border: 1px solid #e1e4e8;
            border-radius: 8px;
            overflow: hidden;
        }
        .email-header {
            background-color: #007bff;
            padding: 15px;
            text-align: center;
            color: #ffffff;
        }
        .email-header img {
            max-width: 150px;
            margin-bottom: 10px;
        }
        .email-header .links {
            margin-top: 10px;
        }
        .email-header .links a {
            color: #ffffff;
            text-decoration: none;
            margin: 0 10px;
            font-size: 14px;
        }
        .email-body {
            padding: 20px;
            color: #333333;
        }
        .email-body h2 {
            font-size: 20px;
            margin-bottom: 10px;
        }
        .email-body p {
            line-height: 1.6;
            margin-bottom: 15px;
        }
        .order-details {
            margin-top: 20px;
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        .order-details table {
            width: 100%;
            border-collapse: collapse;
        }
        .order-details th, .order-details td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .order-details th {
            background-color: #f0f0f0;
        }
        .order-details img {
            max-width: 50px;
            height: auto;
            border-radius: 4px;
        }
        .email-footer {
            text-align: center;
            padding: 15px;
            background-color: #f1f1f1;
        }
        .email-footer p {
            margin: 0;
            font-size: 14px;
            color: #666666;
        }
        .email-footer a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header Section -->
        <div class="email-header">
            <img src="{{logo_url}}" alt="Company Logo">
            <div class="links">
                <a href="{{your_orders_url}}">Your Orders</a> |
                <a href="{{my_account_url}}">My Account</a> |
                <a href="{{website_url}}">Visit Website</a>
            </div>
        </div>

        <!-- Email Body -->
        <div class="email-body">
            <h2>Hi, {{customer_name}}</h2>
            <p>Thank you for shopping with us! Your order has been confirmed, and here are the details:</p>
            <div class="order-details">
                <table>
                    <tr>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                    {{order_items}}
                </table>
                <p><strong>Total Amount:</strong> ₹{{total_amount}}</p>
                <p><strong>Delivery Address:</strong> {{address}}</p>
            </div>
        </div>

        <!-- Footer Section -->
        <div class="email-footer">
            <p>Thank you for choosing our service!</p>
            <p>&copy; 2025 <a href="https:\\www.blurfashion.in">Blur Fashion</a></p>
        </div>
    </div>
</body>
</html>
