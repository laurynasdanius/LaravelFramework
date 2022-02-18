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
//Data su kuria norime dirbti (time() yra siandienos data)

$date = strtotime('2022-02-18');
$date = strtotime('2022-01-18');

//Siandienos data Metai-menuo,diena
$dateYMD = date('Y-m-d', $date);
echo "dabartine data ".$dateYMD;
echo '<br>';


//Dabartiniai metai ir menuo
$dateYM = date('Y-m', $date);
echo "dabartiniai metai ir menuo ".$dateYM;
echo '<br>';

//Dabartinio menesio pirma diena
$dateDN = strtotime(date('Y-m-01'));
echo 'Dabartinio menesio pirma diena = '. date('Y-m-01');
echo '<br>';

//NUO KURIOS DIENOS PRASIDEDA SIS MENUO
$dateDS = date('N',$dateDN);
echo 'Nuo kurios savaites dienos prasideda sis menuo? '.$dateDS.' Tai yra '.date('l',$dateDN);
echo '<br>';

//KIEK DIENU SIS MENUO TURI
$dateDE = date('t',$date);
echo "kiek dienu sis menuo turi : ".$dateDE;
echo '<br>';

// ----PASKUTINIS MENUO----
// Paskutinio menesio dienu skaicius
$dateLMD = date("t", mktime(0,0,0, date("n") - 1));
echo 'Paskutinio menesio dienu skaicius : '.$dateLMD;
echo '<br>';

//paskutinio menesio dienu skaicius - sio menesio prasidedanti diena $dateDS
$dateDLMTM = $dateLMD - $dateDS;
echo '(Paskutinio menesio dienu skaicius) - (sio menesio prasidedanti diena norint uzpildyti kalendoriaus tuscias vietas) = '.$dateDLMTM;
echo '<br>';

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
            <caption>@php echo $dateYM @endphp</caption>
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
                  @for($i = $dateDLMTM+1; $i <$dateLMD; $i++)
                    @php
                      echo '<td class="table-secondary border border-dark">'.$i.'</td>';
                      $skaiciuokle++;
                    @endphp
                  @endfor
                  @for($i2 = 1; $i2 <=$dateDE; $i2++)
                    @php
                    $skaiciuokle++;
                    @endphp

                    @if($skaiciuokle==6)
                      @php
                        echo '<td class="border border-dark table-primary">'.$i2.'</td>';
                      @endphp
                    @elseif($skaiciuokle==7)
                      @php
                        echo '<td class="border border-dark table-primary">'.$i2.'</td>';
                        echo '</tr>';
                        echo '<tr>';
                        $skaiciuokle=0;
                      @endphp
                    @else 
                        @php
                         echo '<td class="border border-dark">'.$i2.'</td>';
                        @endphp
                    @endif
                  @endfor
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