<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>currency-converter</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1e5128 0%, #2d6a4f 100%);
            min-height: 100vh;
            padding: 20px;
        }
        .container { max-width: 590px; margin: 0 auto; }
        h1 {
            color: #b8f3d6;
            text-align: center;
            font-size: 3em;
            font-weight: bold;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        .subtitle {
            color: white;
            text-align: center;
            font-size: 0.95em;
            line-height: 1.6;
            margin-bottom: 30px;
            padding: 0 20px;
        }
        .card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
        }
        .info-header {
            text-align: center;
            margin-bottom: 25px;
            padding-bottom: 20px;
            border-bottom: 1px solid #e0e0e0;
        }
        .info-header h3 { 
            font-size: 0.9em; 
            color: #666; 
            margin-bottom: 5px;
            font-weight: 600;
        }
        .rate-display { 
            color: #333; 
            font-size: 0.95em; 
            font-weight: 600; 
        }
        .form-group { margin-bottom: 20px; }
        label {
            display: block;
            color: #333;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 0.9em;
        }
        .input-wrapper {
            display: flex;
            align-items: center;
            background: #f8f8f8;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            padding: 15px;
            transition: all 0.3s;
        }
        .input-wrapper:focus-within {
            border-color: #2d6a4f;
            background: white;
        }
        input[type="number"] {
            flex: 1;
            border: none;
            background: transparent;
            font-size: 1.2em;
            font-weight: 600;
            color: #333;
            outline: none;
        }
        .currency-label {
            color: #666;
            font-weight: 600;
            font-size: 0.9em;
            margin-left: 10px;
        }
        .select-wrapper {
            width: 100%;
            padding: 15px;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            background: #f8f8f8;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .select-wrapper:hover, .select-wrapper.active {
            border-color: #2d6a4f;
            background: white;
        }
        .selected-option { font-size: 1em; color: #333; }
        .selected-option.placeholder { color: #999; }
        .dropdown-arrow {
            width: 16px;
            height: 16px;
            transition: transform 0.3s;
        }
        .dropdown-arrow svg {
            width: 100%;
            height: 100%;
            fill: #666;
        }
        .select-wrapper.active .dropdown-arrow {
            transform: rotate(180deg);
        }
        .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            border: 2px solid #2d6a4f;
            border-radius: 12px;
            margin-top: 5px;
            max-height: 300px;
            overflow-y: auto;
            z-index: 1000;
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
            display: none;
        }
        .dropdown-menu.show { display: block; }
        .dropdown-item {
            padding: 12px 15px;
            cursor: pointer;
            transition: background 0.2s;
            font-size: 0.95em;
            font-weight: 500;
        }
        .dropdown-item:hover { background: #f0f0f0; }
        .dropdown-item.selected { background: #e8f5e9; color: #2d6a4f; }
        .currency-select { position: relative; }
        @media (max-width: 768px) {
            .container { padding: 10px; max-width: 95%; }
            h1 { font-size: 2em; margin-bottom: 15px; }
            .subtitle { font-size: 0.85em; margin-bottom: 20px; line-height: 1.5; }
            .card { padding: 20px; border-radius: 15px; }
            .input-wrapper, .select-wrapper { padding: 12px; }
            input[type="number"] { font-size: 1.1em; }
            .btn-convert { padding: 12px; font-size: 1em; }
            .dropdown-arrow { width: 14px; height: 14px; }
        }
        @media (max-width: 480px) {
            h1 { font-size: 1.5em; letter-spacing: 1px; line-height: 1.2; }
            .subtitle { font-size: 0.8em; margin-bottom: 15px; }
            .card { padding: 15px; border-radius: 12px; }
            .input-wrapper, .select-wrapper { padding: 10px; }
            input[type="number"] { font-size: 1em; }
            .btn-convert { padding: 10px; font-size: 0.95em; }
            .dropdown-arrow { width: 12px; height: 12px; }
            .dropdown-item { padding: 10px 12px; font-size: 0.9em; }
        }
        @media (max-width: 360px) {
            h1 { font-size: 1.3em; }
            .card { padding: 12px; }
            .input-wrapper, .select-wrapper { padding: 8px; }
            .btn-convert { padding: 8px; font-size: 0.9em; }
        }
        .btn-convert {
            width: 100%;
            padding: 15px;
            background: #b8f3d6;
            color: #1e5128;
            border: none;
            border-radius: 12px;
            font-size: 1.1em;
            font-weight: bold;
            cursor: pointer;
            margin-top: 20px;
            transition: all 0.3s;
        }
        .btn-convert:hover {
            background: #95e6ba;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        .hasil {
            background: #e8f5e9;
            padding: 20px;
            margin-top: 20px;
            border-radius: 12px;
            border-left: 4px solid #2d6a4f;
        }
        .hasil h3 { color: #1e5128; margin-bottom: 15px; font-size: 1.1em; }
        .hasil p { color: #333; margin: 8px 0; font-size: 0.95em; }
        .hasil strong { color: #1e5128; }
        .error {
            color: #d32f2f;
            background: #ffebee;
            padding: 12px;
            border-radius: 8px;
            margin-top: 15px;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
<?php
function getKurs($currency) {
    $kursData = array(
        'USD' => array('rate' => 16740, 'symbol' => '$', 'name' => 'Dollar (USD)'),
        'EUR' => array('rate' => 19420, 'symbol' => '€', 'name' => 'Euro (EUR)'),
        'GBP' => array('rate' => 22030, 'symbol' => '£', 'name' => 'Poundsterling (GBP)'),
        'KWD' => array('rate' => 54570, 'symbol' => 'ك', 'name' => 'Dinar Kuwait (KWD)'),
        'BHD' => array('rate' => 44410, 'symbol' => '.د.ب', 'name' => 'Dinar Bahrain (BHD)')
    );
    return isset($kursData[$currency]) ? $kursData[$currency] : null;
}

function konversiKurs($rupiah, $currency) {
    $kursInfo = getKurs($currency);
    if ($kursInfo === null) return null;
    $hasil = $rupiah / $kursInfo['rate'];
    return array(
        'hasil' => $hasil,
        'symbol' => $kursInfo['symbol'],
        'name' => $kursInfo['name']
    );
}

function formatRupiah($angka) {
    return "Rp" . number_format($angka, 0, ',', '.');
}

function formatCurrency($angka, $symbol) {
    return $symbol . number_format($angka, 2, '.', ',');
}
?>
<div class="container">
    <h1>KONVERSI MATA UANG</h1>
    <div class="subtitle">
        Selamat datang di website konversi mata uang sederhana karya Muhammad Rafly Romeo Nasution. 
        Di sini kamu bisa melakukan konversi mata uang dari Rupiah ke pilihan yang tersedia: 
        Dollar, Euro, Poundsterling, Dinar Kuwait, dan Dinar Bahrain.
    </div>
    <div class="card">
        <?php
        $displayCurrency = isset($_POST['currency']) && !empty($_POST['currency']) ? $_POST['currency'] : 'EUR';
        $displayKurs = getKurs($displayCurrency);
        ?>
        <div class="info-header">
            <h3>Nilai tukar pasar tengah</h3>
            <div class="rate-display" id="rate-display">
                <?php echo $displayKurs['symbol'] . '1 ' . $displayCurrency . ' = ' . number_format($displayKurs['rate'], 0, ',', '.') . ' IDR'; ?>
            </div>
        </div>
        <form method="post" id="currency-form">
            <div class="form-group">
                <label>Masukkan nilai dalam Rupiah</label>
                <div class="input-wrapper">
                    <input type="number" name="rupiah" placeholder="1000" min="0" step="0.01" 
                           value="<?php echo isset($_POST['rupiah']) ? $_POST['rupiah'] : ''; ?>">
                    <span class="currency-label">IDR</span>
                </div>
            </div>
            <div class="form-group">
                <label>Pilih mata uang tujuan</label>
                <div class="currency-select">
                    <div class="select-wrapper" id="select-wrapper">
                        <div class="selected-option placeholder" id="selected-option">-- Pilih Mata Uang --</div>
                        <span class="dropdown-arrow">
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7 10l5 5 5-5z"/>
                            </svg>
                        </span>
                    </div>
                    <div class="dropdown-menu" id="dropdown-menu">
                        <div class="dropdown-item" data-value="USD" data-rate="16740" data-text="$1 USD = 16.740 IDR">Dollar (USD)</div>
                        <div class="dropdown-item" data-value="EUR" data-rate="19420" data-text="€1 EUR = 19.420 IDR">Euro (EUR)</div>
                        <div class="dropdown-item" data-value="GBP" data-rate="22030" data-text="£1 GBP = 22.030 IDR">Poundsterling (GBP)</div>
                        <div class="dropdown-item" data-value="KWD" data-rate="54570" data-text="ك1 KWD = 54.570 IDR">Dinar Kuwait (KWD)</div>
                        <div class="dropdown-item" data-value="BHD" data-rate="44410" data-text=".د.ب1 BHD = 44.410 IDR">Dinar Bahrain (BHD)</div>
                    </div>
                    <input type="hidden" name="currency" id="currency-input" value="<?php echo isset($_POST['currency']) ? $_POST['currency'] : ''; ?>">
                </div>
            </div>
            <input type="submit" class="btn-convert" value="Konversi">
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $rupiah = isset($_POST['rupiah']) ? $_POST['rupiah'] : '';
            $currency = isset($_POST['currency']) ? $_POST['currency'] : '';
            
            if (empty($rupiah) || !is_numeric($rupiah) || $rupiah <= 0) {
                echo "<p class='error'>❌ Nilai Rupiah harus berupa angka positif!</p>";
            } elseif (empty($currency)) {
                echo "<p class='error'>❌ Silakan pilih mata uang tujuan!</p>";
            } else {
                $konversi = konversiKurs($rupiah, $currency);
                
                if ($konversi === null) {
                    echo "<p class='error'>❌ Mata uang tidak valid!</p>";
                } else {
                    $rupiahFormat = formatRupiah($rupiah);
                    $hasilFormat = formatCurrency($konversi['hasil'], $konversi['symbol']);
                    
                    echo "
                    <div class='hasil'>
                        <h3>✅ Hasil Konversi</h3>
                        <p><strong>Jumlah awal:</strong> {$rupiahFormat}</p>
                        <p><strong>Hasil konversi:</strong> {$hasilFormat} {$konversi['name']}</p>
                    </div>
                    ";
                }
            }
        }
        ?>
    </div>
</div>
<script>
const selectWrapper = document.getElementById('select-wrapper');
const selectedOption = document.getElementById('selected-option');
const dropdownMenu = document.getElementById('dropdown-menu');
const dropdownItems = document.querySelectorAll('.dropdown-item');
const rateDisplay = document.getElementById('rate-display');
const currencyInput = document.getElementById('currency-input');

<?php if (isset($_POST['currency']) && !empty($_POST['currency'])): ?>
const savedCurrency = '<?php echo $_POST['currency']; ?>';
const savedItem = document.querySelector(`[data-value="${savedCurrency}"]`);
if (savedItem) {
    savedItem.classList.add('selected');
    selectedOption.textContent = savedItem.textContent;
    selectedOption.classList.remove('placeholder');
    rateDisplay.textContent = savedItem.dataset.text;
}
<?php endif; ?>

selectWrapper.addEventListener('click', (e) => {
    e.stopPropagation();
    selectWrapper.classList.toggle('active');
    dropdownMenu.classList.toggle('show');
});

document.addEventListener('click', () => {
    selectWrapper.classList.remove('active');
    dropdownMenu.classList.remove('show');
});

dropdownItems.forEach(item => {
    item.addEventListener('click', (e) => {
        e.stopPropagation();
        dropdownItems.forEach(i => i.classList.remove('selected'));
        item.classList.add('selected');
        
        selectedOption.textContent = item.textContent;
        selectedOption.classList.remove('placeholder');
        rateDisplay.textContent = item.dataset.text;
        currencyInput.value = item.dataset.value;
        
        selectWrapper.classList.remove('active');
        dropdownMenu.classList.remove('show');
    });
});
</script>
</body>
</html>