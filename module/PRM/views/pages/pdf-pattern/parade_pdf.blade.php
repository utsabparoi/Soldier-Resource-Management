<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Soldier</title>

    <style>
        table {
            width: 95%;
            border-collapse: collapse;
            margin: 50px auto;
        }

        /* Zebra striping */
        tr:nth-of-type(odd) {
            background: #eee;
        }

        th {
            background: #3498db;
            color: white;
            font-weight: bold;
        }

        td,
        th {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
            font-size: 18px;
        }


    </style>

</head>

<body>

<div style="width: 95%; margin: 0 auto;">
    <div style="width: 10%; float:left; margin-right: 20px;">
{{--        <img src="{{ asset('assets/main-logo.png') }}" width="100%"  alt="">--}}
    </div>
    <div style="width: 50%; float: left;">
        <h1>All Soldier Details</h1>
    </div>
</div>

<table style="position: relative; top: 50px;">
    <thead>
    <tr>
        <th>Name</th>
        <th>Rank</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($parade as $parades)
        <tr>
            <td data-column="name">{{ $parades->name }}</td>
            <td data-column="next rank">{{ $parades->next_rank }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

</body>

</html>
