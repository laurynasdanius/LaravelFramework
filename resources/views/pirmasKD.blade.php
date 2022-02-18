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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    {{-- Custom stilius kalendoriaus pavadinimo iskelimui ant virsaus --}}
    <style>
        caption {
    font-size: 30px;
    line-height: 36px;
    color: #007ab0;
    }

    #kalendorius caption { /* ADDED */
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
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
  {{-- PHP kodas --}}
  @php
    // data
    $date = date('Y-m-d', time());
    //echo "data ".$date;
    //echo '<br>';
// metai
    $metai = date('Y');
    //echo "metai ".$metai;
    //echo '<br>';
// menuo
    $dateObj   = DateTime::createFromFormat('!m', date('m'));
    $menuo = date('m');
    //echo "menuo ".$menuo;
    //echo '<br>';
    $menesioVardas = $dateObj->format('F'); // March
    //echo "menuo vardas ".$menesioVardas;
    //echo '<br>';
// dienu skaicius
    $dienuSk = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y')); // 31
    //echo "Siame menesyje yra {$dienuSk} dienos. Sio menesio : ".$menesioVardas.". Siu metu : ".date('Y');
//diena 
echo 'First day : '. date("Y-m-01", strtotime($date)).' - Last day : '. date("Y-m-t", strtotime($date));
$dateD = date("Y-m-01", strtotime($date));
echo '\n\t';
echo date('w', strtotime($dateD));
//skaiciuokle savaitgalio dienoms gauti
$skaiciuokle = 0;
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

{{-- Klases darbo pradzia --}}
  <div class="container border border-primary">
    <div class="row">
      <table id="kalendorius" class="table table-striped mb-0">
            {{-- date isvedimas ant virsaus su caption --}}
        <caption>@php echo $date @endphp</caption>
        <thead>
            <tr>
              @foreach ($dienuPav as $diena)
                @php
                    echo '<th scope="col">'.$diena.'</th>';
                @endphp
              @endforeach
            </tr>
        </thead>

        <tbody>
          <tr>
            @for ($diena = 1; $diena <= $dienuSk; $diena++)
                
              {{-- Diena tarp td --}}
              {{--kai skaicius pasiekia 6 arba 7 nuspalvinsime kita spalva --}}
              @if ($skaiciuokle <=4)
                @php
                  echo '<td>';
                  echo $diena;
                  echo '</td>';
                  $skaiciuokle++;
                @endphp
              @else
                @php
                  echo '<td class="table-primary">';
                  echo $diena;
                  echo '</td>';
                @endphp
              @endif
                    
              {{-- Kelimas i kita "row" kai dienu sk pasiekia 7 --}}
              @if ($diena % 7 == 0)
                @php
                  echo '</tr>';
                  echo '<tr>';
                  $skaiciuokle = 0;
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
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
      </body>
</html>
