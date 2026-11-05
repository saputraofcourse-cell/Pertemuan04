<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konversi Suhu</title>
</head>
<body>
    <p>Nama Suhu : {{ $asal_suhu }}</p>
    <p>Besar Suhu : {{ $nilai_suhu }}</p>
    <br>
    <h3>Hasil Konversi Suhu</h3>
    <hr style="border: 1px solid black; width: 300px; margin-left: 0;">
    <hr style="border: 1px solid black; width: 300px; margin-left: 0;">

    @if($asal_suhu == 'celcius')
        <p>Suhu Reamur = {{ (4/5) * $nilai_suhu }}</p>
        <p>Suhu Kelvin = {{ $nilai_suhu + 273 }}</p>
        <p>Suhu Fahrenheit = {{ ((9/5) * $nilai_suhu) + 32 }}</p>
    @elseif($asal_suhu == 'fahrenheit')
        <p>Suhu Celcius = {{ (5/9) * ($nilai_suhu - 32) }}</p>
        <p>Suhu Reamur = {{ (4/9) * ($nilai_suhu - 32) }}</p>
        <p>Suhu Kelvin = {{ (5/9) * ($nilai_suhu - 32) + 273 }}</p>
    @elseif($asal_suhu == 'reamur')
        <p>Suhu Celcius = {{ (5/4) * $nilai_suhu }}</p>
        <p>Suhu Fahrenheit = {{ ((9/4) * $nilai_suhu) + 32 }}</p>
        <p>Suhu Kelvin = {{ ((5/4) * $nilai_suhu) + 273 }}</p>
    @elseif($asal_suhu == 'kelvin')
        <p>Suhu Celcius = {{ $nilai_suhu - 273 }}</p>
        <p>Suhu Reamur = {{ (4/5) * ($nilai_suhu - 273) }}</p>
        <p>Suhu Fahrenheit = {{ ((9/5) * ($nilai_suhu - 273)) + 32 }}</p>
    @else
        <p>Jenis suhu tidak dikenali. Gunakan: celcius, fahrenheit, reamur, atau kelvin.</p>
    @endif

    <hr style="border: 1px solid black; width: 300px; margin-left: 0;">
    <hr style="border: 1px solid black; width: 300px; margin-left: 0;">
</body>
</html>