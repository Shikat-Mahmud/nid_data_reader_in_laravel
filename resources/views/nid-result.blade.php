<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NID Result</title>
</head>

<body>
    <div class="container">
        <h2>NID Data:</h2>
        @if ($nidData)
            <p><strong>NID Number:</strong> {{ $nidData['nid'] ?? 'Not Found' }}</p>
            <p><strong>Name:</strong> {{ $nidData['name'] ?? 'Not Found' }}</p>
            <p><strong>Date Of Birth:</strong> {{ $nidData['dob'] ?? 'Not Found' }}</p>
            <!-- <p><strong>Mother's Name:</strong> {{ $nidData['mothers_name'] ?? 'Not Found' }}</p> -->
        @else
            <p>No NID data found in the image.</p>
        @endif

    </div>
</body>

</html>