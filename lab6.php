<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Lab No. 6 - Temp. Converter</title>
</head>

<body>
    <main>
        <?php
        $originalUnit = ""; // set $origionalUnit to empty string
        $conversionUnit = ""; // set $conversionUnit to empy string
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
        <div class="h3">
            <h1 class="display-3">Temperature Converter</h1>
            CTEC 127 - PHP with SQL 1
        </div>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
            <div class="group">
                <label for="temp">Temperature From:</label>
                <input type="text" class="form-control" value="<?php if (isset($_POST['originaltemp'])) {
                                                                    echo $_POST['originaltemp'];
                                                                }
                                                                ?>" name="originaltemp" size="14" maxlength="7" id="temp">

                <select class="form-control" name="originalunit">
                    <option value="--Select--" <?php if (isset($originalUnit) && ($originalUnit == "--Select--")) echo ' selected="selected"'; ?>>--Select Temperature Range--</option>
                    <option value="celsius" <?php if (isset($originalUnit) && ($originalUnit == "celsius")) echo ' selected="celsius"'; ?>>Celsius</option>
                    <option value="fahrenheit" <?php if (isset($originalUnit) && ($originalUnit == "fahrenheit")) echo ' selected="fahrenheit"'; ?>>Fahrenheit</option>
                    <option value="kelvin" <?php if (isset($originalUnit) && ($originalUnit == "kelvin")) echo ' selected="kelvin"'; ?>>Kelvin</option>
                </select>
            </div>
            <label for="conversiontemp">Temperature to:</label>
            <select class="form-control" name="conversionunit" id="conversiontemp">
                <option value="--Select--" <?php if (isset($conversionUnit) && ($conversionUnit == "--Select--")) echo ' selected="selected"'; ?>>--Select New Temperature Range --</option>
                <option value="celsius" <?php if (isset($conversionUnit) && ($conversionUnit == "celsius")) echo ' selected="celsius"'; ?>>Celsius</option>
                <option value="fahrenheit" <?php if (isset($conversionUnit) && ($conversionUnit == "fahrenheit")) echo ' selected="fahrenheit"'; ?>>Fahrenheit</option>
                <option value="kelvin" <?php if (isset($conversionUnit) && ($conversionUnit == "kelvin")) echo ' selected="kelvin"'; ?>>Kelvin</option>
            </select>
            <div class="group">
                <label for="convertedtemp">Converted Temperature</label>
                <input type="text" class="form-control" value="<?php echo round($convertedTemp); ?>" name="convertedtemp" size="14" maxlength="7" id="convertedtemp" readonly>

            </div>
            <input type="submit" class="btn btn-primary" value="Convert" />
            <a href="lab6.php">Click here to reload page</a>
        </form>
    </main>
</body>

</html>