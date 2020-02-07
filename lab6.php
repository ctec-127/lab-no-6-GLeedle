<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Lab No. 6 - Temp. Converter</title>
</head>

<body>

    <?php
    // to make sure the variables are declared right away to avoid error on stick select form
    // if origionalunit is not set
    $originalUnit = ""; // set $origionalUnit to empty string

    // if conversionunit is not set
    $conversionUnit = ""; // set $conversionUnit to empy string

    // if $convertedTemp is empty
    $convertedTemp = ""; // set $convertedTemp to empty string

    // function to calculate converted temperature
    function convertTemp($temp, $unit1, $unit2)
    {
        // conversion formulas
        // Celsius to Fahrenheit = T(°C) × 9/5 + 32
        if ($unit1 == "celsius" && $unit2 == "fahrenheit") {
            $temp = $temp * 9 / 5 + 32;

            // Celsius to Kelvin = T(°C) + 273.15
        } elseif ($unit1 == "celsius" && $unit2 == "kelvin") {
            $temp = $temp + 273.15;

            // Fahrenheit to Celsius = (T(°F) - 32) × 5/9
        } elseif ($unit1 == "fahrenheit" && $unit2 == "celsius") {
            $temp = ($temp - 32) * 5 / 9;

            // Fahrenheit to Kelvin = (T(°F) + 459.67)× 5/9
        } elseif ($unit1 == "fahrenheit" && $unit2 == "kelvin") {
            $temp = ($temp + 459.67) * 5 / 9;

            // Kelvin to Fahrenheit = T(K) × 9/5 - 459.67
        } elseif ($unit1 == "kelvin" && $unit2 == "fahrenheit") {
            $temp = $temp * 9 / 5 - 459.67;
            // Kelvin to Celsius = T(K) - 273.15
        } elseif ($unit1 == "kelvin" && $unit2 == "celsius") {
            $temp = $temp - 273.15;
        }
        // You need to develop the logic to convert the temperature based on the selections and input made
        return $temp;
    } // end function

    // Logic to check for POST and grab data from $_POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Store the original temp and units in variables
        // You can then use these variables to help you make the form sticky
        // then call the convertTemp() function
        // Once you have the converted temperature you can place PHP within the converttemp field using PHP
        // I coded the sticky code for the originaltemp field for you
        $originalTemperature = $_POST['originaltemp'];
        $originalUnit = $_POST['originalunit'];
        $conversionUnit = $_POST['conversionunit'];
        $convertedTemp = convertTemp($originalTemperature, $originalUnit, $conversionUnit);
    } // end if

    ?>
    <!-- Form starts here -->
    <h1>Temperature Converter</h1>
    <h4>CTEC 127 - PHP with SQL 1</h4>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <div class="group">
            <label for="temp">Temperature</label>
            <input type="text" value="<?php if (isset($_POST['originaltemp'])) {
                                            echo $_POST['originaltemp'];
                                        }
                                        ?>" name="originaltemp" size="14" maxlength="7" id="temp">

            <select name="originalunit">
                <option value="--Select--" <?php if ($originalUnit == "--Select--") echo ' selected="selected"'; ?>>--Select--</option>
                <option value="celsius" <?php if ($originalUnit == "celsius") echo ' selected="celsius"'; ?>>Celsius</option>
                <option value="fahrenheit" <?php if ($originalUnit == "fahrenheit") echo ' selected="fahrenheit"'; ?>>Fahrenheit</option>
                <option value="kelvin" <?php if ($originalUnit == "kelvin") echo ' selected="kelvin"'; ?>>Kelvin</option>
            </select>
        </div>

        <div class="group">
            <label for="convertedtemp">Converted Temperature</label>
            <input type="text" value="<?php echo round($convertedTemp); ?>" name="convertedtemp" size="14" maxlength="7" id="convertedtemp" readonly>

            <select name="conversionunit">
                <option value="--Select--" <?php if ($conversionUnit == "--Select--") echo ' selected="selected"'; ?>>--Select--</option>
                <option value="celsius" <?php if ($conversionUnit == "celsius") echo ' selected="celsius"'; ?>>Celsius</option>
                <option value="fahrenheit" <?php if ($conversionUnit == "fahrenheit") echo ' selected="fahrenheit"'; ?>>Fahrenheit</option>
                <option value="kelvin" <?php if ($conversionUnit == "kelvin") echo ' selected="kelvin"'; ?>>Kelvin</option>
            </select>
        </div>
        <input type="submit" value="Convert" />
        <p><a href="lab6.php">Click here to reload page</a></p>
    </form>
</body>

</html>