{{-- 
1. pasidaryti view'o welcome.blade.php kopiją kitu pavadinimu pvz.
test.blade.php
2. sutvarkyti route padaryti test.blade.php startuojančiu
3. vietoje esamo turinio įdėti savo kodą, kuris sugeneruotų (naudoti ciklą) 
mėnesio kalendorių, savaitgalio dienas rodyti kita spalva (pvz. raudona).

Pateikti:
1. test.blade.php  ir route kodus
2. ataskaitą (PDF) su  ekrano vaizdais ir programos kodu. --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
{{-- Custom stilius kalendoriaus pavadinimo iskelimui ant virsaus --}}
<style>
    caption {
        font-size: 30px;
        line-height: 36px;
        color: #007ab0;
    }

    #kalendorius caption {
        /* ADDED */
        caption-side: top;
        text-align: center;
    }
</style>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="https://placeholder.pics/svg/150x50/888888/EEE/Logo" alt="..." height="36">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">
    <h1 class="mt-4">Pirmas KD</h1>
    <p>Puslapis su bootstrap</p>
</div>

<div class="container">
  
{{-- PHP kodas --}}
@php
//Pasirinkta data
$date = new DateTime('2022-01-20');
echo 'Pasirinkta data : '.$date->format('Y-m-d');
echo '<br>';


//Dabartiniai metai ir menuo
$thisYearMonth = $date->format('Y-m');
echo 'Dabartiniai metai ir menuo : '.$thisYearMonth;
echo '<br>';

//SIO MENESIO DIENU SKAICIUS
$days = $date->format('t');
echo 'Sio menesio dienu skaicius : '.$days;
echo '<br>';

//PIRMA MENESIO DIENA
$firstMonthDay = $date->format('Y-m-01');

//DABARTINIS MENESIS PRASIDEDA NUO SITOS DIENOS (imama pirma menesio diena):
$dayNum = date_create($firstMonthDay)->format('N');
echo 'Dabartinis menesis prasides nuo sitos dienos : '.$dayNum;
echo '<br>';

//PRAEITAS MENUO
$lastMonth = $date->modify('-1 month')->format('Y-m');
echo 'Praeitas menuo : '.$lastMonth;
echo '<br>';

//PRAEITO MENESIO PASKUTINE DIENA
$lastDayOfLastMonth = date("Y-m-t", strtotime($lastMonth));
echo 'Praeito menesio paskutine diena : '.$lastDayOfLastMonth;
echo '<br>';

//PASKUTINIO MENESIO DIENOS IR SIO MENESIO SAVAITES PRASIDEDANCIOS DIENOS SKIRTUMAS
$daydiff = date_create($lastDayOfLastMonth)->modify('-'.$dayNum.' day')->modify('+2 day')->format('Y-m-d');
echo 'PASKUTINIO MENESIO DIENOS IR SIO MENESIO SAVAITES PRASIDEDANCIOS DIENOS SKIRTUMAS : '.$daydiff;

//skaiciuokle
$skaiciuokle =0;

// array su dienu pavadinimais
$dienuPav = [
'P',
'A',
'T',
'K',
'Pe',
'S',
'Se'
];

@endphp
</div>
<br>

{{-- Lenteles kurimas --}}
<div class="container border border-primary">
    <div class="row">
        <table id="kalendorius" class="table table-striped mb-0">
            {{-- date isvedimas ant virsaus su caption --}}
            <caption>@php echo $thisYearMonth @endphp</caption>
            <thead>
                <tr>
                    {{-- isvedame savaites dienas --}}
                    @foreach ($dienuPav as $diena)
                      @php
                        echo '<th scope="col">'.$diena.'</th>';
                      @endphp
                    @endforeach
                </tr>
            </thead>

            <tbody>
                <tr>
                {{-- Spauzdiname praeito menesio dienas kad uzpilditume tuscias vietas kalendoriuje --}}
                  @for($ii = date_create($daydiff)->format('d') ; $ii <= date_create($lastDayOfLastMonth)->format('d'); $ii++)
                    
                    @if($dayNum!=1)
                        @php
                            echo '<td class="table-secondary border border-dark">'.$ii.'</td>';
                            $skaiciuokle++;
                        @endphp

                        @else
                            @break
                    @endif

                      @if($skaiciuokle==7)
                        @php
                            echo '</tr>';
                            echo '<tr>';
                            $skaiciuokle=0;
                        @endphp
                      @endif 
                  @endfor
                  @for( $i = 1; $i <= $days; $i++)
                    @php
                    $skaiciuokle++;
                    @endphp

                    @if($skaiciuokle==6)
                      @php
                        echo '<td class="border border-dark table-primary">'.$i.'</td>';
                      @endphp
                    @elseif($skaiciuokle==7)
                      @php
                        echo '<td class="border border-dark table-primary">'.$i.'</td>';
                        echo '</tr>';
                        echo '<tr>';
                        $skaiciuokle=0;
                      @endphp
                    @else 
                        @php
                         echo '<td class="border border-dark">'.$i.'</td>';
                        @endphp
                    @endif
                  @endfor
                  @if($days==31 || $skaiciuokle != 7)
                    @php
                        $sk2=1;
                    @endphp
                    @while($skaiciuokle!=7)
                        @php
                        echo '<td class="table-dark border border-dark">'.$sk2.'</td>';
                        $sk2++;
                        $skaiciuokle++;
                        @endphp
                    @endwhile
                  @endif
                </tr>
            </tbody>
        </table>
    </div>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
</script>
</body>

</html>