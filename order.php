<?php
    require "header.php";
?>
<body>
    <h1>Online Order</h1>
    <form action="includes/order.inc.php" method="post">
        <label>Name:</label>
        <input type="text" name="cname" placeholder="Name">
        <label>Phone Number:</label>
        <input type="text" name="cphone" placeholder="Phone">

        <div class="item1">
            <input type="checkbox" id="cheese" name="cheese" value="Cheese">
            <label for="cheese">Cheeseburger $1.59</label>

            <label for="cquantity">Quantity (between 1 and 10) </label>
            <input type="number" id="cquantity" name="cquantity" min="1" max="10" value="1">
        </div>
        <div class="item2">
            <input type="checkbox" id="ham" name="ham" value="Ham">
            <label for="ham">Hamburger $1.29</label>

            <label for="hquantity">Quantity (between 1 and 10) </label>
            <input type="number" id="hquantity" name="hquantity" min="1" max="10" value="1">
        </div>
        <div class="item3">
            <input type="checkbox" id="veggie" name="veggie" value="Veggie">
            <label for="veggie">Veggie Burger $1.00</label>

            <label for="vquantity">Quantity (between 1 and 10) </label>
            <input type="number" id="vquantity" name="vquantity" min="1" max="10" value="1">
        </div>

        <button type="submit" name="order_submit">Submit</button>

    </form>
</body>
<?php
    require "footer.php";
?>