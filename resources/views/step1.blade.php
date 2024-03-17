<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Step 1 - Meal Category and Number of People Selection</title>
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

form {
  background: #ffffff;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  margin-bottom: 10px;
}

label {
  display: block;
  margin-bottom: 5px;
}

select ,input{
  width: 100%;
  padding: 8px;
  margin-bottom: 20px;
  border-radius: 4px;
  border: 1px solid #ccc;
}

button {
  background-color: #5cb85c;
  color: white;
  padding: 10px 15px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  background-color: #4cae4c;
}

/* Style for the 'Previous' button */
button[type="submit"] {
  background-color: #f0ad4e;
  margin-right: 5px;
}

button[type="submit"]:hover {
  background-color: #ec971f;
}

    </style>
</head>

<body>
    <h1>Step 1</h1>
    <form action="{{route('step1')}}" method="post">
        @csrf
        <div>
            <label for="meal_category">Meal Category:</label>
            @if (Session::has('meal_category'))


            @endif
            <select name="meal_category" id="meal_category" required>
                <option value="breakfast">Breakfast</option>
                <option value="lunch">Lunch</option>
                <option value="dinner">Dinner</option>
            </select>
        </div>
        <div>
            <label for="num_people">Number of People:</label>
            @if (Session::has('num_people'))
            <input type="number" name="num_people" id="num_people" min="1" max="10"
                value="{{Session::get('num_people')}}" required>
            @else
            <input type="number" name="num_people" id="num_people" min="1" max="10" value="1" required>
            @endif


        </div>
        <button type="submit">Next</button>
    </form>
</body>

</html>