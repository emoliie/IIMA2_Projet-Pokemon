<?php
trait healTrait  {
    public function healing():void {
        $this->hp = $this->maxHp;
    }
}