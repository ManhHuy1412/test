<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review - Review and Submit</title>
    <style>
        body {
  font-family: 'Arial', sans-serif;
  background-color: #f4f4f4;
  color: #333;
  line-height: 1.6;
  padding: 20px;
}

h1 {
  color: #444444;
  margin-bottom: 20px;
}

p {
  background: #ffffff;
  padding: 10px;
  border-radius: 5px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  margin-bottom: 10px;
}

/* Responsive design */
@media (max-width: 600px) {
  body {
    padding: 10px;
  }

  p {
    padding: 8px;
  }
}

    </style>
</head>
<body>
    <h1>Review Your Order</h1>
    <p>Meal Category: {{$meal_category }}</p>
    <p>Number of People: {{$num_people }}</p>
    <p>Restaurant  {{$restaurant }}</p>
    <!-- Add code to display selected dishes -->
   @foreach ($result as $result)
   <p>{{$result['name']}}: {{$result['num']}}</p>
   @endforeach

</body>
</html>
