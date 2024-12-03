<?php

interface Combattant {
    public function seBattre($adversaire):void ; 

    public function utiliserAttaqueSpeciale($adversaire):void ;
}