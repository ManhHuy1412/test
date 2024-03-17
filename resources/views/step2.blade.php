<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Step 2 - Restaurant Selection</title>
    <style>
        a {
            text-decoration: none;
        }

        button {
            cursor: pointer;
        }

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

        select {
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
    <h1>Step 2</h1>
    <form method="post" action="{{ route('step2') }}">
        @csrf
        <div>
            <label for="restaurant_id">Select Restaurant:</label>
            <select name="restaurant" id="restaurant_id" required>
                @foreach ($dishes as $dish)
                <option value="{{ $dish->restaurant }}">{{ $dish->restaurant }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Next</button>
    </form>
    <button type="submit"><a href="{{route('step1')}}">Pre</a></button>
</body>

</html>