<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Button</title>

    <link rel="stylesheet" href="/css/button_order.scss.css">
</head>
<body>
    <button class="truck-button">
        <span class="default">Complete Order</span>
        <span class="success">
            Order Placed
            <svg viewbox="0 0 12 10">
                <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
            </svg>
        </span>
        <div class="truck">
            <div class="wheel"></div>
            <div class="back"></div>
            <div class="front"></div>
            <div class="box"></div>
        </div>
    </button>

    <script type="text/javascript" src="/js/button_order.js"></script>
</body>
</html>