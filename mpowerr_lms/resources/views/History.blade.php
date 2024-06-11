<!DOCTYPE html>
<html>
<head>
    <title>History</title>
</head>
<body>
    <h1>History</h1>
    @foreach ($history as $record)
        <div>
            <p>Original Lease ID: {{ $record->original_id }}</p>
            <p>Installments: {{ $record->installments }}</p>
            <p>Moved to History at: {{ $record->created_at }}</p>
            <!-- Add other columns as needed -->
        </div>
    @endforeach

    <a href="{{ route('LeasesManagementRoute') }}">Back to Lease Details</a>
</body>
</html>
