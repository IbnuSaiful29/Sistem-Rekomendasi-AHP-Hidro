<!-- resources/views/matrix/comparison.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pairwise Comparison Matrix</title>
</head>
<body>
    <h1>Pairwise Comparison Matrix</h1>
    <form action="{{ route('matrix.comparison.process') }}" method="POST">
        @csrf
        <table border="1">
            <tr>
                <td></td>
                @foreach ($criteria as $criterion)
                    <td>{{ $criterion }}</td>
                @endforeach
            </tr>
            @foreach ($criteria as $rowCriterion)
                <tr>
                    <td>{{ $rowCriterion }}</td>
                    @foreach ($criteria as $colCriterion)
                        <td><input type="number" name="matrix[{{ $rowCriterion }}][{{ $colCriterion }}]" min="1" max="9" value="1"></td>
                    @endforeach
                </tr>
            @endforeach
        </table>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
