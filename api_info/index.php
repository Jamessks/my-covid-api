<?php
include 'bootstrap.php';

    $test = new APIcalls();
    $results = $test->showResults();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="A simple web page giving information on COVID19 stats per country">
    <title>Home</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<?php if ($results != null): ?>
<div class="form-container">
    <form autocomplete="off" action="">
        <div class="autocomplete" style="width:300px;">
            <input id="myInput" type="text" name="country" placeholder="Country">
        </div>
        <input type="submit">
    </form>
    </div>
<div class="container">
     <div id="data-container">
    <h1>Country:</h1><img src="<?= $results['countryInfo']['flag']; ?>" alt="Image not found">
    <h1>Total Population: <?= $results['population'] ?></h1>
    <h1>Cases recorded today: <?= $results['todayCases'] ?></h1>
    <h1>Total Cases recorded until today: <?= $results['cases'] ?></h1>
    <h1>Total Deaths in this country: <?= $results['deaths'] ?></h1>
    <h1>Today's deaths: <?= $results['todayDeaths'] ?></h1>
</div>
</div>
<?php else: ?>
     <div class="form-container">
         <form autocomplete="off" action="">
             <div class="autocomplete" style="width:300px;">
                 <input id="myInput" type="text" name="country" placeholder="Country">
             </div>
             <input type="submit">
         </form>
         </div>
         <h1>Country was not found!</h1>
<?php endif ?>

<footer id="footer">Data acquired from: <a href="https://github.com/NovelCOVID/API">NovelCOVID API</a>
         <script type="text/javascript" src="js/main.js"></script>
    <script>
        autocomplete(document.getElementById("myInput"), countries);
    </script>
</footer>
</body>
</html>
