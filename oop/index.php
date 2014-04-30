<?php

class Samochod {
   /**
    * Ilosc paliwa na  1km
    */
   const SPALANIE = 0.1;
   /**
    * Maksymalna ilosc paliwa
    */
   const POEMNOSC_ZBIORNIKA = 55;
   private $_przebieg = 0;
   private $_paliwo = 0;

   public function __get($name) {
        if ('przebieg' === $name) {
            return $this->jakiPrzebieg();
        }
        elseif ('paliwo' === $name) {
            return $this->ilePaliwa();
        }
        throw new Exception('Odwolanie do nieistniejacej cechy: "'.$name.'"');
   }

   public function tankuj ($iloscPaliwa) {
       if ($this->_paliwo + $iloscPaliwa <= self::POEMNOSC_ZBIORNIKA) {
           $this->_paliwo += $iloscPaliwa;
           echo 'Zatankowano: '.$iloscPaliwa.' l, ilosc paliwa wynosi: '.$this->_paliwo.' l<br>';
       }
   }

   public function jakiPrzebieg() {
       return $this->_przebieg;
   }

   public function ilePaliwa() {
       return $this->_paliwo;
   }

   public function naJakiDystansStacPailwa() {
       return $this->_paliwo/self::SPALANIE;
   }

   public function jedz($odleglosc) {
       $niezbednePaliwo = $odleglosc*self::SPALANIE;
       if($niezbednePaliwo <= $this->_paliwo) {
           $this->_przebieg += $odleglosc;
           $this->_paliwo -= $niezbednePaliwo;
           echo 'Przejechano '.$odleglosc.'km<br>';
           return true;
       }
       else {
           echo 'Nie stac paliwa na '.$odleglosc.'km. Zatankuj!<br>';
           return false;
       }
   }
}

$auto = new Samochod();

$auto->jedz(10);// zwroci false bo nie ma paliwa

$auto->tankuj(35);// ok

$auto->jedz(100);// ok

echo 'Przebieg: '.$auto->przebieg.' km<br>';// wywola methode $auto->__get('przebieg')
echo 'Paliwo: '.$auto->paliwo.' l<br>';// wywola methode $auto->__get('paliwo')
echo 'Max dystans bez dotankowania: '.$auto->naJakiDystansStacPailwa().' km<br>';