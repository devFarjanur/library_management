<!DOCTYPE html>
<html>
<head>
    <title>Admin Report</title>
</head>
<body style="font-family: Arial, sans-serif; font-size: 12px; margin: 20px;">
    <h1 style="text-align: center; color: #333;">Library Management System</h1>
    <h2 style="text-align: center; color: #333;">Admin Report</h2>
    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <thead>
            <tr>
                <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Student Name</th>
                <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Email</th>
                <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Total Books Requested</th>
                <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Total Books Pending</th>
                <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Total Books Approved</th>
                <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Total Books Rejected</th>
                <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Total Books Returned</th>
                <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Total Fine</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reportData as $data)
                <tr>
                    <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">{{ $data['student_name'] }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">{{ $data['student_email'] }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">{{ $data['total_books_borrowed'] }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">{{ $data['total_books_pending'] }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">{{ $data['total_books_approved'] }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">{{ $data['total_books_rejected'] }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">{{ $data['total_books_returned'] }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">{{ $data['total_fine'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
