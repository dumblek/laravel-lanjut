<?php

abstract class Hewan {
    protected $nama,
              $darah = 50,
              $jumlahKaki,
              $keahlian;

    abstract public function atraksi();
}

abstract class Fight extends Hewan {
    protected $attackPower, $defencePower;

    abstract public function getInfoHewan();
    public function serang(Hewan $lawan){
        $lawan->darah = $lawan->darah - ($this->attackPower/$lawan->defencePower);
        echo $this->nama . ' sedang menyerang ' . $lawan->nama .'<br>';
    }
    public function diserang(Hewan $lawan){
        $this->darah = $this->darah - ($lawan->attackPower/$this->defencePower);
        echo $this->nama . ' sedang diserang ' . $lawan->nama .'<br>';
    }
    public function atraksi(){
        echo $this->nama . ' sedang ' . $this->keahlian .'<br>';
    }
}

class Elang extends Fight {
    protected $jumlahKaki = 2,
              $keahlian = 'terbang tinggi',
              $attackPower = 10, 
              $defencePower = 5;

    public function __construct ($nama){
        $this->nama = $nama;
    }
    public function getInfoHewan(){
        $str = "Jenis hewan   : Elang <br>
                nama          : {$this->nama} <br>
                darah         : {$this->darah} <br>
                jumlah kaki   : {$this->jumlahKaki} <br>
                keahlian      : {$this->keahlian} <br>
                attack power  : {$this->attackPower} <br>
                defence power : {$this->defencePower}";
        echo $str;
    }
}

class Harimau extends Fight {
    protected $jumlahKaki = 4,
              $keahlian = 'lari cepat',
              $attackPower = 7, 
              $defencePower = 8;

    public function __construct ($nama){
        $this->nama = $nama;
    }
    public function getInfoHewan(){
        $str = "Jenis hewan   : Harimau <br>
                Nama          : {$this->nama} <br>
                Darah         : {$this->darah} <br>
                Jumlah kaki   : {$this->jumlahKaki} <br>
                Keahlian      : {$this->keahlian} <br>
                Attack power  : {$this->attackPower} <br>
                Defence power : {$this->defencePower}";
        echo $str;
    }
}

$elang = new Elang('elang_1');
$harimau = new Harimau('harimau_1');

$elang->atraksi();
$elang->serang($harimau);
$elang->diserang($harimau);
$elang->getInfoHewan();
echo "<hr>";
$harimau->atraksi();
$harimau->serang($elang);
$harimau->diserang($elang);
$harimau->getInfoHewan();