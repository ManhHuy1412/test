<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .inputs {
            display: block;
            clear: both;
        }

        .input-group {
            margin-bottom: 10px;
        }

        a {
            text-decoration: none;
            color: black;
        }

        button {
            cursor: pointer;
        }
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
    <h1>Step 3</h1>
    <form id="myForm" method="post" action="{{ route('step3') }}">
        @csrf

        <div id="inputs" class="inputs">
            <div class="input-group">
                @if (Session::has('error'))
                <label for="" style="color: red">{{ Session::get('error') }}</label>
                <br>

                @endif
             
                <select name="dish_name[]" id="restaurant_id" required>
                    @foreach ($dishes as $dish)
                    <option value="{{ $dish->name }}">{{ $dish->name }}</option>
                    @endforeach
                </select>

                <input type="number" name="number[]" placeholder="Number 1" value="1" required>

            </div>
        </div>
        <button type="button" onclick="addInput()">Add Input</button>
        <button type="submit">Submit</button>
        <button type="submit"><a href="{{route('step1')}}">Pre</a></button>

    </form>

    <script>
        var count = 1;

        function addInput() {
            var inputsDiv = document.getElementById('inputs');
            var inputGroup = document.createElement('div');
            inputGroup.className = 'input-group'; 
            var newInputSelect = document.createElement('select');
            newInputSelect.name = 'dish_name[]';
            newInputSelect.required = true;

            // Thêm các option vào select mới
            @foreach ($dishes as $dish)
                var option = document.createElement('option');
                option.value = '{{ $dish->name }}';
                option.textContent = '{{ $dish->name }}';
                newInputSelect.appendChild(option);
            @endforeach
            count++
            console.log(count);
            console.log({{count($dishes)}});
            if (count>{{count($dishes)}}) {
                return alert('Quá số lưọng')
            }
            var newInputNumber = document.createElement('input');
            newInputNumber.type = 'number';
            newInputNumber.name = 'number[]';
            newInputNumber.placeholder = 'Number';
            newInputNumber.required = true;
            newInputNumber.value=1;
            inputGroup.appendChild(newInputSelect);
            inputGroup.appendChild(newInputNumber);
            inputsDiv.appendChild(inputGroup);
        }
        
    </script>
</body>

</html>