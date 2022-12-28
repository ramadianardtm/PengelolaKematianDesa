<style>
    html,
    body {
        margin: 10px;
        padding: 10px;
        font-family: 'Poppins', sans-serif;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    p,
    span,
    label {
        font-family: 'Poppins', sans-serif;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 0px !important;
    }

    table thead th {
        height: 28px;
        text-align: left;
        font-size: 16px;
        font-family: sans-serif;
    }

    table,
    th,
    td {
        border: 1px solid #ddd;
        padding: 8px;
        font-size: 14px;
    }

    .heading {
        font-size: 24px;
        margin-top: 12px;
        margin-bottom: 12px;
        font-family: sans-serif;
    }

    .small-heading {
        font-size: 18px;
        font-family: sans-serif;
    }

    .total-heading {
        font-size: 18px;
        font-weight: 700;
        font-family: sans-serif;
    }

    .order-details tbody tr td:nth-child(1) {
        width: 20%;
    }

    .order-details tbody tr td:nth-child(3) {
        width: 20%;
    }

    .text-start {
        text-align: left;
    }

    .text-end {
        text-align: right;
    }

    .text-center {
        text-align: center;
    }

    .company-data span {
        margin-bottom: 4px;
        display: inline-block;
        font-family: sans-serif;
        font-size: 14px;
        font-weight: 400;
    }

    .no-border {
        border: 1px solid #fff !important;
    }

    .bg-blue {
        background-color: #1e1e1e;
        color: #fff;
    }
</style>

<body>
    <table class="order-details">
        <thead>
            <tr>
                <th width="50%" colspan="2">
                    <h1>Sokulon</h1>
                </th>
            </tr>
        </thead>
    </table>

    <!--  Table Createch -->
    <table>
        <thead>
            <tr>
                <th class="no-border text-start heading" colspan="5">
                    Data Pendaftaran
                </th>
            </tr>
            <tr class="bg-blue">
                <th scope="col">ID</th>
                <th scope="col">Nama Perwakilan</th>
                <th scope="col">Nama Almarhum</th>
                <th scope="col">No KK</th>
                <th scope="col">No Whatsapp</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $dt)
            <tr>
                <td width="10%">{{ $dt->id }}</td>
                <td scope="row">{{ $dt->name }}</td>
                <td>{{ $dt->namemati }}</td>
                <td>{{ $dt->nokk }}</td>
                <td>{{ $dt->phone }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <br>
    <p class="text-center">
        Salam, Kabupaten Banyumas
    </p>
    <!-- Table Createch end -->
</body>