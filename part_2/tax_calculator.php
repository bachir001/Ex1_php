<?php

if (isset($_POST['submit'])) {

    $salary = $_POST['salary'];
    $nonTax = $_POST['non-tax'];
    $timeFrame = $_POST['timeFrame'];

//echo "salary: ".$salary;
    //echo "nonTax :".$nonTax;
    //echo "tameFrame : ".$timeFrame;

    if ($timeFrame == "monthly") {
        $salaryPerYear = $salary * 12;
        $salaryPerMonth = $salary;
        $nonTaxYearly = $nonTax * 12;
        $nonTaxMonthly = $nonTax;
    } else if ($timeFrame == "yearly") {
        $salaryPerMonth = $salary / 12;
        $salaryPerYear = $salary;
        $nonTaxMonthly = $nonTax / 12;
        $nonTaxYearly = $nonTax;
    }
    if ($salaryPerYear > 0 && $salaryPerYear < 10000) {
        $tax = 0;
        $taxMonthly = 0;
        $ssf = 0;
        $ssfMonthly = 0;
        $salaryAfterTaxMonthly = $salaryPerMonth + $nonTaxMonthly;
        $salaryAfterTaxYearly = $salaryPerYear + $nonTaxYearly;

    } else if ($salaryPerYear >= 10000 && $salaryPerYear < 25000) {
        $tax = $salaryPerYear * (11 / 100);
        $taxMonthly = $tax / 12;

        $ssf = $salaryPerYear * (4 / 100);
        $ssfMonthly = $ssf / 12;

        $salaryAfterTaxMonthly = $salaryPerMonth - $taxMonthly - $ssfMonthly + $nonTaxMonthly;
        $salaryAfterTaxYearly = $salaryPerYear - $tax - $ssf + $nonTaxYearly;
    } else if ($salaryPerYear >= 25000 && $salaryPerYear < 50000) {
        $tax = $salaryPerYear * (30 / 100);
        $taxMonthly = $tax / 12;

        $ssf = $salaryPerYear * (4 / 100);
        $ssfMonthly = $ssf / 12;

        $salaryAfterTaxMonthly = $salaryPerMonth - $taxMonthly - $ssfMonthly + $nonTaxMonthly;
        $salaryAfterTaxYearly = $salaryPerYear - $tax - $ssf + $nonTaxYearly;
    } else if ($salaryPerYear >= 50000) {
        $tax = $salaryPerYear * (45 / 100);
        $taxMonthly = $tax / 12;

        $ssf = $salaryPerYear * (4 / 100);
        $ssfMonthly = $ssf / 12;

        $salaryAfterTaxMonthly = $salaryPerMonth - $taxMonthly - $ssfMonthly + $nonTaxMonthly;
        $salaryAfterTaxYearly = $salaryPerYear - $tax - $ssf + $nonTaxYearly;
    }
} else {
    echo "<p>"." Enter Your Info Below : "."</p>";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/calculator.css">
    <title>Document</title>
    <style>

 html, body{
text-align:center;
} 
table, th, td {
    border: 1px solid black;
    padding:5px;}
    .calc{
      margin-left:500px;
    }
    .run {
	box-shadow: 0px 10px 14px -7px #3e7327;
	background:linear-gradient(to bottom, #77b55a 5%, #72b352 100%);
	background-color:#77b55a;
	border-radius:4px;
	border:1px solid #4b8f29;
  display: inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:13px;
	font-weight:bold;
	padding:6px 12px;
	text-decoration:none;
	text-shadow:0px 1px 0px #5b8a3c;
  margin-top:1rem;
  
}
.run:hover {
	background:linear-gradient(to bottom, #72b352 5%, #77b55a 100%);
	background-color:#72b352;
}
.run:active {
	position:relative;
  top:1px;}

  .blueTable{
    color:black;
    font-weight:5;
    margin-left: auto;
    margin-right: auto;
    margin-top: 1rem;
    width: 22%; 

  }



</style>
</head>
<body>
<section class='clac'>

  <div>
    <div>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type='number'  name="salary" placeholder='Salary in USD' value=<?php
if (isset($_POST['submit'])) {
    echo $salary;
}
?> required>
     <input type="number" id="tax" name="non-tax" placeholder="Tax Free in USD" value=<?php
if (isset($_POST['submit'])) {
    echo $nonTax;
}
?> required>
    </div>

    <div>
      <label>
     <input type="radio" name="timeFrame" value="yearly"
     <?php if (isset($_POST['submit'])) {
    if ($_POST['timeFrame'] == "yearly") {
        echo "checked";
    }
}

?> required> Yearly
    </label>

     <label>
       <input type="radio" name="timeFrame" value="monthly"
       <?php if (isset($_POST['submit'])) {
    if ($_POST['timeFrame'] == "monthly") {
        echo "checked";
    }
}

?> required> Monthly
      </label>
    </div>

    <div>
     <input type="submit" name="submit" value="Run" class='Run'>
   
    
      <input type='submit' name='clear' value='Clear' class='Run'>
    </div>
     <div>
       </div>
      </form>


      <div>
        <table class="blueTable">
          <tr>
            <th style="color:red"><?php
if (isset($_POST['clear'])) {
    echo " CLEARED!!! ";}

if (isset($_POST['submit'])) {
    echo " DONE!!! ";}?> </th>
     <th>Monthly</th>
     <th>Yearly</th>
    </tr>
    <tr>
      <td>Total Salary</td>
      <td> <?php echo $salaryPerMonth ?></td>
     <td> <?php echo $salaryPerYear ?></td>
     </tr>
     <tr>
       <td>Tax Amount</td>
       <td> <?php echo $taxMonthly ?></td>
       <td> <?php echo $tax ?></td>
      </tr>
      <tr>
        <td>Social Security Fee </td>
        <td><?php echo $ssfMonthly ?></td>
        <td><?php echo $ssf ?></td>
      </tr>
      <tr>
        <td>Salary After Tax</td>
        <td><?php echo $salaryAfterTaxMonthly ?></td>
     <td> <?php echo $salaryAfterTaxYearly ?></td>
    </tr>
  </section>

  </table>
</div>
</body>
</html>