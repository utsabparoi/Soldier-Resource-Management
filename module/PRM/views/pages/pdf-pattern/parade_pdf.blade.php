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

        }

        th {
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
    <div align="center">
        <h1 style="border:1px dashed rgb(119,0,255); color: rgb(119,0,255);">PERFECT TEN</h1>
        <h4 style="color: #0091ff;">All Soldier Details Information</h4>
    </div>
</div>

<table style="position: relative;">
    @foreach ($parade as $parades)
        <tbody>
        <div class="text-center" style="font-size: 20px; border-radius: 10px;"><span>Soldier {{ $loop->iteration }}</span></div>
        <tr><th style="width: 30%;">Name</th> <td  style="width: 70%;" data-column="name">{{ $parades->name }}</td></tr>
        <tr><th>Rank</th> <td data-column="next rank">{{ $parades->next_rank }}</td></tr>
        <tr><th>Camp</th> <td data-column="next rank">{{ $parades->camp->name }}</td></tr>
        <tr><th>Joining Date</th> <td data-column="next rank">{{ $parades->join_date_present_unit }}</td></tr>
        <tr><th>Enrolment Date</th> <td data-column="next rank">{{ $parades->enrolment_date }}</td></tr>
        <tr><th>Present Rank Date</th> <td data-column="next rank">{{ $parades->present_rank_date }}</td></tr>
        <tr><th>Retirement Date</th> <td data-column="next rank">{{ $parades->retirement_date }}</td></tr>
        <tr><th>Permanent Address</th> <td data-column="next rank">{{ $parades->permanent_address }}</td></tr>
        <tr><th>Marital Status</th> <td data-column="next rank">{{ $parades->marital_status }}</td></tr>
        <tr><th>Children Number</th> <td data-column="next rank">{{ $parades->children_number }}</td></tr>
        </tbody>
        <br>
    @endforeach
</table>

</body>

</html>
